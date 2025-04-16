
@extends('layouts.school_master')

@section('styles')



@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="/home">{{$person->organization->app_organization_name_short}}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Obvestila</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Seznam obvestil</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="btn-list">
                            
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card custom-card overflow-hidden main-content-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between mb-2">
                                        <div>
                                            <span class="text-muted d-block mb-1">Obvestila</span>
                                            <h4 class="fw-medium mb-0">{{ $notifications->count() }}</h4>
                                        </div>
                                        <div class="lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-primary">
                                                <i class="ri-mail-unread-line fs-5"></i>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="text-muted fs-13">Vsa sporočila</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3">
                            <div class="card custom-card overflow-hidden main-content-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between mb-2">
                                        <div>
                                            <span class="text-muted d-block mb-1">Nova obvestila</span>
                                            <h4 class="fw-medium mb-0">{{ $notifications->whereNull('app_notification_read_at')->count() }}</h4>
                                        </div>
                                        <div class="lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-success">
                                                <i class="ri-chat-new-line fs-5"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-muted fs-13">Obvestila </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!--End::row-1 -->

                    <!-- Start::row-2 -->
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Total Tasks
                                    </div>
                                    <div class="d-flex">
                                        <!-- Start::add task modal -->
                                        
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">
                                                    <input class="form-check-input check-all" type="checkbox" id="all-tasks" value="" aria-label="...">
                                                </th>
                                                <th scope="col" class="text-center align-middle">Od osebe</th>
                                                <th scope="col" class="text-center align-middle">Naslov</th>
                                                <th scope="col" class="text-center align-middle">Vsebina</th>
                                                <th scope="col" class="text-center align-middle">Povezava</th>
                                                <th scope="col" class="text-center align-middle">Datum</th>
                                                <th scope="col" class="text-center align-middle">Obvestilo prebrano</th>
                                                <th scope="col" class="text-center align-middle">Sodelujoči</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            @if (!$notifications->isEmpty())
                                                
                                                @foreach ($notifications as $notification)
                                                    <tr class="task-list {{ $notification->app_notification_read_at ? '' : 'bg-primary-subtle' }}">
                                                        <!-- Checkbox -->
                                                        <td class="task-checkbox">
                                                            <input class="form-check-input" type="checkbox" value="" aria-label="...">
                                                        </td>

                                                        <!-- Ime osebe, ki je ustvarila obvestilo -->
                                                        <td style="display: flex; align-items: center;">
                                                            <span class="fw-medium">
                                                                <span class="avatar avatar-sm avatar-rounded me-3">
                                                                    <img src="/storage/users/{{$notification->created_by_person->user->user_profile_image}}" alt="">
                                                                </span>
                                                                {{ $notification->created_by_person->person_name ?? 'Nepoznana oseba' }}
                                                            </span>
                                                        </td>

                                                        <!-- Naslov obvestila -->
                                                        <td>
                                                            <span class="fw-medium">{{ $notification->app_notification_title }}</span>
                                                        </td>

                                                        <!-- Besedilo obvestila -->
                                                        <td>
                                                            <span class="fw-medium">{{ $notification->app_notification_text }}</span>
                                                        </td>

                                                        <!-- Povezava -->
                                                        <td class="text-center align-middle">
                                                            <a href="{{ $notification->app_notification_link }}" class="text-decoration-none" target="_blank">
                                                                <i class="ri-link-m" style="font-size: 20px;"></i>
                                                            </a>
                                                        </td>

                                                        <!-- Datum dogodka (formatirano v dd. mm. yyyy) -->
                                                        <td class="text-center align-middle">
                                                            <span class="fw-medium text-primary">
                                                                {{ \Carbon\Carbon::parse($notification->app_notification_date)->format('d. m. Y') }}
                                                            </span>
                                                        </td>

                                                        <!-- Datum prebranosti (če obstaja, formatirano v dd. mm. yyyy) -->
                                                        <td class="text-center align-middle">
                                                            @if ($notification->app_notification_read_at)
                                                                {{ \Carbon\Carbon::parse($notification->app_notification_read_at)->format('d. m. Y') }}
                                                            @else
                                                                Neprebrano
                                                            @endif
                                                        </td>

                                                        <!-- Prazni stolpec (po potrebi dodaj gumb ali drugo vsebino) -->
                                                        <td></td>
                                                    </tr>
                                                @endforeach


                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Trenutno ni nobenih obvestil.</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--End::row-2 -->

@endsection

@section('scripts')
	
        <!-- Flat Picker JS -->
        <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>

        <!-- Internal Invoice List JS -->
        @vite('resources/assets/js/task-list.js')

@endsection
