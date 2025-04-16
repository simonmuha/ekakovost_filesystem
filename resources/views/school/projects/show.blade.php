
@extends('layouts.school_master')

@section('styles')

        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">

@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{$person->organization->app_organization_name_short}}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projekti</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pregled projekta</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">{{ $project->project_name }}</h1>
                        </div>
                        <div class="btn-list">
                        </div>
                    </div>
                    <!-- Page Header Close -->


                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xxl-8">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4 gap-2 flex-wrap">
                                        <span class="avatar avatar-lg me-1 bg-primary-gradient"><i class="ri-briefcase-line fs-24 lh-1"></i></span>
                                        <div>
                                            <h6 class="fw-medium mb-2 task-title">
                                            {{ $project->project_name }}
                                            </h6>
                                            <span class="badge bg-{{ $project->project_status->project_status_color }}-transparent"> {{ $project->project_status->project_status_name_slo }}</span>
                                            <span class="text-muted fs-12"><i class="ri-circle-fill text-success mx-2 fs-9"></i>Zadnja sprememba: {{ \Carbon\Carbon::parse($project->updated_at)->format('j. F, Y') }}
                                            </span>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
                                                         
                            </div>  
                            

                            <div class="row mb-3">
                                @foreach ($mediaTypes as $mediaType)
                                    @if ( $mediaType->media_count > 0)
                                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6">
                                            <div class="card custom-card shadow-none border">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center gap-3 flex-wrap">
                                                        <div class="main-card-icon">
                                                            <div class="avatar avatar-md {{ $mediaType->app_background_id ? 'bg-'.$mediaType->app_background_id.'-transparent' : 'bg-primary-transparent' }} border border-opacity-10">
                                                                <div class="avatar avatar-sm {{ $mediaType->color->app_color_code ? 'text-'.$mediaType->color->app_color_code : 'text-primary' }}">
                                                                    <i class="{{ $mediaType->remix_icon->app_icon_code ?? 'ti ti-folder' }} fs-24"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-fill">
                                                                
                                                                <a data-bs-effect="effect-slide-in-right" data-bs-toggle="modal" href="#show_media-{{ $mediaType->id }}" class="d-inline fw-bold">{{ $mediaType->app_media_type_name }}</a>
                                                                <!-- Start::add task modal -->
                                                                <div class="modal fade" id="show_media-{{ $mediaType->id }}" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h6 class="modal-title">{{ $mediaType->app_media_type_name }}</h6>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            @php
                                                                                $mediaItems = $mediaType->mediaForProject($project->id)->get();
                                                                            @endphp

                                                                            @if ($mediaItems->count())
                                                                                <div class="table-responsive">
                                                                                    <table class="table text-nowrap">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Ime medija</th>
                                                                                                <th scope="col">Povezava</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($mediaItems as $media)
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <div class="flex-fill">
                                                                                                                <a href="{{ $media->media_value }}" target="_blank" class="fw-medium fs-14 d-block text-truncate project-list-title" title="{{ e($media->media_description ?? 'Povezava') }}">{{ $media->media_title }}</a>
                                                                                                                @if ($media->media_valid_from || $media->media_valid_until)
                                                                                                                    <small class="text-muted">
                                                                                                                        Velja od: {{ \Carbon\Carbon::parse($media->media_valid_from)->format('d.m.Y') ?? '-' }}
                                                                                                                        
                                                                                                                        @if ($media->media_valid_until != null)
                                                                                                                            do: 
                                                                                                                            {{ \Carbon\Carbon::parse($media->media_valid_until)->format('d.m.Y') ?? '-' }}
                                                                                                                        @endif
                                                                                                                    </small>
                                                                                                                @endif
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        @if ($media->media_value)
                                                                                                            <p class="mb-1">
                                                                                                                <a href="{{ $media->media_value }}" 
                                                                                                                    target="_blank" 
                                                                                                                    title="{{ e($media->media_description ?? 'Povezava') }}"
                                                                                                                    class="d-inline-flex align-items-center gap-1 text-primary text-decoration-underline">
                                                                                                                        {{ Str::limit($media->media_value, 50) }}
                                                                                                                    </a>
                                                                                                            </p>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            @else
                                                                                <div class="text-center">
                                                                                    <p class="mb-0">Ni najdenih medijev za ta tip.</p>
                                                                                </div>
                                                                            @endif
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light"
                                                                                    data-bs-dismiss="modal">Zapri</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End::add task modal -->
                                                        </div>
                                                        <div class="text-end">
                                                            <span class="badge bg-primary">{{ $mediaType->media_count }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                @endforeach
                            </div>



                            <!-- Start::row-2 -->
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                Projektne naloge
                                            </div>
                                            @if ($person->id == $project->project_owner_id )
                                                <div class="d-flex">
                                                    <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal" data-bs-target="#create-task"><i class="ri-add-line fw-medium align-middle me-1"></i> Dodajte nalogo</button>
                                                    <!-- Start::add task modal -->
                                                    <div class="modal fade" id="create-task" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="exampleModalLgLabel">Dodaj nalogo k projektu {{ $project->project_name }}
                                                                    </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <form method="POST" action="{{ route('project-tasks.store') }}" id="add-media-form-{{ $project->id }}">
                                                                    @csrf
                                                                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                                        <div class="modal-body">
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label for="project_task_title" class="form-label">Naslov naloge</label>
                                                                                    <input type="text" class="form-control" name="project_task_title" id="project_task_title" placeholder="Vnesite naslov naloge" value="{{ old('project_task_title') }}">
                                                                                </div>

                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label for="project_task_description" class="form-label">Opis naloge</label>
                                                                                    <textarea class="form-control" id="project_task_description" name="project_task_description" rows="3">{{ old('project_task_description') }}</textarea>
                                                                                </div>

                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label for="project_task_status_id" class="form-label">Status naloge</label>
                                                                                    <select class="form-select" name="project_task_status_id" id="project_task_status_id">
                                                                                        <option value="" disabled selected>Izberi status</option>
                                                                                        @foreach ($task_statuses as $status)
                                                                                            <option value="{{ $status->id }}" {{ old('project_task_status_id') == $status->id ? 'selected' : '' }}>
                                                                                                {{ $status->project_task_status_name_slo }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label for="project_task_parent_id" class="form-label">Nadrejena naloga (če obstaja)</label>
                                                                                    <select class="form-select" name="project_task_parent_id" id="project_task_parent_id">
                                                                                        <option value="" selected>— Ni nadrejene naloge —</option>
                                                                                        @foreach ($project_tasks as $task)
                                                                                            <option value="{{ $task->id }}" {{ old('project_task_parent_id') == $task->id ? 'selected' : '' }}>
                                                                                                {{ $task->project_task_title }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label for="project_task_due_date" class="form-label">Rok za izvedbo</label>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-text text-muted">
                                                                                            <i class="ri-calendar-line"></i>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="project_task_due_date" name="project_task_due_date" placeholder="Izberi datum" value="{{ old('project_task_due_date') }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Prekliči</button>
                                                                            <button type="submit" class="btn btn-primary">Potrdi</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End::add task modal -->
                                                    <div class="dropdown ms-2">
                                                        <button class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="javascript:void(0);">New Tasks</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Pending Tasks</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Completed Tasks</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Inprogress Tasks</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="card-body p-0">
                                            @if ($project->tasks->count()!=0)
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-center">Naloga</th>
                                                                <th scope="col" class="text-center">Status</th>
                                                                <th scope="col" class="text-center">Rok</th>
                                                                <th scope="col" class="text-center">Zaključena</th>
                                                                @if ($person->id == $project->project_owner_id )
                                                                    <th scope="col" class="text-center">Akcija</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($project->tasks as $project->task)
                                                                <tr class="task-list">
                                                                    <td>
                                                                        <span class="fw-medium">{{ $project->task->project_task_title }}</span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <span class="fw-medium text-primary">{{ $project->task->status->project_task_status_name }}</span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <span class="fw-medium">{{ \Carbon\Carbon::parse($project->task->project_task_due_date)->format('j. n. Y') }}</span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @if ($project->task->project_task_completed)
                                                                            <span class="badge bg-success">Zaključeno</span>
                                                                        @else
                                                                            <span class="badge bg-warning">V teku</span>
                                                                        @endif
                                                                    </td>
                                                                    @if ($person->id == $project->project_owner_id )
                                                                        <td class="text-center">
                                                                            <div class="d-flex align-items-center justify-content-center">
                                                                                <button class="btn btn-primary-light btn-icon btn-sm">
                                                                                    <i class="ri-edit-line"></i>
                                                                                </button>
                                                                                <button class="btn btn-danger-light btn-icon ms-1 btn-sm task-delete-btn">
                                                                                    <i class="ri-delete-bin-5-line"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col 12">
                                                        <p>Ni določenih projektnih nalog.</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End::row-2 -->

                            
                        </div>
                        <div class="col-xxl-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center w-100">
                                        <div class="me-2">
                                            <h6 class="card-title fw-medium">O projektu</h6>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($project->project_description), 300) !!}
                                    <a data-bs-effect="effect-slide-in-right" data-bs-toggle="modal" href="#project_description" class="d-inline fw-bold">Poglej več.</a>
                                    <div class="modal fade" id="project_description" tabindex="-1"
                                        aria-labelledby="exampleModalXlLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">O projektu</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                <p class="text-muted mb-0">{!! $project->project_description !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card custom-card justify-content-between">
                                <div class="card-body">
                                    <div class="d-flex gap-5 mb-4 flex-wrap">
                                        <div class="d-flex align-items-center gap-2 me-3">
                                            <span class="avatar avatar-md avatar-rounded me-1 bg-primary1-transparent"><i class="ri-calendar-event-line fs-18 lh-1 align-middle"></i></span>
                                            <div>
                                                <div class="fw-medium mb-0 task-title">
                                                    Začetek
                                                </div>
                                                <span class="fs-12 text-muted">{{ \Carbon\Carbon::parse($project->project_start_date)->translatedFormat('j. F Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 me-3">
                                            <span class="avatar avatar-md avatar-rounded me-1 bg-primary2-transparent"><i class="ri-time-line fs-18 lh-1 align-middle"></i></span>
                                            <div>
                                                <div class="fw-medium mb-0 task-title">
                                                    Konec
                                                </div>
                                                <span class="fs-12 text-muted">{{ \Carbon\Carbon::parse($project->project_end_date)->translatedFormat('j. F Y') }}</span>
                                            </div>
                                        </div>
                                        @if ($project->project_manager != null) 
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="avatar avatar-md p-1 avatar-rounded me-1 bg-primary-transparent"><img src="{{asset('build/assets/images/faces/11.jpg')}}" alt=""></span>
                                                <div>
                                                    <span class="d-block fs-14 fw-medium">Amith Catzem</span>
                                                    <span class="fs-12 text-muted">Project Manager</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @php
                                    $start = \Carbon\Carbon::parse($project->project_start_date);
                                    $end = \Carbon\Carbon::parse($project->project_end_date);
                                    $now = \Carbon\Carbon::now();

                                    $totalDays = $start->diffInDays($end);
                                    $elapsedDays = $start->diffInDays($now);

                                    $progress = $totalDays > 0 ? min(100, max(0, round(($elapsedDays / $totalDays) * 100))) : 0;
                                @endphp

                                <div class="progress progress-xl mb-3 progress-animate custom-progress-4" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-primary-gradient" style="width: {{ $progress }}%"></div>
                                    <div class="progress-bar-label">{{ $progress }}%</div>
                                </div>
                            </div>
                            <div class="card custom-card justify-content-between">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Dogodki
                                    </div>
                                    <a href="/school/projects/{{ $project->id }}/calendars/events" class="btn btn-sm btn-light">Poglej vse</a>
                                </div>
                                <div class="card-body">
                                    @if (!empty($project_events))
                                        <div class="p-3 border-bottom" id="full-calendar-activity">
                                        <ul class="list-unstyled mb-0 fullcalendar-events-activity">
                                            @foreach($project_events as $event)
                                                <li>
                                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <p class="mb-1 fw-medium">{{ $event->calendar_event_title }}</p>
                                                        <span class="badge bg-light text-default mb-1">
                                                            {{ $event->calendar_event_start_time->format('g:iA') }} - {{ $event->calendar_event_end_time->format('g:iA') }}
                                                        </span>
                                                    </div>
                                                    <p class="mb-0 text-muted fs-12">{{ $event->description }}</p> <!-- predpostavljam, da obstaja opis dogodka -->
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @else
                                        <div class="text-center">
                                            <h5 class="mb-0">Danes ni dogodkov.</h5>
                                        </div>

                                    @endif
                                </div>
                                
                            </div>
                            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach($project_posts as $index => $post)
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $index }}" 
                                            class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                                            aria-label="Slide {{ $index + 1 }}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach($project_posts as $index => $post)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                                            <img src="/storage/posts/{{ $post->post_cover_image_400x400 }}" class="d-block w-100" alt="{{ $post->post_title }}">
                                            <div class="carousel-caption d-none d-md-block">
                                                <a href="/school/posts/{{ $post->id }}">
                                                    <h5>{{ $post->post_title }}</h5>
                                                    <p class="op-7">{{ Str::limit($post->post_summary, 50) }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Prejšnji</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Naslednji</span>
                                </button>
                            </div>
                            <div class="card custom-card justify-content-between">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Sodelujoči
                                    </div>
                                    <a href="/school/projects/{{ $project->id }}/people/app_positions" class="btn btn-sm btn-light">Poglej vse</a>
                                </div>
                                <div class="card-body">
                                    @if (!empty($project_people))
                                        <ul>
                                            <div class="d-flex align-items-center flex-fill">
                                                <div class="avatar-list-stacked">
                                                @foreach ($project_people as $key => $project_person)
                                                    @if ($key < 5)
                                                        <!-- Avatar z naslovom (title) -->
                                                        <span class="avatar avatar-lg avatar-rounded" 
                                                            title="{{ $project_person->person_name }} {{ $project_person->person_surname }}">
                                                            <img src="/storage/users/{{ $project_person->user->user_profile_image }}" alt="">
                                                        </span>
                                                    @endif
                                                @endforeach




                                                    <!-- Če je več kot 5 oseb, prikažemo dodatno ikono -->
                                                </div>
                                            </div>
                                        </ul>
                                    @else
                                        <div class="text-center">
                                            <h5 class="mb-0">Ni najdenih oseb na projektu</h5>
                                        </div>

                                    @endif
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                    <!--End::row-1 -->


                    
                    

@endsection

@section('scripts')
	
        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')

        <!-- Modal JS -->
        @vite('resources/assets/js/modal.js')
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#project_task_due_date", {
            locale: "sl",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "j. n. Y",
            allowInput: true,
            defaultDate: "{{ old('project_task_due_date') }}"
        });
    });
</script>


@endsection
