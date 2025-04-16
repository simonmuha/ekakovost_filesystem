
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
                                <li class="breadcrumb-item active" aria-current="page">Kampanje</li>
                            </ol>
                            <h1 class="page-title fw-medium fs-18 mb-0">Šolsko leto: {{ $school_year->year->school_year_name }}</h1>
                        </div>
                        @if (1==2)
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-text bg-white border"> <i class="ri-calendar-line"></i> </div>
                                    <input type="text" class="form-control breadcrumb-input" id="daterange" placeholder="Search By Date Range">
                                </div>
                            </div>
                            <div class="btn-list">
                                <button class="btn btn-white btn-wave">
                                    <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
                                </button>
                                <button class="btn btn-primary btn-wave me-0">
                                    <i class="ri-share-forward-line me-1"></i> Share
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- End::page-header -->

                    <!-- Start::Last school year -->
    @if(1==2)
    <div class="d-flex align-items-center gap-2 flex-wrap">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-text bg-white border"> <i class="ri-calendar-line"></i> </div>
                <input type="text" class="form-control breadcrumb-input" id="daterange" placeholder="Search By Date Range">
            </div>
        </div>
        <div class="btn-list">
            <button class="btn btn-white btn-wave">
                <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
            </button>
            <button class="btn btn-primary btn-wave me-0">
                <i class="ri-share-forward-line me-1"></i> Share
            </button>
        </div>
    </div>
    @endif
    </div>
    <!-- End::Last school year -->
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xxl-3 col-xl-6">
                    <div class="card custom-card overflow-hidden main-content-card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <div>
                                    <span class="text-muted d-block mb-1">Število kampanij</span>
                                    <h4 class="fw-medium mb-0">{{ $quality_campaigns->count() }}</h4>
                                </div>
                                <div class="lh-1">
                                    <span class="avatar avatar-md avatar-rounded bg-primary">
                                        <i class="ti ti-shopping-cart fs-5"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="text-muted fs-13">Increased By <span class="text-success">2.56%<i class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start:: row-3 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                    </div>
                </div>
                @if ($quality_campaigns->count() > 0)
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">Ime</th>
                                        <th class="text-center">Začetek</th>
                                        <th class="text-center">Konec</th>
                                        <th class="text-center">Ciljne skupine</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quality_campaigns as $quality_campaign)
                                        <tr>
                                            <td>
                                                <strong>{{ \Illuminate\Support\Str::limit($quality_campaign->quality_campaign_name, 30) }}</strong>
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($quality_campaign->quality_campaign_date_start)->format('j. n. Y') }}
                                            </td>
                                            <td class="text-center"> 
                                                {{ \Carbon\Carbon::parse($quality_campaign->quality_campaign_date_end)->format('j. n. Y') }}
                                            </td>
                                            <td class="text-center">
                                                @foreach ($quality_campaign->targetgroups as $quality_campaign_targetgroup)
                                                    <span class="badge bg-primary-transparent">{{$quality_campaign_targetgroup->quality_target_group_name}}</span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <i class="{{ $quality_campaign->status->appIconRemixIcon->app_icon_code }}"
                                                    title="{{ $quality_campaign->status->appIconRemixIcon->app_icon_name }}"
                                                    style="color: {{ $quality_campaign->status->quality_status_color }}; background-color: {{ $quality_campaign->status->quality_status_background }}; padding: 5px; border-radius: 5px;">
                                                </i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">Ni kampanj</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        
    </div>
    
    <!-- Start::Last school year -->
    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <h1 class="page-title fw-medium fs-18 mb-0">Šolsko leto {{ $last_school_year->year->school_year_name }}</h1>
    </div>
    @if(1==2)
    <div class="d-flex align-items-center gap-2 flex-wrap">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-text bg-white border"> <i class="ri-calendar-line"></i> </div>
                <input type="text" class="form-control breadcrumb-input" id="daterange" placeholder="Search By Date Range">
            </div>
        </div>
        <div class="btn-list">
            <button class="btn btn-white btn-wave">
                <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
            </button>
            <button class="btn btn-primary btn-wave me-0">
                <i class="ri-share-forward-line me-1"></i> Share
            </button>
        </div>
    </div>
    @endif
    </div>
    <!-- End::Last school year -->
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xxl-3 col-xl-6">
                    <div class="card custom-card overflow-hidden main-content-card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <div>
                                    <span class="text-muted d-block mb-1">Število kampanij</span>
                                    <h4 class="fw-medium mb-0">{{ $quality_campaigns_last_year->count() }}</h4>
                                </div>
                                <div class="lh-1">
                                    <span class="avatar avatar-md avatar-rounded bg-primary">
                                        <i class="ti ti-shopping-cart fs-5"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="text-muted fs-13">Increased By <span class="text-success">2.56%<i class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Start:: row-3 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">Ime</th>
                                    <th class="text-center">Začetek</th>
                                    <th class="text-center">Konec</th>
                                    <th class="text-center">Ciljne skupine</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quality_campaigns_last_year as $quality_campaign)
                                    <tr>
                                        <td>
                                            <a href="/school/quality/campaigns/{{ $quality_campaign->id }}" class="text-body"> <strong>{{ \Illuminate\Support\Str::limit($quality_campaign->quality_campaign_name, 30) }}</strong></a>
                                        </td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($quality_campaign->quality_campaign_date_start)->format('j. n. Y') }}
                                        </td>
                                        <td class="text-center"> 
                                            {{ \Carbon\Carbon::parse($quality_campaign->quality_campaign_date_end)->format('j. n. Y') }}
                                        </td>
                                        <td class="text-center">
                                            @foreach ($quality_campaign->targetgroups as $quality_campaign_targetgroup)
                                                <span class="badge bg-primary-transparent">{{$quality_campaign_targetgroup->quality_target_group_name}}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <i class="{{ $quality_campaign->status->appIconRemixIcon->app_icon_code }}"
                                                title="{{ $quality_campaign->status->appIconRemixIcon->app_icon_name }}"
                                                style="color: {{ $quality_campaign->status->quality_status_color }}; background-color: {{ $quality_campaign->status->quality_status_background }}; padding: 5px; border-radius: 5px;">
                                            </i>
                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- End:: row-3 -->
@endsection

@section('scripts')
	
        <!-- Apex Charts JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Sales Dashboard --> 
        @vite('resources/assets/js/sales-dashboard.js')

@endsection
