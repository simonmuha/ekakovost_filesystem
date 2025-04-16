
@extends('layouts.school_master')

@section('styles')



@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{$person->organization->app_organization_name_short}}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projekti</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pregled projektov</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Seznam projektov</h1>
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    
                    @if ($projects->count() > 0) 
                        <!-- Start::row-2 -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body p-0">
                                          
                                        <div class="table-responsive">
                                            <table class="table text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ime proejkta</th>
                                                        <th scope="col">Opis</th>
                                                        <th scope="col">Sodelavci</th>
                                                        <th scope="col">Začetek</th>
                                                        <th scope="col">Konec</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projects as $project)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    
                                                                    <div class="flex-fill">
                                                                        <a href="/school/projects/{{ $project->id }}" class="fw-medium fs-14 d-block text-truncate project-list-title">{{ \Illuminate\Support\Str::limit($project->project_name, 35, '...') }}</a>
                                                                        @if ( $project->tasks->count() != 0)
                                                                            <span class="text-muted d-block fs-12">Skupaj <span class="fw-medium text-default">{{ $project->tasks->count() }}</span> nalog</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text-muted mb-0 project-list-description">{{ \Illuminate\Support\Str::limit($project->project_description_short, 80, '...') }}</p>
                                                            </td>
                                                            <td>
                                                                <div class="avatar-list-stacked">
                                                                @foreach ($project->people->take(3) as $project_person)
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="/storage/users/{{ $project_person->user->user_profile_image }}" alt="img" title="{{ $project_person->person_name }} {{ $project_person->person_surname }}">
                                                                    </span>
                                                                @endforeach

                                                                @if ($project->people->count() > 3)
                                                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                                        +{{ $project->people->count() - 5 }}
                                                                    </a>
                                                                @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($project->project_start_date)->locale('sl')->translatedFormat('j. F, Y') }}
                                                            </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($project->project_end_date)->locale('sl')->translatedFormat('j. F, Y') }}
                                                            </td>
                                                            
                                                            <td>
                                                                <span class="badge bg-{{ $project->project_status->project_status_color }}-transparent"> {{ $project->project_status->project_status_name_slo }}</span>
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
                        
                    @else
                        <div class="text-center">
                            <h5 class="mb-0">Ni najdenih projektov</h5>
                        </div>
                    @endif
@endsection

@section('scripts')
	


@endsection
