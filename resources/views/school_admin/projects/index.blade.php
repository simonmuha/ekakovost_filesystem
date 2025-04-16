
@extends('layouts.school_admin_master')

@section('styles')



@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Administracija šole</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projekti</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pregled projektov</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Seznam projektov</h1>
                        </div>
                        <div class="btn-list">
                            <a href="/school_admin/projects/create" class="btn btn-primary me-2"><i class="ri-add-line me-1 fw-medium align-middle"></i>Nov projekt</a>
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex flex-wrap gap-1 project-list-main">
                                            <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                <option value="">Razvrsti po</option>
                                                <option value="Newest">Najnovejši</option>
                                                <option value="Type">Tip</option>
                                                <option value="A - Z">A - Z</option>
                                            </select>
                                        </div>
                                        
                                        <div class="d-flex" role="search">
                                            <input class="form-control me-2" type="search" placeholder="Iskanje..." aria-label="Search">
                                            <button class="btn btn-light" type="submit">Išči</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End::row-1 -->
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
                                                        <th scope="col">Projektni tim</th>
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
                                                                    <div class="me-2">
                                                                        <span class="avatar avatar-rounded p-1 bg-info-transparent">
                                                                            <img src="{{asset('build/assets/images/company-logos/1.png')}}" alt="">
                                                                        </span>
                                                                    </div>
                                                                    <div class="flex-fill">
                                                                        <a href="/school_admin/projects/{{ $project->id }}" class="fw-medium fs-14 d-block text-truncate project-list-title">{{ \Illuminate\Support\Str::limit($project->project_name, 35, '...') }}</a>
                                                                        <span class="text-muted d-block fs-12">Skupaj <span class="fw-medium text-default">18/22</span> končanih nalog</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text-muted mb-0 project-list-description">{{ \Illuminate\Support\Str::limit($project->project_description_short, 80, '...') }}</p>
                                                            </td>
                                                            <td>
                                                                <div class="avatar-list-stacked">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img">
                                                                    </span>
                                                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                                        +2
                                                                    </a>
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
                        <!-- End::row-2 -->
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);">Next</a>
                            </li>
                        </ul>
                    @else
                        <div class="text-center">
                            <h5 class="mb-0">Ni najdenih projektov</h5>
                        </div>
                    @endif
@endsection

@section('scripts')
	


@endsection
