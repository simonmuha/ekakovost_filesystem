 
@extends('layouts.school_admin_master')

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
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-line align-middle me-1 d-inline-block"></i>Ogled</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-15 fw-medium mb-2">Opis projekta:</div>
                                    <p class="text-muted mb-4">{!! $project->project_description !!}</p>
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
                        </div>
                        <div class="col-xxl-4">
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
                            </div>
                            <div class="card custom-card justify-content-between">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Sodelujoči
                                    </div>
                                    <div class="dropdown">
                                        <div class="btn btn-light btn-full btn-sm" data-bs-toggle="dropdown">Več<i class="ti ti-chevron-down ms-1"></i>
                                        </div>
                                        <ul class="dropdown-menu" role="menu">
                                                        <!-- Modal za dodajanje osebe na projekt -->


                                                        <div class="modal modal-lg fade" id="modal-add-person-to-project" tabindex="-1" aria-labelledby="modal-add-person-role-label">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title" id="modal-add-person-role-label">
                                                                            Dodaj osebo na projekt
                                                                        </h6>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('project-people-app-positions.store') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                                            
                                                                            <div class="mb-3">
                                                                                <label for="person_id" class="form-label">Izberi osebo:</label>
                                                                                <select name="person_id" id="person_id" class="form-select">
                                                                                    @foreach($school_people as $school_person)
                                                                                        <option value="{{ $school_person->id }}">{{ $school_person->person_name }} {{ $school_person->person_surname }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            <div class="mb-3">
                                                                                <label for="app_position_id" class="form-label">Izberi vlogo:</label>
                                                                                <select name="app_position_id" id="app_position_id" class="form-select">
                                                                                    @foreach($app_positions as $position)
                                                                                        <option value="{{ $position->id }}">{{ $position->app_position_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            <div class="mb-3">
                                                                                <label for="start_date" class="form-label">Začetni datum:</label>
                                                                                <input type="date" name="start_date" id="start_date" class="form-control">
                                                                            </div>
                                                                            
                                                                            <div class="mb-3">
                                                                                <label for="end_date" class="form-label">Končni datum:</label>
                                                                                <input type="date" name="end_date" id="end_date" class="form-control">
                                                                            </div>
                                                                            
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary">Shrani</button>
                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Prekliči</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Modal za dodajanje osebe na projekt -->

                                                        <!-- Modal za dodajanje osebe -->
                                                    <div class="modal modal-lg fade" id="modal-add-person" tabindex="-1" aria-labelledby="modal-add-person" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                        Dodaj osebo kot 
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                    <div class="modal-body">
                                                                        <!-- Listbox za zaposlene -->
                                                                        <div class="row">
                                                                            <div class="col-xl-5 mb-2">
                                                                                <label for="available-people" class="form-label">
                                                                                    Zaposleni
                                                                                </label>
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


<button type="button" class="btn btn-secondary mb-sm-0 mb-1" data-bs-toggle="modal"
data-bs-target="#exampleModalLg">Large modal</button>
                                            @if ($project->project_owner_id  == $person->id)
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-add-person-to-project">
                                                    Dodaj novega
                                                </a>
                                            @endif
                                            
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-add-person">
                                                    Dodaj 
                                                </a>

                                            <li><a class="dropdown-item" href="school_admin/projects/{{ $project->id }}/people">Poglej vse</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (!empty($project_people))


                                        <ul>
                                            <div class="d-flex align-items-center flex-fill">
                                                <div class="avatar-list-stacked">

                                                @foreach ($project_people as $key => $project_person)
                                                    @if ($key < 5)
                                                        <!-- Modal za urejanje osebe -->
                                                        <div class="modal modal-lg fade" id="modal-add-person-role-{{ $project_person->id }}" tabindex="-1" aria-labelledby="modal-add-person-role-label-{{ $project_person->id }}" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title" id="modal-add-person-role-label-{{ $project_person->id }}">
                                                                            <span class="avatar avatar-lg avatar-rounded" 
                                                                                data-bs-toggle="modal" 
                                                                                data-bs-target="#modal-add-person-role-{{ $project_person->id }}" 
                                                                                title="{{ $project_person->person_name }} {{ $project_person->person_surname }}">
                                                                                <img src="/storage/users/{{ $project_person->user->user_profile_image }}" alt="">
                                                                            </span>
                                                                            {{ $project_person->person_name }} {{ $project_person->person_surname }}
                                                                        </h6>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label class="form-label">Vloge na dogodku:</label>
                                                                        <div class="list-group">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Prekliči</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Modal za urejanje osebe -->

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