
@extends('layouts.school_master')


@section('styles')

        <!-- FlatPickr CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/flatpickr/flatpickr.min.css')}}">

@endsection

@section('content')
        
                    <!-- Start::page-header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">
                                        Kakovost
                                    </a>
                                </li>
                                 <li class="breadcrumb-item active" aria-current="page"><a href="/school/quality/campaigns">Kampanje</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">{{ $quality_campaign->quality_campaign_name }}</li>
                            </ol>
                            <h1 class="page-title fw-medium fs-18 mb-0">{{ $quality_campaign->quality_campaign_name }}</h1>
                        </div>
                        
                    </div>
                    <!-- End::page-header -->

                    <!-- Start:: row-1 -->
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-xxl-3 col-xl-6">
                                    <div class="card custom-card overflow-hidden main-content-card">
                                        <div class="card-body">
                                            @php
                                                use Carbon\Carbon;

                                                $startDate = Carbon::parse($quality_campaign->quality_campaign_date_start);
                                                $endDate = Carbon::parse($quality_campaign->quality_campaign_date_end);

                                                $durationInDays = $startDate->diffInDays($endDate) + 1; // +1 da vključi oba datuma
                                            @endphp
                                            <div class="d-flex align-items-start justify-content-between mb-2">
                                                <div>
                                                    <span class="text-muted d-block mb-1">Trajanje</span>
                                                    <h4 class="fw-medium mb-0">{{ $durationInDays }} dni</h4>
                                                </div>
                                                <div class="lh-1">
                                                    <span class="avatar avatar-md avatar-rounded bg-primary">
                                                        <i class="ti ti-shopping-cart fs-5"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-6">
                                    <div class="card custom-card overflow-hidden main-content-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between mb-2">
                                                <div>
                                                    <span class="d-block text-muted mb-1">Število odgovorov</span>
                                                    <h4 class="fw-medium mb-0">{{ $totalAnswers }}</h4>
                                                </div>
                                                <div class="lh-1">
                                                    <span class="avatar avatar-md avatar-rounded bg-primary1">
                                                        <i class="ti ti-users fs-5"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-6">
                                    <div class="card custom-card overflow-hidden main-content-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between mb-2">
                                                <div>
                                                    <span class="text-muted d-block mb-1">Število vprašanj</span>
                                                    <h4 class="fw-medium mb-0">{{ $totalQuestions }}</h4>
                                                </div>
                                                <div class="lh-1">
                                                    <span class="avatar avatar-md avatar-rounded bg-primary2">
                                                        <i class="ti ti-currency-dollar fs-5"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-6">
                                    <div class="card custom-card overflow-hidden main-content-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between mb-2">
                                                <div>
                                                    <span class="text-muted d-block mb-1">Vključeni oddelki</span>
                                                    <h4 class="fw-medium mb-0">{{ $quality_campaign_target_group_person_roles->count() }}   </h4>
                                                </div>
                                                <div class="lh-1">
                                                    <span class="avatar avatar-md avatar-rounded bg-primary3">
                                                        <i class="ti ti-chart-bar fs-5"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-8 col-xl-6">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div >
                                                <table class="table text-nowrap">
                                                    @if ($quality_campaign->questionnaires->count() > 0)    
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                            Vprašalniki
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($quality_campaign->questionnaires as $quality_campaign_questionnaire)
                                                            <tr>
                                                                <td>
                                                                    {{ $quality_campaign_questionnaire->quality_questionnaire_name }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    @else
                                                        V kampanji ni vprašalnikov
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                Ciljne skupine
                                            </div>
                                            <div class="dropdown">
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Download</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Import</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Export</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                        <p class="fw-bold mb-2">Vloge</p>
                                            @if (count($quality_campaign_target_group_person_roles) > 0)
                                                <ul class="list-unstyled d-flex align-items-center flex-wrap gap-2">
                                                    @foreach ($quality_campaign_target_group_person_roles as $quality_campaign_target_group_person_role)
                                                        <li>
                                                            <span class="badge px-3 py-1 fw-normal bg-{{ $quality_campaign_target_group_person_role->quality_person_role_color }}">
                                                                <i class="{{ $quality_campaign_target_group_person_role->appIconRemixIcon->app_icon_code }} me-1"></i>
                                                                {{ $quality_campaign_target_group_person_role->quality_person_role_name }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>Ni izbranih vlog</p>
                                            @endif
                                            <br>
                                            <p class="fw-bold mb-2">Oddelki</p>
                                            @if (count($quality_campaign_classes) > 0)
                                                <ul class="list-unstyled d-flex align-items-center flex-wrap gap-2">
                                                    @foreach ($quality_campaign_classes as $quality_campaign_class)
                                                        <li>
                                                            <span class="badge px-3 py-1 fw-normal bg-primary">
                                                                <i class="{{ $quality_campaign_class->appIconRemixIcon->app_icon_code }} me-1"></i>
                                                                {{ $quality_campaign_class->class_year }}. {{ $quality_campaign_class->class_name }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                            <p>Ni izbranih vlog</p>
                                            @endif
                                            <br>
                                            <p class="fw-bold mb-2">Izbrane ciljne skupine</p>
                                            @if (count($quality_campaign->targetgroups) > 0) 
                                                @foreach ($quality_campaign->targetgroups as $quality_campaign_targetgroup)
                                                    <tr style="border-bottom: 1pt solid black;">
                                                        <td style="width: 40%; text-align:left">{{$quality_campaign_targetgroup->quality_target_group_name}}</td>
                                                        <td style="width: 60%; text-align: center;">
                                                        </td>
                                                    </tr>
                                                    
                                                @endforeach
                                            @else
                                                <tr style="border-bottom: 1pt solid black;">
                                                    <th colspan="2" style="text-align: center;">
                                                        <small>Kampanja nima ciljne skupine.
                                                        </small>
                                                    </th>
                                                </tr>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card overflow-hidden shadow-sm rounded-3 border-0">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                Splošno
                                            </div>
                                            <div class="dropdown"> 
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <!-- Šolsko leto -->
                                            <div class="mb-3 d-flex align-items-center">
                                                <i class="ri-calendar-2-line text-primary fs-5 me-2"></i>
                                                <span class="text-muted fw-normal">Šolsko leto:</span>&nbsp;
                                                <span class="fw-bold">{{ $quality_campaign->school_organization_year->year->school_year_name }}</span>
                                            </div>

                                            <!-- Datum začetka -->
                                            <div class="mb-3 d-flex align-items-center">
                                                <i class="ri-time-line text-success fs-5 me-2"></i>
                                                <span class="text-muted fw-normal">Datum začetka:</span>&nbsp;
                                                <span class="fw-bold">{{ \Carbon\Carbon::parse($quality_campaign->quality_campaign_date_start)->format('j. n. Y') }}</span>
                                            </div>

                                            <!-- Datum zaključka -->
                                            <div class="mb-3 d-flex align-items-center">
                                                <i class="ri-time-line text-danger fs-5 me-2"></i>
                                                <span class="text-muted fw-normal">Datum zaključka:</span>&nbsp;
                                                <span class="fw-bold">{{ \Carbon\Carbon::parse($quality_campaign->quality_campaign_date_end)->format('j. n. Y') }}</span>
                                            </div>

                                            <!-- Status -->
                                            <div class="d-flex align-items-center">
                                                
                                                <span class="text-muted fw-normal">Status:</span>&nbsp;
                                                <span class="badge px-3 py-1 fw-normal bg-{{$quality_campaign->status->quality_status_background }}" >
                                                <i class="{{$quality_campaign->status->appIconRemixIcon->app_icon_code }}" ></i> {{ $quality_campaign->status->quality_status_name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                Opis
                                            </div>
                                            <div class="dropdown"> 
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="p-3 pb-0">
                                                {!! $quality_campaign->quality_campaign_description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-1 -->



                    

@endsection

@section('scripts')
	
        <!-- Apex Charts JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Sales Dashboard --> 
        @vite('resources/assets/js/sales-dashboard.js')

@endsection
