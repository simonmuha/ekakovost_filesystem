
@extends('layouts.school_admin_master')

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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Administracija šole</a></li>
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
                                        <div class="ms-auto align-self-start">
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="/school_admin/projects/{{ $project->id }}/edit"><i class="ri-eye-line align-middle me-1 d-inline-block"></i>Uredi</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="fs-15 fw-medium mb-2">Key tasks :</div>
                                                <ul class="task-details-key-tasks mb-0">
                                                    <li>Design and implement a user-friendly dashboard interface.</li>
                                                    <li>Integrate data sources and APIs to fetch customer feedback data.</li>
                                                    <li>Develop interactive data visualizations for easy interpretation.</li>
                                                    <li>Implement filters and sorting functionalities for data analysis.</li>
                                                    <li>Create user authentication and access control features.</li>
                                                    <li>Perform usability testing and iterate based on feedback.</li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="fs-15 fw-medium">Sub Tasks :</div>
                                                    <a href="javascript:void(0);" class="btn btn-primary-light btn-wave btn-sm waves-effect waves-light">See More</a>
                                                </div>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2"><i class="ri-link fs-15 text-secondary lh-1 p-1 bg-secondary-transparent rounded-circle"></i></div>
                                                            <div class="fw-medium">Research latest web development trends.</div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2"><i class="ri-link fs-15 text-secondary lh-1 p-1 bg-secondary-transparent rounded-circle"></i></div>
                                                            <div class="fw-medium">Create technical specifications document.</div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2"><i class="ri-link fs-15 text-secondary lh-1 p-1 bg-secondary-transparent rounded-circle"></i></div>
                                                            <div class="fw-medium">Optimize website for mobile responsiveness.</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-15 fw-medium mb-2">Skills :</div>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <span class="badge bg-light text-default border">UI/UX Design</span>
                                        <span class="badge bg-light text-default border">Data Integration</span>
                                        <span class="badge bg-light text-default border">Data Visualization</span>
                                        <span class="badge bg-light text-default border">Front-End Development</span>
                                        <span class="badge bg-light text-default border">Authentication Systems</span>
                                        <span class="badge bg-light text-default border">Usability Testing</span>
                                        <span class="badge bg-light text-default border">Agile Methodology</span>
                                        <span class="badge bg-light text-default border">API Development</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                                        <div class="d-flex gap-3 align-items-center">
                                            <span class="fs-12">Assigned To :</span>
                                            <div class="avatar-list-stacked">
                                                <span class="avatar avatar-sm avatar-rounded" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary" data-bs-original-title="John">
                                                    <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                                </span>
                                                <span class="avatar avatar-sm avatar-rounded" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary" data-bs-original-title="Emily">
                                                    <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                                </span>
                                                <span class="avatar avatar-sm avatar-rounded" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary" data-bs-original-title="Liam">
                                                    <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img">
                                                </span>
                                                <span class="avatar avatar-sm avatar-rounded" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary" data-bs-original-title="Sophia">
                                                    <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img">
                                                </span>
                                                <span class="avatar avatar-sm avatar-rounded" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-primary" data-bs-original-title="Charlotte">
                                                    <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-3 align-items-center">
                                            <span class="fs-12">Status:</span>
                                            <span class="d-block"><span class="badge bg-info">On going</span></span>
                                        </div>
                                        <div class="d-flex gap-3 align-items-center">
                                            <span class="fs-12">Priority:</span>
                                            <span class="d-block fs-14 fw-medium"><span class="badge bg-primary3">Medium</span></span>
                                        </div>
                                    </div>
                                </div>                            
                            </div>  
                            
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">To Do Tasks</div>
                                    <div class="btn btn-sm btn-primary-light btn-wave"><i class="ri-add-line align-middle me-1 fw-medium"></i>Add Task</div>
                                </div>
                                <div class="card-body p-0 position-relative" id="todo-content">
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="form-check-input check-all" type="checkbox" id="all-tasks" value="" aria-label="...">
                                                        </th>
                                                        <th class="todolist-handle-drag">

                                                        </th>
                                                        <th scope="col">Task Title</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">End Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="todo-drag">
                                                    <tr class="todo-box">
                                                        <td class="task-checkbox"><input class="form-check-input" type="checkbox" value="" aria-label="..." checked=""></td>
                                                        <td>
                                                            <button class="btn btn-icon btn-sm btn-wave btn-light todo-handle">: :</button>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">Implement responsive design</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium text-primary2"><i class="ri-circle-line fw-semibold fs-7 me-2 lh-1 align-middle"></i>Not Started</span>
                                                        </td>
                                                        <td>
                                                            17-Jan-2024
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex gap-2">
                                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-light btn-wave waves-effect waves-light">
                                                                    <i class="ri-edit-line"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger-light btn-wave waves-effect waves-light">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="todo-box">
                                                        <td class="task-checkbox"><input class="form-check-input" type="checkbox" value="" aria-label="..."></td>
                                                        <td>
                                                            <button class="btn btn-icon btn-sm btn-wave btn-light todo-handle">: :</button>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">Fix login authentication issue</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium text-success fs-12"><i class="ri-circle-line fw-semibold fs-7 me-2 lh-1 align-middle"></i>Completed</span>
                                                        </td>
                                                        <td>
                                                            17-Jan-2024
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex gap-2">
                                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-light btn-wave waves-effect waves-light">
                                                                    <i class="ri-edit-line"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger-light btn-wave waves-effect waves-light">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center w-100">
                                        <div class="me-2">
                                            <h6 class="card-title fw-medium">O projektu</h6>
                                        </div>
                                        <div class="dropdown ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light" data-bs-toggle="dropdown">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Week</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($project->project_description), 200) !!}
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
                                        Sodelujoči
                                    </div>
                                    <a href="/school_admin/projects/{{ $project->id }}/people/app_positions" class="btn btn-sm btn-light">Poglej vse</a>
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
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Mediji
                                    </div>
                                    <a href="/school_admin/projects/{{ $project->id }}/medias" class="btn btn-sm btn-light">Poglej vse</a>
                                </div>
                                <div class="card-body">
                                    @foreach ($app_media_types as $app_media_type)
                                        <div class="col-xl-12">
                                            <div class="card custom-card card-bg-{{ $app_media_type->color->app_color_code }}">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded">
                                                                <i class="{{ $app_media_type->remix_icon->app_icon_code }}"></i>
                                                            </span>
                                                        </div>
                                                        <div class="">
                                                            <div class="fs-15 fw-medium">{{ $app_media_type->app_media_type_name }}</div>
                                                            <p class="mb-0 text-fixed-white op-7 fs-12">{{ $app_media_type->remix_icon->app_icon_code }}</p>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <a href="javascript:void(0);" class="text-fixed-white"><i class="bi bi-arrow-right-circle"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    
                                </div>
                                
                            </div>

                            <div class="card custom-card justify-content-between">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                        Projektne aktivnosti
                                        </div>
                                        <a href="/school_admin/projects/{{ $project->id }}/people/app_positions" class="btn btn-sm btn-light">Poglej vse</a>
                                    </div>
                                <div class="card-body">
                                    <ul class="list-unstyled profile-timeline">
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm bg-primary avatar-rounded profile-timeline-avatar">
                                                    S
                                                </span>
                                                <div class="mb-2 d-flex align-items-start gap-2">
                                                    <div>
                                                        <span class="fw-medium">Začetek projekta</span>
                                                    </div>
                                                    <span class="ms-auto bg-light text-muted badge">1. november 2023</span>
                                                </div>
                                                
                                                <p class="text-muted mb-0">
                                                    
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm bg-primary avatar-rounded profile-timeline-avatar">
                                                    S
                                                </span>
                                                <div class="mb-2 d-flex align-items-start gap-2">
                                                    <div>
                                                        <span class="fw-medium">Predstavitev projekta</span>
                                                    </div>
                                                    <span class="ms-auto bg-light text-muted badge">12. december 2023</span>
                                                </div>
                                                
                                                <p class="text-muted mb-0">
                                                    
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Dokumenti
                                    </div>
                                    <div class="dropdown">
                                        <div class="btn btn-light btn-full btn-sm" data-bs-toggle="dropdown">Poglej vse dokumente<i class="ti ti-chevron-down ms-1"></i>
                                        </div>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Multimedija</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Dokumenti</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="avatar avatar-md avatar-rounded p-2 bg-light lh-1">
                                                    <img src="{{asset('build/assets/images/media/file-manager/1.png')}}" alt="">
                                                </span>
                                                <div class="flex-fill">
                                                    <a href="javascript:void(0);"><span class="d-block fw-medium">Project Proposal.pdf</span></a>
                                                    <span class="d-block text-muted fs-12 fw-normal">1.2MB</span>
                                                </div>
                                                <div class="btn-list">
                                                    <button class="btn btn-sm btn-icon btn-info-light btn-wave"><i class="ri-edit-line"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-danger-light btn-wave"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="card custom-card justify-content-between">
                                <div class="card-header">
                                    <div class="card-title">Project Discussions</div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled profile-timeline">
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm bg-primary avatar-rounded profile-timeline-avatar">
                                                    A
                                                </span>
                                                <div class="mb-2 d-flex align-items-start gap-2">
                                                    <div>
                                                        <span class="fw-medium">Project Kick-off Meeting</span>
                                                    </div>
                                                    <span class="ms-auto bg-light text-muted badge">15,Jun 2024 - 06:20</span>
                                                </div>
                                                <p class="text-muted mb-0">
                                                    Discuss project scope, objectives, and timelines.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm bg-primary2 avatar-rounded profile-timeline-avatar">
                                                    B
                                                </span>
                                                <div class="mb-2 d-flex align-items-start gap-2">
                                                    <div>
                                                        <span class="fw-medium">Project Details Page Planning</span>
                                                    </div>
                                                    <span class="ms-auto bg-light text-muted badge">20, Jun 2024 - 09:00</span>
                                                </div>
                                                <p class="text-muted mb-0">
                                                    Define feature requirements and layout for the project details page.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm avatar-rounded profile-timeline-avatar">
                                                    <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="">
                                                </span>
                                                <div class="text-muted mb-2 d-flex align-items-start gap-2 flex-wrap flex-xxl-nowrap">
                                                    <div>
                                                        <span class="text-default"><b>Brenda Adams</b> shared a document with <b>you</b></span>.
                                                    </div>
                                                    <span class="ms-auto bg-light text-muted badge">18,Jun 2024 - 09:15</span>
                                                </div>
                                                <p class="profile-activity-media mb-0">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/media/file-manager/3.png')}}" alt="">
                                                    </a>  
                                                    <span class="fs-11 text-muted">728.62KB</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm bg-primary3 avatar-rounded profile-timeline-avatar">
                                                    J
                                                </span>
                                                <div class="text-muted mb-2 d-flex align-items-start gap-2 flex-wrap flex-xxl-nowrap">
                                                    <div>
                                                        <span class="text-default"><b>You</b> 
                                                        shared a post with 4 people <b>John,Emma,Liam,Sophie</b></span>.
                                                    </div>
                                                    <span class="ms-auto bg-light text-muted badge">30,Jun 2024 - 13:20</span>
                                                </div>
                                                <p class="profile-activity-media mb-2">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/media/media-21.jpg')}}" alt="">
                                                    </a>   
                                                </p>
                                                <div>
                                                    <div class="avatar-list-stacked">
                                                        <span class="avatar avatar-xs avatar-rounded">
                                                            <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                                        </span>
                                                        <span class="avatar avatar-xs avatar-rounded">
                                                            <img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img">
                                                        </span>
                                                        <span class="avatar avatar-xs avatar-rounded">
                                                            <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                        </span>
                                                        <span class="avatar avatar-xs avatar-rounded">
                                                            <img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm avatar-rounded profile-timeline-avatar">
                                                    <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="">
                                                </span>
                                                <div class="mb-2">
                                                    <span class="fw-medium">Security and Compliance Audit</span>
                                                </div>
                                                <p class="text-muted mb-0 fs-12">
                                                    Ensure the system adheres to security and regulatory requirements.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="avatar avatar-sm shadow-sm avatar-rounded profile-timeline-avatar">
                                                    <img src="{{asset('build/assets/images/media/media-45.jpg')}}" alt="">
                                                </span>
                                                <div class="mb-1 d-flex align-items-start gap-2">
                                                    <div>
                                                        <b>Lucas</b> Commented on Project <a class="text-secondary" href="javascript:void(0);"><u>#System Integration</u></a>.
                                                    </div>
                                                    <span class="ms-auto bg-light text-muted badge">25,Jun 2024 - 10:52</span>
                                                </div>
                                                <p class="text-muted">Integration progress looks good, keep it up! &#128077;</p>
                                                <p class="profile-activity-media mb-0">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/media/media-28.jpg')}}" alt="">
                                                    </a>    
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/media/media-30.jpg')}}" alt="">
                                                    </a>    
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <div class="d-sm-flex align-items-center lh-1">
                                        <div class="me-sm-2 mb-2 mb-sm-0 p-1 rounded-circle bg-primary-transparent d-inline-block">
                                            <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="" class="avatar avatar-sm avatar-rounded">
                                        </div>
                                        <div class="flex-fill">
                                            <div class="input-group flex-nowrap">
                                                <input type="text" class="form-control w-sm-50 border shadow-none" placeholder="Share your thoughts" aria-label="Recipient's username with two button addons">
                                                <button class="btn btn-primary-light btn-wave waves-effect waves-light" type="button"><i class="bi bi-emoji-smile"></i></button>
                                                <button class="btn btn-primary-light btn-wave waves-effect waves-light" type="button"><i class="bi bi-paperclip"></i></button>
                                                <button class="btn btn-primary-light btn-wave waves-effect waves-light" type="button"><i class="bi bi-camera"></i></button>
                                                <button class="btn btn-primary btn-wave waves-effect waves-light text-nowrap" type="button">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Project Documents
                                    </div>
                                    <div class="dropdown">
                                        <div class="btn btn-light btn-full btn-sm" data-bs-toggle="dropdown">View All<i class="ti ti-chevron-down ms-1"></i>
                                        </div>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Download</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Import</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Export</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="avatar avatar-md avatar-rounded p-2 bg-light lh-1">
                                                    <img src="{{asset('build/assets/images/media/file-manager/1.png')}}" alt="">
                                                </span>
                                                <div class="flex-fill">
                                                    <a href="javascript:void(0);"><span class="d-block fw-medium">Project Proposal.pdf</span></a>
                                                    <span class="d-block text-muted fs-12 fw-normal">1.2MB</span>
                                                </div>
                                                <div class="btn-list">
                                                    <button class="btn btn-sm btn-icon btn-info-light btn-wave"><i class="ri-edit-line"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-danger-light btn-wave"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="avatar avatar-rounded bg-light lh-1">
                                                    <img src="{{asset('build/assets/images/media/file-manager/3.png')}}" alt="">
                                                </span>
                                                <div class="flex-fill">
                                                    <a href="javascript:void(0);"><span class="d-block fw-medium">Contracts.docx</span></a>
                                                    <span class="d-block text-muted fs-12 fw-normal">1.5MB</span>
                                                </div>
                                                <div class="btn-list">
                                                    <button class="btn btn-sm btn-icon btn-info-light btn-wave"><i class="ri-edit-line"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-danger-light btn-wave"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="avatar avatar-md avatar-rounded p-2 bg-light lh-1">
                                                    <img src="{{asset('build/assets/images/media/file-manager/1.png')}}" alt="">
                                                </span>
                                                <div class="flex-fill">
                                                    <a href="javascript:void(0);"><span class="d-block fw-medium">Meeting Notes.txt</span></a>
                                                    <span class="d-block text-muted fs-12 fw-normal">256KB</span>
                                                </div>
                                                <div class="btn-list">
                                                    <button class="btn btn-sm btn-icon btn-info-light btn-wave"><i class="ri-edit-line"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-danger-light btn-wave"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="avatar avatar-rounded bg-light lh-1">
                                                    <img src="{{asset('build/assets/images/media/file-manager/3.png')}}" alt="">
                                                </span>
                                                <div class="flex-fill">
                                                    <a href="javascript:void(0);"><span class="d-block fw-medium">User Manual.pdf</span></a>
                                                    <span class="d-block text-muted fs-12 fw-normal">1.8MB</span>
                                                </div>
                                                <div class="btn-list">
                                                    <button class="btn btn-sm btn-icon btn-info-light btn-wave"><i class="ri-edit-line"></i></button>
                                                    <button class="btn btn-sm btn-icon btn-danger-light btn-wave"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->


                    <!-- Start:: row-1 -->
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Basic Modal
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Launch demo modal
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel1">Modal title</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModal"&gt;
    Launch demo modal
&lt;/button&gt;
&lt;div class="modal fade" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true"&gt;
    &lt;div class="modal-dialog"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="exampleModalLabel1"&gt;Modal title&lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                ...
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
                &lt;button type="button" class="btn btn-primary"&gt;Save
                    changes&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Static backdrop
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        Launch static backdrop modal
                                    </button>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="staticBackdropLabel">Modal title
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>I will not close if you click outside me. Don't even try to
                                                        press
                                                        escape key.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Understood</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#staticBackdrop"&gt;
    Launch static backdrop modal
&lt;/button&gt;
&lt;div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true"&gt;
    &lt;div class="modal-dialog"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="staticBackdropLabel"&gt;Modal title
                &lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                &lt;p&gt;I will not close if you click outside me. Don't even try to
                    press
                    escape key.&lt;/p&gt;
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
                &lt;button type="button" class="btn btn-primary"&gt;Understood&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Scrolling long content
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalScrollable">
                                    Scrolling long content
                                    </button>
                                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1"
                                        aria-labelledby="exampleModalScrollable" data-bs-keyboard="false"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="staticBackdropLabel1">Modal title
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                        Libero
                                                        ipsum quasi, error quibusdam debitis maiores hic eum? Vitae
                                                        nisi
                                                        ipsa maiores fugiat deleniti quis reiciendis veritatis.</p>
                                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea
                                                        voluptatibus, ipsam quo est rerum modi quos expedita facere,
                                                        ex
                                                        tempore fuga similique ipsa blanditiis et accusamus
                                                        temporibus
                                                        commodi voluptas! Nobis veniam illo architecto expedita quam
                                                        ratione quaerat omnis. In, recusandae eos! Pariatur,
                                                        deleniti
                                                        quis ad nemo ipsam officia temporibus, doloribus fuga
                                                        asperiores
                                                        ratione distinctio velit alias hic modi praesentium aperiam
                                                        officiis eaque, accusamus aut. Accusantium assumenda,
                                                        commodi
                                                        nulla provident asperiores fugit inventore iste amet aut
                                                        placeat
                                                        consequatur reprehenderit. Ratione tenetur eligendi, quis
                                                        aperiam dolores magni iusto distinctio voluptatibus minus a
                                                        unde
                                                        at! Consequatur voluptatum in eaque obcaecati, impedit
                                                        accusantium ea soluta, excepturi, quasi quia commodi
                                                        blanditiis?
                                                        Qui blanditiis iusto corrupti necessitatibus dolorem fugiat
                                                        consequuntur quod quo veniam? Labore dignissimos reiciendis
                                                        accusamus recusandae est consequuntur iure.</p>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <p>Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModalScrollable"&gt;
    Scrolling long content
    &lt;/button&gt;
    &lt;div class="modal fade" id="exampleModalScrollable" tabindex="-1"
        aria-labelledby="exampleModalScrollable" data-bs-keyboard="false"
        aria-hidden="true"&gt;
        &lt;div class="modal-dialog modal-dialog-scrollable"&gt;
            &lt;div class="modal-content"&gt;
                &lt;div class="modal-header"&gt;
                    &lt;h6 class="modal-title" id="staticBackdropLabel1"&gt;Modal title
                    &lt;/h6&gt;
                    &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"&gt;&lt;/button&gt;
                &lt;/div&gt;
                &lt;div class="modal-body"&gt;
                    &lt;p&gt;Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Libero
                        ipsum quasi, error quibusdam debitis maiores hic eum? Vitae
                        nisi
                        ipsa maiores fugiat deleniti quis reiciendis veritatis.&lt;/p&gt;
                    &lt;p&gt;Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea
                        voluptatibus, ipsam quo est rerum modi quos expedita facere,
                        ex
                        tempore fuga similique ipsa blanditiis et accusamus
                        temporibus
                        commodi voluptas! Nobis veniam illo architecto expedita quam
                        ratione quaerat omnis. In, recusandae eos! Pariatur,
                        deleniti
                        quis ad nemo ipsam officia temporibus, doloribus fuga
                        asperiores
                        ratione distinctio velit alias hic modi praesentium aperiam
                        officiis eaque, accusamus aut. Accusantium assumenda,
                        commodi
                        nulla provident asperiores fugit inventore iste amet aut
                        placeat
                        consequatur reprehenderit. Ratione tenetur eligendi, quis
                        aperiam dolores magni iusto distinctio voluptatibus minus a
                        unde
                        at! Consequatur voluptatum in eaque obcaecati, impedit
                        accusantium ea soluta, excepturi, quasi quia commodi
                        blanditiis?
                        Qui blanditiis iusto corrupti necessitatibus dolorem fugiat
                        consequuntur quod quo veniam? Labore dignissimos reiciendis
                        accusamus recusandae est consequuntur iure.&lt;/p&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;br&gt;
                    &lt;p&gt;Lorem ipsum dolor sit amet.&lt;/p&gt;
                &lt;/div&gt;
                &lt;div class="modal-footer"&gt;
                    &lt;button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
                    &lt;button type="button" class="btn btn-primary"&gt;Save
                        Changes&lt;/button&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Tooltips and popovers
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalScrollable4">
                                            Launch demo modal
                                    </button>
                                    <div class="modal fade" id="exampleModalScrollable4" tabindex="-1"
                                        aria-labelledby="exampleModalScrollable4" data-bs-keyboard="false"
                                        aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="staticBackdropLabel4">Modal title
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Popover in a modal</h5>
                                                    <p>This <a href="javascript:void(0);" role="button" class="btn btn-secondary"
                                                            data-bs-toggle="popover" title="Popover title"
                                                            data-bs-content="Popover body content is set in this attribute.">button</a>
                                                        triggers a popover on click.</p>
                                                    <hr>
                                                    <h5>Tooltips in a modal</h5>
                                                    <p><a href="javascript:void(0);" class="text-primary" data-bs-toggle="tooltip" title="Tooltip">This
                                                            link</a> and <a href="javascript:void(0);" class="text-primary" data-bs-toggle="tooltip"
                                                            title="Tooltip">that link</a> have tooltips on hover.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModalScrollable4"&gt;
    Launch demo modal
&lt;/button&gt;
&lt;div class="modal fade" id="exampleModalScrollable4" tabindex="-1"
aria-labelledby="exampleModalScrollable4" data-bs-keyboard="false"
aria-hidden="true"&gt;
&lt;!-- Scrollable modal --&gt;
&lt;div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="staticBackdropLabel4"&gt;Modal title
            &lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            &lt;h5&gt;Popover in a modal&lt;/h5&gt;
            &lt;p&gt;This &lt;a href="javascript:void(0);" role="button" class="btn btn-secondary"
                    data-bs-toggle="popover" title="Popover title"
                    data-bs-content="Popover body content is set in this attribute."&gt;button&lt;/a&gt;
                triggers a popover on click.&lt;/p&gt;
            &lt;hr&gt;
            &lt;h5&gt;Tooltips in a modal&lt;/h5&gt;
            &lt;p&gt;&lt;a href="javascript:void(0);" class="text-primary" data-bs-toggle="tooltip" title="Tooltip"&gt;This
                    link&lt;/a&gt; and &lt;a href="javascript:void(0);" class="text-primary" data-bs-toggle="tooltip"
                    title="Tooltip"&gt;that link&lt;/a&gt; have tooltips on hover.
            &lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="modal-footer"&gt;
            &lt;button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;button type="button" class="btn btn-primary"&gt;Save
                Changes&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Vertical Centered Scrollable
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalScrollable3">
                                            Vertically centered scrollable modal
                                    </button>
                                    <div class="modal fade" id="exampleModalScrollable3" tabindex="-1"
                                        aria-labelledby="exampleModalScrollable3" data-bs-keyboard="false"
                                        aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="staticBackdropLabel3">Modal title
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea
                                                        voluptatibus, ipsam quo est rerum modi quos expedita facere,
                                                        ex
                                                        tempore fuga similique ipsa blanditiis et accusamus
                                                        temporibus
                                                        commodi voluptas! Nobis veniam illo architecto expedita quam
                                                        ratione quaerat omnis. In, recusandae eos! Pariatur,
                                                        deleniti
                                                        quis ad nemo ipsam officia temporibus, doloribus fuga
                                                        asperiores
                                                        ratione distinctio velit alias hic modi praesentium aperiam
                                                        officiis eaque, accusamus aut. Accusantium assumenda,
                                                        commodi
                                                        nulla provident asperiores fugit inventore iste amet aut
                                                        placeat
                                                        consequatur reprehenderit. Ratione tenetur eligendi, quis
                                                        aperiam dolores magni iusto distinctio voluptatibus minus a
                                                        unde
                                                        at! Consequatur voluptatum in eaque obcaecati, impedit
                                                        accusantium ea soluta, excepturi, quasi quia commodi
                                                        blanditiis?
                                                        Qui blanditiis iusto corrupti necessitatibus dolorem fugiat
                                                        consequuntur quod quo veniam? Labore dignissimos reiciendis
                                                        accusamus recusandae est consequuntur iure.</p>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <p>Lorem ipsum dolor sit amet.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModalScrollable3"&gt;
    Vertically centered scrollable modal
&lt;/button&gt;
&lt;div class="modal fade" id="exampleModalScrollable3" tabindex="-1"
aria-labelledby="exampleModalScrollable3" data-bs-keyboard="false"
aria-hidden="true"&gt;
&lt;!-- Scrollable modal --&gt;
&lt;div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="staticBackdropLabel3"&gt;Modal title
            &lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            &lt;p&gt;Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea
                voluptatibus, ipsam quo est rerum modi quos expedita facere,
                ex
                tempore fuga similique ipsa blanditiis et accusamus
                temporibus
                commodi voluptas! Nobis veniam illo architecto expedita quam
                ratione quaerat omnis. In, recusandae eos! Pariatur,
                deleniti
                quis ad nemo ipsam officia temporibus, doloribus fuga
                asperiores
                ratione distinctio velit alias hic modi praesentium aperiam
                officiis eaque, accusamus aut. Accusantium assumenda,
                commodi
                nulla provident asperiores fugit inventore iste amet aut
                placeat
                consequatur reprehenderit. Ratione tenetur eligendi, quis
                aperiam dolores magni iusto distinctio voluptatibus minus a
                unde
                at! Consequatur voluptatum in eaque obcaecati, impedit
                accusantium ea soluta, excepturi, quasi quia commodi
                blanditiis?
                Qui blanditiis iusto corrupti necessitatibus dolorem fugiat
                consequuntur quod quo veniam? Labore dignissimos reiciendis
                accusamus recusandae est consequuntur iure.&lt;/p&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;br&gt;
            &lt;p&gt;Lorem ipsum dolor sit amet.&lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="modal-footer"&gt;
            &lt;button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;button type="button" class="btn btn-primary"&gt;Save
                Changes&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Toggle between modals
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                                            role="button">Open first modal
                                    </a>
                                    <div class="modal fade" id="exampleModalToggle"
                                        aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalToggleLabel">Modal 1
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Show a second modal and hide this one with the button below.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary"
                                                        data-bs-target="#exampleModalToggle2"
                                                        data-bs-toggle="modal">Open second modal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalToggle2"
                                        aria-labelledby="exampleModalToggleLabel2" tabindex="-1" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalToggleLabel2">Modal 2
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Hide this modal and show the first with the button below.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle"
                                                        data-bs-toggle="modal">Back to first</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
    role="button"&gt;Open first modal
&lt;/a&gt;
&lt;div class="modal fade" id="exampleModalToggle"
aria-labelledby="exampleModalToggleLabel" tabindex="-1" aria-hidden="true"
style="display: none;"&gt;
&lt;div class="modal-dialog modal-dialog-centered"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="exampleModalToggleLabel"&gt;Modal 1
            &lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            Show a second modal and hide this one with the button below.
        &lt;/div&gt;
        &lt;div class="modal-footer"&gt;
            &lt;button class="btn btn-primary"
                data-bs-target="#exampleModalToggle2"
                data-bs-toggle="modal"&gt;Open second modal&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalToggle2"
aria-labelledby="exampleModalToggleLabel2" tabindex="-1" aria-hidden="true"
style="display: none;"&gt;
&lt;div class="modal-dialog modal-dialog-centered"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="exampleModalToggleLabel2"&gt;Modal 2
            &lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            Hide this modal and show the first with the button below.
        &lt;/div&gt;
        &lt;div class="modal-footer"&gt;
            &lt;button class="btn btn-primary" data-bs-target="#exampleModalToggle"
                data-bs-toggle="modal"&gt;Back to first&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Using the grid
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalScrollable5">
                                    Launch demo modal
                                    </button>
                                    <div class="modal fade" id="exampleModalScrollable5" tabindex="-1"
                                        aria-labelledby="exampleModalScrollable5" data-bs-keyboard="false"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="staticBackdropLabel5">Modal title
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-4 bg-light border">.col-md-4</div>
                                                            <div class="col-md-4 ms-auto bg-light border">.col-md-4
                                                                .ms-auto</div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-3 ms-auto bg-light border">.col-md-3
                                                                .ms-auto</div>
                                                            <div class="col-md-2 ms-auto bg-light border">.col-md-2
                                                                .ms-auto</div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-6 ms-auto bg-light border">.col-md-6
                                                                .ms-auto</div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-9 bg-light border">
                                                                Level 1: .col-sm-9
                                                                <div class="row">
                                                                    <div class="col-8 col-sm-6 bg-light border">
                                                                        Level 2: .col-8 .col-sm-6
                                                                    </div>
                                                                    <div class="col-4 col-sm-6 bg-light border">
                                                                        Level 2: .col-4 .col-sm-6
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModalScrollable5"&gt;
    Launch demo modal
    &lt;/button&gt;
    &lt;div class="modal fade" id="exampleModalScrollable5" tabindex="-1"
        aria-labelledby="exampleModalScrollable5" data-bs-keyboard="false"
        aria-hidden="true"&gt;
        &lt;div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"&gt;
            &lt;div class="modal-content"&gt;
                &lt;div class="modal-header"&gt;
                    &lt;h6 class="modal-title" id="staticBackdropLabel5"&gt;Modal title
                    &lt;/h6&gt;
                    &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"&gt;
                    &lt;/button&gt;
                &lt;/div&gt;
                &lt;div class="modal-body"&gt;
                    &lt;div class="container-fluid"&gt;
                        &lt;div class="row"&gt;
                            &lt;div class="col-md-4 bg-light border"&gt;.col-md-4&lt;/div&gt;
                            &lt;div class="col-md-4 ms-auto bg-light border"&gt;.col-md-4
                                .ms-auto&lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class="row mt-3"&gt;
                            &lt;div class="col-md-3 ms-auto bg-light border"&gt;.col-md-3
                                .ms-auto&lt;/div&gt;
                            &lt;div class="col-md-2 ms-auto bg-light border"&gt;.col-md-2
                                .ms-auto&lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class="row mt-3"&gt;
                            &lt;div class="col-md-6 ms-auto bg-light border"&gt;.col-md-6
                                .ms-auto&lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div class="row mt-3"&gt;
                            &lt;div class="col-sm-9 bg-light border"&gt;
                                Level 1: .col-sm-9
                                &lt;div class="row"&gt;
                                    &lt;div class="col-8 col-sm-6 bg-light border"&gt;
                                        Level 2: .col-8 .col-sm-6
                                    &lt;/div&gt;
                                    &lt;div class="col-4 col-sm-6 bg-light border"&gt;
                                        Level 2: .col-4 .col-sm-6
                                    &lt;/div&gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="modal-footer"&gt;
                    &lt;button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
                    &lt;button type="button" class="btn btn-primary"&gt;Save
                        Changes&lt;/button&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Vertically centered modal
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalScrollable2">
                                            Vertically centered modal
                                    </button>
                                    <div class="modal fade" id="exampleModalScrollable2" tabindex="-1"
                                        aria-labelledby="exampleModalScrollable2" data-bs-keyboard="false"
                                        aria-hidden="true">
                                        <!-- Scrollable modal -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="staticBackdropLabel2">Modal title
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                        Libero
                                                        ipsum quasi, error quibusdam debitis maiores hic eum? Vitae
                                                        nisi
                                                        ipsa maiores fugiat deleniti quis reiciendis veritatis.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#exampleModalScrollable2"&gt;
    Vertically centered modal
&lt;/button&gt;
&lt;div class="modal fade" id="exampleModalScrollable2" tabindex="-1"
aria-labelledby="exampleModalScrollable2" data-bs-keyboard="false"
aria-hidden="true"&gt;
&lt;!-- Scrollable modal --&gt;
&lt;div class="modal-dialog modal-dialog-centered"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="staticBackdropLabel2"&gt;Modal title
            &lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            &lt;p&gt;Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Libero
                ipsum quasi, error quibusdam debitis maiores hic eum? Vitae
                nisi
                ipsa maiores fugiat deleniti quis reiciendis veritatis.&lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="modal-footer"&gt;
            &lt;button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;button type="button" class="btn btn-primary"&gt;Save
                Changes&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-1 -->

                    <!-- Start:: row-2 -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Fullscreen modal
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="bd-example">
                                        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalFullscreen">Full screen</button>
                                        <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalFullscreenSm">Full screen below sm</button>
                                        <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalFullscreenMd">Full screen below md</button>
                                        <button type="button" class="btn btn-info mb-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalFullscreenLg">Full screen below lg</button>
                                        <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalFullscreenXl">Full screen below xl</button>
                                        <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalFullscreenXxl">Full screen below
                                            xxl</button>
                                    </div>
                                    <div class="modal fade" id="exampleModalFullscreen" tabindex="-1"
                                        aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalFullscreenLabel">Full
                                                        screen modal</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalFullscreenSm" tabindex="-1"
                                        aria-labelledby="exampleModalFullscreenSmLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalFullscreenSmLabel">
                                                        Full
                                                        screen below sm</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalFullscreenMd" tabindex="-1"
                                        aria-labelledby="exampleModalFullscreenMdLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-fullscreen-md-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalFullscreenMdLabel">
                                                        Full
                                                        screen below md</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalFullscreenLg" tabindex="-1"
                                        aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-fullscreen-lg-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalFullscreenLgLabel">
                                                        Full
                                                        screen below lg</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalFullscreenXl" tabindex="-1"
                                        aria-labelledby="exampleModalFullscreenXlLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-fullscreen-xl-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalFullscreenXlLabel">
                                                        Full
                                                        screen below xl</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalFullscreenXxl" tabindex="-1"
                                        aria-labelledby="exampleModalFullscreenXxlLabel" aria-hidden="true"
                                        style="display: none;">
                                        <div class="modal-dialog modal-fullscreen-xxl-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalFullscreenXxlLabel">
                                                        Full
                                                        screen below xxl</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="bd-example"&gt;
    &lt;button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
        data-bs-target="#exampleModalFullscreen"&gt;Full screen&lt;/button&gt;
    &lt;button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal"
        data-bs-target="#exampleModalFullscreenSm"&gt;Full screen below sm&lt;/button&gt;
    &lt;button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal"
        data-bs-target="#exampleModalFullscreenMd"&gt;Full screen below md&lt;/button&gt;
    &lt;button type="button" class="btn btn-info mb-1" data-bs-toggle="modal"
        data-bs-target="#exampleModalFullscreenLg"&gt;Full screen below lg&lt;/button&gt;
    &lt;button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
        data-bs-target="#exampleModalFullscreenXl"&gt;Full screen below xl&lt;/button&gt;
    &lt;button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
        data-bs-target="#exampleModalFullscreenXxl"&gt;Full screen below
        xxl&lt;/button&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalFullscreen" tabindex="-1"
    aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true"
    style="display: none;"&gt;
    &lt;div class="modal-dialog modal-fullscreen"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="exampleModalFullscreenLabel"&gt;Full
                    screen modal&lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                ...
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalFullscreenSm" tabindex="-1"
    aria-labelledby="exampleModalFullscreenSmLabel" aria-hidden="true"
    style="display: none;"&gt;
    &lt;div class="modal-dialog modal-fullscreen-sm-down"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="exampleModalFullscreenSmLabel"&gt;
                    Full
                    screen below sm&lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                ...
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalFullscreenMd" tabindex="-1"
    aria-labelledby="exampleModalFullscreenMdLabel" aria-hidden="true"
    style="display: none;"&gt;
    &lt;div class="modal-dialog modal-fullscreen-md-down"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="exampleModalFullscreenMdLabel"&gt;
                    Full
                    screen below md&lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                ...
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalFullscreenLg" tabindex="-1"
    aria-labelledby="exampleModalFullscreenLgLabel" aria-hidden="true"
    style="display: none;"&gt;
    &lt;div class="modal-dialog modal-fullscreen-lg-down"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="exampleModalFullscreenLgLabel"&gt;
                    Full
                    screen below lg&lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                ...
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalFullscreenXl" tabindex="-1"
    aria-labelledby="exampleModalFullscreenXlLabel" aria-hidden="true"
    style="display: none;"&gt;
    &lt;div class="modal-dialog modal-fullscreen-xl-down"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="exampleModalFullscreenXlLabel"&gt;
                    Full
                    screen below xl&lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                ...
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalFullscreenXxl" tabindex="-1"
    aria-labelledby="exampleModalFullscreenXxlLabel" aria-hidden="true"
    style="display: none;"&gt;
    &lt;div class="modal-dialog modal-fullscreen-xxl-down"&gt;
        &lt;div class="modal-content"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title" id="exampleModalFullscreenXxlLabel"&gt;
                    Full
                    screen below xxl&lt;/h6&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body"&gt;
                ...
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Optional sizes
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalXl">Extra large modal</button>
                                    <button type="button" class="btn btn-secondary m-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalLg">Large modal</button>
                                    <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalSm">Small modal</button>
                                    <div class="modal fade" id="exampleModalXl" tabindex="-1"
                                        aria-labelledby="exampleModalXlLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalXlLabel">Extra large
                                                        modal</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalLg" tabindex="-1"
                                        aria-labelledby="exampleModalLgLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLgLabel">Large modal
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalSm" tabindex="-1"
                                        aria-labelledby="exampleModalSmLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalSmLabel">Small modal
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary mb-sm-0 mb-1" data-bs-toggle="modal"
    data-bs-target="#exampleModalXl">Extra large modal&lt;/button&gt;
&lt;button type="button" class="btn btn-secondary mb-sm-0 mb-1" data-bs-toggle="modal"
data-bs-target="#exampleModalLg"&gt;Large modal&lt;/button&gt;
&lt;button type="button" class="btn btn-warning" data-bs-toggle="modal"
data-bs-target="#exampleModalSm"&gt;Small modal&lt;/button&gt;
&lt;div class="modal fade" id="exampleModalXl" tabindex="-1"
aria-labelledby="exampleModalXlLabel" style="display: none;" aria-hidden="true"&gt;
&lt;div class="modal-dialog modal-xl"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="exampleModalXlLabel"&gt;Extra large
                modal&lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            ...
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalLg" tabindex="-1"
aria-labelledby="exampleModalLgLabel" aria-hidden="true"&gt;
&lt;div class="modal-dialog modal-lg"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="exampleModalLgLabel"&gt;Large modal
            &lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            ...
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade" id="exampleModalSm" tabindex="-1"
aria-labelledby="exampleModalSmLabel" aria-hidden="true"&gt;
&lt;div class="modal-dialog modal-sm"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="exampleModalSmLabel"&gt;Small modal
            &lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            ...
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-2 -->

                    <!-- Start:: row-3 -->
                    <h6 class="mb-3">Close Buttons:</h6>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Basic Close
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn-close" aria-label="Close"&gt;&lt;/button&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Disabel state
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn-close" disabled aria-label="Close"></button>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn-close" disabled aria-label="Close"&gt;&lt;/button&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        White variant
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body bg-black">
                                    <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                                    <button type="button" class="btn-close btn-close-white" disabled
                                        aria-label="Close"></button>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn-close btn-close-white" aria-label="Close"&gt;&lt;/button&gt;
    &lt;button type="button" class="btn-close btn-close-white" disabled
        aria-label="Close"&gt;&lt;/button&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-3 -->

                    <!-- Start:: row-4 -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Modal Animation Effects
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">Scale</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-slide-in-right" data-bs-toggle="modal" href="#modaldemo8">Slide In Right</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-slide-in-bottom" data-bs-toggle="modal" href="#modaldemo8">Slide In Bottom</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-newspaper" data-bs-toggle="modal" href="#modaldemo8">News paper</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-fall" data-bs-toggle="modal" href="#modaldemo8">Fall</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-flip-horizontal" data-bs-toggle="modal" href="#modaldemo8">Flip Horizontal</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8">Flip Vertical</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8">Super Scaled</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-sign" data-bs-toggle="modal" href="#modaldemo8">Sign</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal" href="#modaldemo8">Rotate Bottom</a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-rotate-left" data-bs-toggle="modal" href="#modaldemo8">Rotate Left</a>
                                        </div>
                                    </div>
                                    <div class="modal fade"  id="modaldemo8">
                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <h6>Why We Use Electoral College, Not Popular Vote</h6>
                                                    <p class="text-muted mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" >Save changes</button> <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="row "&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8"&gt;Scale&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-slide-in-right" data-bs-toggle="modal" href="#modaldemo8"&gt;Slide In Right&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-slide-in-bottom" data-bs-toggle="modal" href="#modaldemo8"&gt;Slide In Bottom&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-newspaper" data-bs-toggle="modal" href="#modaldemo8"&gt;Newspaper&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-fall" data-bs-toggle="modal" href="#modaldemo8"&gt;Fall&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-flip-horizontal" data-bs-toggle="modal" href="#modaldemo8"&gt;Flip Horizontal&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8"&gt;Flip Vertical&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8"&gt;Super Scaled&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-sign" data-bs-toggle="modal" href="#modaldemo8"&gt;Sign&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-rotate-bottom" data-bs-toggle="modal" href="#modaldemo8"&gt;Rotate Bottom&lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="col-sm-6 col-md-4 col-xl-3"&gt;
        &lt;a class="modal-effect btn btn-primary d-grid mb-3" data-bs-effect="effect-rotate-left" data-bs-toggle="modal" href="#modaldemo8"&gt;Rotate Left&lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="modal fade"  id="modaldemo8"&gt;
    &lt;div class="modal-dialog modal-dialog-centered text-center" role="document"&gt;
        &lt;div class="modal-content modal-content-demo"&gt;
            &lt;div class="modal-header"&gt;
                &lt;h6 class="modal-title"&gt;Message Preview&lt;/h6&gt;&lt;button aria-label="Close" class="btn-close" data-bs-dismiss="modal"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body text-start"&gt;
                &lt;h6&gt;Why We Use Electoral College, Not Popular Vote&lt;/h6&gt;
                &lt;p class="text-muted mb-0"&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.&lt;/p&gt;
            &lt;/div&gt;
            &lt;div class="modal-footer"&gt;
                &lt;button class="btn btn-primary" &gt;Save changes&lt;/button&gt; &lt;button class="btn btn-light" data-bs-dismiss="modal" &gt;Close&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Varying modal content
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
                                            data-bs-target="#formmodal" data-bs-whatever="@mdo">Open modal for
                                            @mdo</button>
                                    <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal"
                                        data-bs-target="#formmodal" data-bs-whatever="@fat">Open modal for
                                        @fat</button>
                                    <button type="button" class="btn btn-light mb-1" data-bs-toggle="modal"
                                        data-bs-target="#formmodal" data-bs-whatever="@getbootstrap">Open modal for
                                        @getbootstrap</button>
                                    <div class="modal fade" id="formmodal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">New message</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Recipient:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text"
                                                                class="col-form-label">Message:</label>
                                                            <textarea class="form-control" id="message-text"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send
                                                        message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
    data-bs-target="#formmodal" data-bs-whatever="@mdo">Open modal for
    @mdo&lt;/button&gt;
&lt;button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal"
data-bs-target="#formmodal" data-bs-whatever="@fat"&gt;Open modal for
@fat&lt;/button&gt;
&lt;button type="button" class="btn btn-light mb-1" data-bs-toggle="modal"
data-bs-target="#formmodal" data-bs-whatever="@getbootstrap"&gt;Open modal for
@getbootstrap&lt;/button&gt;
&lt;div class="modal fade" id="formmodal" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true"&gt;
&lt;div class="modal-dialog"&gt;
    &lt;div class="modal-content"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h6 class="modal-title" id="exampleModalLabel"&gt;New message&lt;/h6&gt;
            &lt;button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"&gt;&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            &lt;form&gt;
                &lt;div class="mb-3"&gt;
                    &lt;label for="recipient-name"
                        class="col-form-label"&gt;Recipient:&lt;/label&gt;
                    &lt;input type="text" class="form-control" id="recipient-name"&gt;
                &lt;/div&gt;
                &lt;div class="mb-3"&gt;
                    &lt;label for="message-text"
                        class="col-form-label"&gt;Message:&lt;/label&gt;
                    &lt;textarea class="form-control" id="message-text"&gt;&lt;/textarea&gt;
                &lt;/div&gt;
            &lt;/form&gt;
        &lt;/div&gt;
        &lt;div class="modal-footer"&gt;
            &lt;button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal"&gt;Close&lt;/button&gt;
            &lt;button type="button" class="btn btn-primary"&gt;Send
                message&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-4 -->
                    

@endsection

@section('scripts')
	
        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')

        <!-- Modal JS -->
        @vite('resources/assets/js/modal.js')


@endsection
