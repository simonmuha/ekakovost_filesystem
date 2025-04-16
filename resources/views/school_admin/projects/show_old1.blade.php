
@extends('layouts.school_admin_master')

@section('styles')

        <!-- dragula css-->
        <link rel="stylesheet" href="{{asset('build/assets/libs/dragula/dragula.min.css')}}">

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
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        O projektu
                                    </div> 
                                    <div>
                                    </div>
                                </div>
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
                        <div class="card custom-card course-main overflow-hidden cover-image bg-cover bg-primary">
                                <div class="card-body p-4">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-12 col-md-12">
                                            <h5 class="fw-medium mb-2 text-fixed-white">O projektu </h5>
                                            <span class="text-fixed-white d-inline op-7">
                                                {!! \Illuminate\Support\Str::limit(strip_tags($project->project_description), 100) !!}
                                            </span>
                                            <a href="{{ route('projects.show', $project->id) }}" class="text-white d-inline">Poglej več.</a>
                                        </div>
                                        <div class="col-xl-3 col-md-4 text-end">
                                        </div>
                                    </div>


                                    
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
                                <hr>
                                
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
                            <div class="card custom-card justify-content-between">
                                <div class="card-header">
                                    <div class="card-title">Projektne aktivnosti</div>
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

@endsection

@section('scripts')
	
        <!-- Dragula JS -->
        <script src="{{asset('build/assets/libs/dragula/dragula.min.js')}}"></script>

        <!--Project Overview JS -->
        @vite('resources/assets/js/project-overview.js')

        <!-- Modal JS -->
        @vite('resources/assets/js/modal.js')


        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')


@endsection
