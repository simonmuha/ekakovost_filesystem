
@extends('layouts.school_master')

@section('styles')

        <!-- dragula css-->
        <link rel="stylesheet" href="{{asset('build/assets/libs/dragula/dragula.min.css')}}">

@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sistemi kakovosti</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $quality_system->quality_system_name }}</a></li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">{{ $quality_system->quality_system_name }}</h1>
                        </div>
                        @if (1==2)
                        <div class="btn-list">
                            <button class="btn btn-white btn-wave">
                                <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
                            </button>
                            <button class="btn btn-primary btn-wave me-0">
                                <i class="ri-share-forward-line me-1"></i> Share
                            </button>
                        </div>
                        @endif
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xxl-8">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Kazalniki
                                    </div> 
                                    @if (1==2)
                                    <div>
                                        <a href="{{url('projects-create')}}" class="btn btn-sm btn-primary btn-wave"><i class="ri-add-line align-middle me-1 fw-medium"></i>Create Project</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary1 btn-wave"><i class="ri-share-line align-middle fw-medium me-1"></i>Share</a>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="card-body">

                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        @foreach ($quality_standards as $quality_standard)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-heading-{{ $quality_standard->id }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#panelsStayOpen-collapse-{{ $quality_standard->id }}"
                                                        aria-expanded="false" 
                                                        aria-controls="panelsStayOpen-collapse-{{ $quality_standard->id }}">
                                                        {{ $quality_standard->quality_standard_number }}. {{ $quality_standard->quality_standard_name }}
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapse-{{ $quality_standard->id }}" 
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="panelsStayOpen-heading-{{ $quality_standard->id }}">
                                                    <div class="accordion-body">
                                                        {!! $quality_standard->quality_standard_description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        
                                    </div>
                                </div>
                            </div>

                            @if (1==2)

                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Project Details
                                    </div> 
                                    <div>
                                        <a href="{{url('projects-create')}}" class="btn btn-sm btn-primary btn-wave"><i class="ri-add-line align-middle me-1 fw-medium"></i>Create Project</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary1 btn-wave"><i class="ri-share-line align-middle fw-medium me-1"></i>Share</a>
                                    </div>
                                </div>
                                
                                <div class="card-body">


                                    <div class="d-flex align-items-center mb-4 gap-2 flex-wrap">
                                        <span class="avatar avatar-lg me-1 bg-primary-gradient"><i class="ri-stack-line fs-24 lh-1"></i></span>
                                        <div>
                                            <h6 class="fw-medium mb-2 task-title">
                                                Customer Feedback Dashboard Development
                                            </h6>
                                            <span class="badge bg-success-transparent"> In progress</span>
                                            <span class="text-muted fs-12"><i class="ri-circle-fill text-success mx-2 fs-9"></i>Last Updated 1 Day Ago</span>
                                        </div>
                                        <div class="ms-auto align-self-start">
                                            <div class="dropdown">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line align-middle me-1 d-inline-block"></i>View</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line align-middle me-1 d-inline-block"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-15 fw-medium mb-2">Project Description :</div>
                                    <p class="text-muted mb-4">The Customer Feedback Dashboard Development project aims to create a comprehensive dashboard that aggregates and visualizes customer feedback data. This will enable our team to gain actionable insights and improve customer satisfaction.</p>
                                    <div class="d-flex gap-5 mb-4 flex-wrap">
                                        <div class="d-flex align-items-center gap-2 me-3">
                                            <span class="avatar avatar-md avatar-rounded me-1 bg-primary1-transparent"><i class="ri-calendar-event-line fs-18 lh-1 align-middle"></i></span>
                                            <div>
                                                <div class="fw-medium mb-0 task-title">
                                                    Start Date
                                                </div>
                                                <span class="fs-12 text-muted">28 August, 2024</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 me-3">
                                            <span class="avatar avatar-md avatar-rounded me-1 bg-primary2-transparent"><i class="ri-time-line fs-18 lh-1 align-middle"></i></span>
                                            <div>
                                                <div class="fw-medium mb-0 task-title">
                                                    End Date
                                                </div>
                                                <span class="fs-12 text-muted">30 Oct, 2024</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="avatar avatar-md p-1 avatar-rounded me-1 bg-primary-transparent"><img src="{{asset('build/assets/images/faces/11.jpg')}}" alt=""></span>
                                            <div>
                                                <span class="d-block fs-14 fw-medium">Amith Catzem</span>
                                                <span class="fs-12 text-muted">Project Manager</span>
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
                                                    <tr class="todo-box">
                                                        <td class="task-checkbox"><input class="form-check-input" type="checkbox" value="" aria-label="..."></td>
                                                        <td>
                                                            <button class="btn btn-icon btn-sm btn-wave btn-light todo-handle">: :</button>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">Optimize database queries</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium text-primary2"><i class="ri-circle-line fw-semibold fs-7 me-2 lh-1 align-middle"></i>Not Started</span>
                                                        </td>
                                                        <td>
                                                        18-Feb-2024
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
                                                        <td class="task-checkbox"><input class="form-check-input" type="checkbox" value="" aria-label="..." checked=""></td>
                                                        <td>
                                                            <button class="btn btn-icon btn-sm btn-wave btn-light todo-handle">: :</button>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">Integrate third-party API</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium text-warning"><i class="ri-circle-line fw-semibold fs-7 me-2 lh-1 align-middle"></i>Pending</span>
                                                        </td>
                                                        <td>
                                                            19-Feb-2024
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
                                                        <td class="task-checkbox"><input class="form-check-input" type="checkbox" value="" aria-label="..." checked=""></td>
                                                        <td>
                                                            <button class="btn btn-icon btn-sm btn-wave btn-light todo-handle">: :</button>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium">Create user documentation</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium text-primary2"><i class="ri-circle-line fw-semibold fs-7 me-2 lh-1 align-middle"></i>Not Started</span>
                                                        </td>
                                                        <td>
                                                            21-Feb-2024
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
                                                            <span class="fw-medium">Deploy to staging environment</span>
                                                        </td>
                                                        <td>
                                                            <span class="fw-medium text-primary"><i class="ri-circle-line fw-semibold fs-7 me-2 lh-1 align-middle"></i>In Progress</span>
                                                        </td>
                                                        <td>
                                                        24-Feb-2024
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
                                                        <td class="task-checkbox border-bottom-0"><input class="form-check-input" type="checkbox" value="" aria-label="..." checked=""></td>
                                                        <td class="border-bottom-0">
                                                            <button class="btn btn-icon btn-sm btn-wave btn-light todo-handle">: :</button>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <span class="fw-medium">Conduct security audit</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <span class="fw-medium text-primary2"><i class="ri-circle-line fw-semibold fs-7 me-2 lh-1 align-middle"></i>Not Started</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            27-Feb-2024
                                                        </td>
                                                        <td class="text-end border-bottom-0">
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
                            @endif
                        </div>
                        <div class="col-xxl-4">
                            <div class="card custom-card justify-content-between">
                                <div class="card-header">
                                    <div class="card-title">Opis sistema</div>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <!-- Tekst ali druga vsebina -->
                                        <div class="col-xl-6">
                                            <!-- Dodaj vsebino, če je potrebna -->
                                        </div>
                                        
                                        <!-- Slika -->
                                        <div class="col-xl-6 text-end">
                                            <img 
                                                src="/storage/quality/systems/{{ $quality_system->quality_system_image }}" 
                                                alt="Slika sistema" 
                                                class="img-fluid rounded"
                                                style="max-height: 150px;">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-12">
                                            <p class="text-muted mb-4">
                                                {{ $quality_system->quality_system_description }}
                                            </p>
                                        </div>
                                    </div>    
                                </div>

                                
                            </div>
                            @if (1==2)
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
                            @endif
                        </div>
                    </div>
                    <!--End::row-1 -->

@endsection

@section('scripts')
	
        <!-- Dragula JS -->
        <script src="{{asset('build/assets/libs/dragula/dragula.min.js')}}"></script>

        <!--Project Overview JS -->
        @vite('resources/assets/js/project-overview.js')

@endsection
