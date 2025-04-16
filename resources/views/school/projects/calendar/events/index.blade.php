
@extends('layouts.school_master')

@section('styles')



@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projekti</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $project->project_name }}</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Dogodki</h1>
                        </div>
                        <div class="btn-list">
                            
                        </div>
                    </div>
                    <!-- Page Header Close -->
                    
                    <div class="container">

        @if($calendarEvents->isEmpty())
            <p>Ni dogodkov za ta projekt.</p>
        @else
            <!-- Start:: row-1 -->
            <div class="row justify-content-center">
                <div class="col-xxl-11">
                    <div class="card custom-card border overflow-hidden">
                        <div class="card-header">
                            <div class="card-title">
                            {{ $project->project_name }}
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class="timeline container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="timeline-container">
                                            @foreach($calendarEvents as $event)
                                                <div class="timeline-end mb-3">
                                                    <span class="p-1 fs-11 bg-primary2 text-fixed-white backdrop-blur text-center border border-primary2 border-opacity-10 rounded-1 lh-1 fw-medium">
                                                        {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->format('j. n. Y') }}
                                                    </span>
                                                </div>
                                                <div class="timeline-right">
                                                    <div class="timeline-content">
                                                        <p class="timeline-date text-muted mb-2">
                                                        {{ \Carbon\Carbon::parse($event->calendar_event_start_time)->locale('sl')->isoFormat('H:mm, dddd') }}


                                                        </p>
                                                        <div class="timeline-box">
                                                            <p class="mb-2">
                                                                <b>{{ $event->calendar_event_title }}</b>
                                                            </p>
                                                            <p class="mb-2">
                                                                {{ $event->calendar_event_description_short ?? $event->calendar_event_description }}
                                                            </p>
                                                            <p class="profile-activity-media mb-0">
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{ asset('build/assets/images/media/media-17.jpg') }}" alt="" class="mb-0">
                                                                </a>  
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:: row-1 -->
        @endif
    </div>

                    

@endsection

@section('scripts')
	


@endsection
