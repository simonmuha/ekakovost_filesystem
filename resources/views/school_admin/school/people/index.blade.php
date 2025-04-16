@extends('layouts.school_admin_master')
@section('content')

<!-- Start::page-header -->
<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:void(0);">
                                            Administracija šole
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Šola</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Seznam zaposlenih</h1>
                        </div>
                        <div class="btn-list">
                            <button class="btn btn-white btn-wave">
                                <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Vsi zaposleni na šoli
                            </button>
                        </div>
                    </div>
                    <!-- End::page-header -->


                    <!-- Start:: row-4 -->
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Seznam zaposlenih ({{ $active_school_year->year->school_year_name }})
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="me-3 my-1">
                                            <input class="form-control form-control-sm" type="text" placeholder="Iskanje" aria-label=" example">
                                        </div>
                                        <div class="dropdown my-1">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                                Sortiraj<i class="ri-arrow-down-s-line align-middle ms-1"></i>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">Ime</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Zaposlitev</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Aktivnost</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (count($school_organization_people) > 0)
                                        <div class="table-responsive">
                                            <table class="table table-hover text-nowrap table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">z. št.</th>
                                                        <th scope="col">Ime</th>
                                                        <th scope="col">Funkcije</th>
                                                        <th scope="col">E-naslov</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">akcija</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($school_organization_people as $school_organization_person)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{$school_organization_person->id}}
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src='/storage/users/{{$school_organization_person->user->user_profile_image}}' class="avatar avatar-sm" alt="">
                                                                    <div class="flex-1 flex-between pos-relative ms-2">
                                                                        <div class="">
                                                                            <a href="javascript:void(0);" class="fs-13 fw-medium">{{$school_organization_person->person_name}}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="">
                                                                    @foreach ($school_organization_person->positions as $school_organization_person_position)
                                                                        <div class="row">
                                                                            <div class="col-md-10">
                                                                                <a href="/school_admin/school/people/{{$school_organization_person_position->id}}">
                                                                                {{ $school_organization_person_position->id }} {{ $school_organization_person_position->app_position_name }}
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="">{{$school_organization_person->person_email}}</span>
                                                            </td>
                                                            <td>
                                                            <span class="badge bg-success-transparent">Active</span>
                                                            </td>
                                                            <td>
                                                                <div class="g-2">
                                                                    <a aria-label="anchor" class="btn  btn-primary-light btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                        <span class="ri-pencil-line fs-14"></span>
                                                                    </a>
                                                                    <a aria-label="anchor" class="btn btn-danger-light btn-sm ms-2" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                        <span class="ri-delete-bin-7-line fs-14"></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                Število zaposlenih: {{ $school_organization_people->count() }}  <i class="bi bi-arrow-right ms-2 fw-medium"></i>
                                            </div>
                                            <div class="ms-auto">
                                                <nav aria-label="Page navigation" class="pagination-style-4">
                                                    <ul class="pagination mb-0">
                                                        <li class="page-item disabled">
                                                            <a class="page-link" href="javascript:void(0);">
                                                                Nazaj
                                                            </a>
                                                        </li>
                                                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link text-primary" href="javascript:void(0);">
                                                                Naprej
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <div class="text-center">
                                        <img src="{{ asset('build/assets/images/no-data.svg') }}" alt=" " class="img-fluid" width="200">

                                            <h6 class="mt-3">Ni podatkov</h6>
                                        </div>
                                    @endif
                                
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-4 -->


@endsection
