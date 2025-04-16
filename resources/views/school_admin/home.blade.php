
@extends('layouts.school_admin_master')

@section('styles')
<style>
.table-responsive {
    max-height: 400px; /* Prilagodi višino */
    overflow-y: auto;  /* Omogoči vertikalni drsnik */
}
</style>

@endsection

@section('content')
	
                    <!-- Start::page-header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:void(0);">
                                            Šolska administracija
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $school_organization->school_organization_name }}</li>
                                </ol>
                            </nav>
                        </div>
                        @if(1==2)
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
                    <!-- End::page-header -->

                    <!-- Start::Row-1 -->
                    <div class="row">
                        <div class="col-sm-6 col-xxl">
                            <div class="card custom-card school-card">
                                <div class="card-body d-flex gap-2 justify-content-between">
                                    <div class="">
                                        <span class="d-block mb-1">Students</span>
                                        <h5 class="mb-0 fw-semibold">62,784</h5>
                                    </div>
                                    <div class="">
                                        <span class="text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 12.27v3.72l5 2.73 5-2.73v-3.72L12 15zM5.18 9 12 12.72 18.82 9 12 5.28z" opacity=".2"/><path d="M12 3 1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm5 12.99-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72zm-5-3.27L5.18 9 12 5.28 18.82 9 12 12.72z"/></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl">
                            <div class="card custom-card school-card">
                                <div class="card-body d-flex gap-2 justify-content-between">
                                    <div class="">
                                        <span class="d-block mb-1">Zaposleni</span>
                                        <h5 class="mb-0 fw-semibold">{{ $school_organization_people->count() }}</h5>
                                    </div>
                                    <div class="">
                                        <span class="text-primary1">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><g><rect fill="none" height="24" width="24"/><rect fill="none" height="24" width="24"/></g><g><g>
                                            <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5s-3 1.34-3 3 1.34 3 3 3zm8 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zM2 17v2h6v-2c0-.68.11-1.33.32-1.94C6.17 15.05 2 16.42 2 17z"/>
                                        </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl">
                            <div class="card custom-card school-card">
                                <div class="card-body d-flex gap-2 justify-content-between">
                                    <div class="">
                                        <span class="d-block mb-1">Total Staff</span>
                                        <h5 class="mb-0 fw-semibold">8,475</h5>
                                    </div>
                                    <div class="">
                                        <span class="text-primary2">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><g><rect fill="none" height="24" width="24" y="0"/></g><g><g><path d="M14,13.5h4V12h-4V13.5z M14,16.5h4V15h-4V16.5z M20,7h-5V4c0-1.1-0.9-2-2-2h-2C9.9,2,9,2.9,9,4v3H4C2.9,7,2,7.9,2,9v11 c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V9C22,7.9,21.1,7,20,7z M11,4h2v5h-2V4z M20,20H4V9h5c0,1.1,0.9,2,2,2h2c1.1,0,2-0.9,2-2h5V20 z M9,15c0.83,0,1.5-0.67,1.5-1.5c0-0.83-0.67-1.5-1.5-1.5s-1.5,0.67-1.5,1.5C7.5,14.33,8.17,15,9,15z M11.08,16.18 C10.44,15.9,9.74,15.75,9,15.75s-1.44,0.15-2.08,0.43C6.36,16.42,6,16.96,6,17.57V18h6v-0.43C12,16.96,11.64,16.42,11.08,16.18z"/><path d="M13,11h-2c-1.1,0-2-0.9-2-2H4v11h16V9h-5C15,10.1,14.1,11,13,11z M9,12c0.83,0,1.5,0.67,1.5,1.5 c0,0.83-0.67,1.5-1.5,1.5s-1.5-0.67-1.5-1.5C7.5,12.67,8.17,12,9,12z M12,18H6v-0.43c0-0.6,0.36-1.15,0.92-1.39 C7.56,15.9,8.26,15.75,9,15.75s1.44,0.15,2.08,0.43c0.55,0.24,0.92,0.78,0.92,1.39V18z M18,16.5h-4V15h4V16.5z M18,13.5h-4V12h4 V13.5z" opacity=".3"/></g></g></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl">
                            <div class="card custom-card school-card">
                                <div class="card-body d-flex gap-2 justify-content-between">
                                    <div class="">
                                        <span class="d-block mb-1">Revenue</span>
                                        <h5 class="mb-0 fw-semibold">$22,987</h5>
                                    </div>
                                    <div class="">
                                        <span class="text-primary3">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 17c-1.1 0-2-.9-2-2V9c0-1.1.9-2 2-2h6V5H5v14h14v-2h-6z" opacity=".2"/><path d="M21 7.28V5c0-1.1-.9-2-2-2H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-2.28c.59-.35 1-.98 1-1.72V9c0-.74-.41-1.38-1-1.72zM20 9v6h-7V9h7zM5 19V5h14v2h-6c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h6v2H5z"/><circle cx="16" cy="12" r="1.5"/></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-xxl">
                            <div class="card custom-card school-card">
                                <div class="card-body d-flex gap-2 justify-content-between">
                                    <div class="">
                                        <span class="d-block mb-1">Aktivno šolsko leto</span>
                                        <h5 class="mb-0 fw-semibold">{{ $school_organization->active_year->year->school_year_name }}</h5>
                                    </div>
                                    <div class="">
                                        <span class="text-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><rect fill="none" height="24" width="24"/>
                                            <path d="M12 4C7.58 4 4 7.58 4 12s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm0 14c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zM5 2h2v3H5zm12 0h2v3h-2zM2 10h3v2H2zm17 0h3v2h-3zM6.34 16.66l1.41-1.41 2.12 2.12-1.41 1.41zM14.13 17.37l2.12-2.12 1.41 1.41-2.12 2.12z"/> 

                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End::Row-1 -->

                    <!-- Start::Row-2 -->
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Attendance Report
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light" data-bs-toggle="dropdown" > Sort By <i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">This Month</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex gap-5 mb-3 align-items-center justify-content-center flex-wrap flex-xl-nowrap">
                                        <div class="d-flex align-items-center gap-2 me-5">
                                            <div class="lh-1">
                                                <span class="avatar avatar-md avatar-rounded bg-primary2">
                                                    <i class="ri-id-card-line fs-16"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="fw-medium fs-14">3,875</div>
                                                <div class="text-muted">Staff</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 me-5">
                                            <div class="lh-1">
                                                <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                    <i class="ri-graduation-cap-line fs-16"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="fw-medium fs-14">25,875</div>
                                                <div class="text-muted">Students</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 me-4">
                                            <div class="lh-1">
                                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                                    <i class="ri-presentation-line fs-16"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="fw-medium fs-14">1,687</div>
                                                <div class="text-muted">Teachers</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div id="attendance"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Seznam učiteljev
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light text-default"> Poglej vse<i class="ti ti-arrow-narrow-right ms-1"></i> </a>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap teachers-list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Zaposleni</th>
                                                    <th scope="col">Qualification</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                @foreach ($school_organization_people as $school_organization_person)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <img src="/storage/users/{{$school_organization_person->user->user_profile_image}}" alt="" class="avatar avatar-sm">
                                                                <a href="/school_admin/school/people/{{$school_organization_person->id}}" class="fw-medium">{{ $school_organization_person->person_name }}</a>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-12 text-muted d-block">M.Ed</span></td>
                                                        <td><div class="text-primary fw-medium">Mathematics</div></td>
                                                        <td>
                                                            <button aria-label="button" type="button" class="btn btn-light btn-icon btn-sm table-icon"><i class="ri-arrow-right-s-line"></i></button>
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
                    <!-- End::Row-2 -->

                    <!-- Start::Row-3 -->
                    <div class="row">
                        <div class="col-xxl-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Notice Board
                                    </div>
                                    <a href="javascript:void(0);" class="fs-12 text-muted btn btn-sm btn-light"> View All<i class="ti ti-arrow-narrow-right ms-1"></i> </a>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="svg-primary">
                                                                <svg class="avatar-md avatar bg-primary-transparent svg-primary  p-2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M232,112a24,24,0,0,0-24-24H136V79a32.06,32.06,0,0,0,24-31c0-28-26.44-45.91-27.56-46.66a8,8,0,0,0-8.88,0C122.44,2.09,96,20,96,48a32.06,32.06,0,0,0,24,31v9H48a24,24,0,0,0-24,24v23.33a40.84,40.84,0,0,0,8,24.24V200a24,24,0,0,0,24,24H200a24,24,0,0,0,24-24V159.57a40.84,40.84,0,0,0,8-24.24ZM112,48c0-13.57,10-24.46,16-29.79,6,5.33,16,16.22,16,29.79a16,16,0,0,1-32,0ZM40,112a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8v23.33c0,13.25-10.46,24.31-23.32,24.66A24,24,0,0,1,168,136a8,8,0,0,0-16,0,24,24,0,0,1-48,0,8,8,0,0,0-16,0,24,24,0,0,1-24.68,24C50.46,159.64,40,148.58,40,135.33Zm160,96H56a8,8,0,0,1-8-8V172.56A38.77,38.77,0,0,0,62.88,176a39.69,39.69,0,0,0,29-11.31A40.36,40.36,0,0,0,96,160a40,40,0,0,0,64,0,40.36,40.36,0,0,0,4.13,4.67A39.67,39.67,0,0,0,192,176c.38,0,.76,0,1.14,0A38.77,38.77,0,0,0,208,172.56V200A8,8,0,0,1,200,208Z"></path></svg>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <div>
                                                                    <div class="fw-medium d-block my-1 fs-14">Inter-School Sports Day</div>
                                                                    <p class="text-muted fs-12 mb-0">Students are gearing up for the annual inter-school.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="badge bg-light text-dark">20 Mar 2024</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="svg-primary1">
                                                                <svg class="avatar-md avatar bg-primary1-transparent svg-primary1  p-2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-96-88v64a8,8,0,0,1-16,0V132.94l-4.42,2.22a8,8,0,0,1-7.16-14.32l16-8A8,8,0,0,1,112,120Zm59.16,30.45L152,176h16a8,8,0,0,1,0,16H136a8,8,0,0,1-6.4-12.8l28.78-38.37A8,8,0,1,0,145.07,132a8,8,0,1,1-13.85-8A24,24,0,0,1,176,136,23.76,23.76,0,0,1,171.16,150.45Z"></path></svg>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <div>
                                                                    <div class="fw-medium d-block my-1 fs-14">Science Exhibition <span class="text-primary2">"Science Fare"</span></div>
                                                                    <p class="text-muted fs-12 mb-0">Explore innovative projects and experiments by our students.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="badge bg-light text-dark">24 Mar 2024</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="svg-primary2">
                                                                <svg  class="avatar-md avatar bg-primary2-transparent svg-primary2  p-2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V216a8,8,0,0,0,11.58,7.16L64,208.94l28.42,14.22a8,8,0,0,0,7.16,0L128,208.94l28.42,14.22a8,8,0,0,0,7.16,0L192,208.94l28.42,14.22A8,8,0,0,0,232,216V56A16,16,0,0,0,216,40Zm0,163.06-20.42-10.22a8,8,0,0,0-7.16,0L160,207.06l-28.42-14.22a8,8,0,0,0-7.16,0L96,207.06,67.58,192.84a8,8,0,0,0-7.16,0L40,203.06V56H216ZM60.42,167.16a8,8,0,0,0,10.74-3.58L76.94,152h38.12l5.78,11.58a8,8,0,1,0,14.32-7.16l-32-64a8,8,0,0,0-14.32,0l-32,64A8,8,0,0,0,60.42,167.16ZM96,113.89,107.06,136H84.94ZM136,128a8,8,0,0,1,8-8h16V104a8,8,0,0,1,16,0v16h16a8,8,0,0,1,0,16H176v16a8,8,0,0,1-16,0V136H144A8,8,0,0,1,136,128Z"></path></svg>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <div>
                                                                    <div class="fw-medium d-block my-1 fs-14">Cultural Fest 2024</div>
                                                                    <p class="text-muted fs-12 mb-0">Join us for a vibrant celebration of cultural diversity</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="badge bg-light text-dark">09 Apr 2024</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="svg-primary3">
                                                                <svg class="avatar-md avatar bg-primary3-transparent svg-primary3  p-2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-96-88v64a8,8,0,0,1-16,0V132.94l-4.42,2.22a8,8,0,0,1-7.16-14.32l16-8A8,8,0,0,1,112,120Zm59.16,30.45L152,176h16a8,8,0,0,1,0,16H136a8,8,0,0,1-6.4-12.8l28.78-38.37A8,8,0,1,0,145.07,132a8,8,0,1,1-13.85-8A24,24,0,0,1,176,136,23.76,23.76,0,0,1,171.16,150.45Z"></path></svg>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <div>
                                                                    <div class="fw-medium d-block my-1 fs-14">Founders' Day Celebration</div>
                                                                    <p class="text-muted fs-12 mb-0">Commemorating the vision and values of our school's founders.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="badge bg-light text-dark">09 Apr 2024</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="svg-secondary">
                                                                <svg class="avatar-md avatar bg-secondary-transparent svg-secondary  p-2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.07,48c-10.29,17.79-27.4,28-46.93,28s-36.63-10.2-46.92-28a8,8,0,1,1,13.84-8c7.47,12.91,19.21,20,33.08,20s25.61-7.1,33.07-20a8,8,0,0,1,13.86,8Z"></path></svg>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <div>
                                                                    <div class="fw-medium d-block my-1 fs-14">Literary Week</div>
                                                                    <p class="text-muted fs-12 mb-0">Engage in a week full of literary activities.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="badge bg-light text-dark">09 Apr 2024</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Students Overview
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light text-muted" data-bs-toggle="dropdown" aria-expanded="true"> Sort By <i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">This Month</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body pb-1">
                                    <div id="students-applicants"></div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row mt-0">
                                        <div class="col-6 border-end border-inline-end-dashed text-center p-3">
                                            <p class="mb-1 fw-medium">Boys</p>
                                            <h5 class="text-primary fw-medium">12.34K</h5>
                                        </div>
                                        <div class="col-6 text-center p-3">
                                            <p class="mb-1 fw-medium">Girls</p>
                                            <h5 class="text-secondary fw-medium">10.19K</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Activity
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light text-muted"> View All<i class="ti ti-arrow-narrow-right ms-1"></i> </a>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled school-activity-list">
                                        <li>
                                            <div>
                                                <h6 class="mb-1 fs-13">Mr. Thomas Brown<span class="fs-11 text-muted float-end">02:30PM</span></h6>
                                                <span class="d-block fs-13 text-muted fw-normal">Liked a post from <span class="badge bg-secondary-transparent">Ms. Sarah Parker</span> about the upcoming school event</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <h6 class="mb-1 fs-13">Mr. John Doe<span class="fs-11 text-muted float-end">12:47PM</span></h6>
                                                <span class="d-block fs-13 text-muted fw-normal">Updated class schedule</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <h6 class="mb-1 fs-13">Ms. Jane Smith<span class="fs-11 text-muted float-end">10:22AM</span></h6>
                                                <span class="d-block fs-13 text-muted mb-1 fw-normal">Posted a <span class="text-primary3 fs-14 fw-medium">new announcement</span></span>
                                                <div class="p-2 rounded-1 bg-light fs-13">
                                                    Reminder: Parent-Teacher meeting on Friday at 3 PM &#128197;
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <h6 class="mb-1 fs-13">Mrs. Emily Davis<span class="fs-11 text-muted float-end">11:30AM</span></h6>
                                                <span class="d-block fs-13 text-muted fw-normal">Commented on a student's project - <span class="fw-medium text-success">"Excellent Work"</span></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <h6 class="mb-1 fs-13">Alice Johnson<span class="fs-11 text-muted float-end">11:45AM</span></h6>
                                                <span class="d-block fs-13 text-muted fw-normal">Submitted a report - <span class="fw-medium text-success fs-14">"Science Project"</span></span>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div>
                                                <h6 class="mb-1 fs-13">Mr. Bob Anderson<span class="fs-11 text-muted float-end">10:54AM</span></h6>
                                                <span class="d-block fs-13 text-muted fw-normal">Reviewed a submission from <span class="badge bg-secondary-transparent">Jane Smith</span></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End::Row-3 -->

                    <!-- Start::Row-4 -->
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        E-obveščanje
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex flex-wrap gap-2">
                                            <div>
                                            </div>
                                            <div class="dropdown">
                                                <a href="/school_admin/app/email/schedules" class="btn btn-primary btn-sm" aria-expanded="false"> 
                                                    Poglej vse
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0 pt-2">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <td class="">Ime</td>
                                                    <td class="">Urnik</td>
                                                    <td class=""></td>
                                                    <td class=""></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($app_emails as $app_email)
                                                <tr>
                                                    <td class="" title="{{ $app_email->app_email_description }}">
                                                        {{ $app_email->app_email_name }}
                                                    </td>
                                                    <td class="">
                                                        @php
                                                            $schedules = $app_email->schedules($school_organization->app_organization->id);
                                                        @endphp
                                                        @if ($schedules->isNotEmpty())
                                                            @foreach ($schedules as $schedule)
                                                                <div class="d-flex align-items-center">
                                                                    {{ substr($schedule->day->app_day_name, 0, 1) }}:
                                                                    {{ $schedule->app_email_schedule_time ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->app_email_schedule_time)->format('G:i') : 'Ni določenega časa' }}
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <span class="text-muted">Ni aktivnih urnikov</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach

                                                @if (1==2)
                                                <tr>
                                                    <td class="">6</td>
                                                    <td class="">#6325</td>
                                                    <td class="">
                                                        <div class="d-flex align-items-center">
                                                            <a href="javascript:void(0);" class="avatar avatar-xs avatar-rounded me-2">
                                                                <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="img">
                                                            </a>
                                                            <a href="javascript:void(0);">Michael Shreff</a>
                                                        </div>
                                                    </td>
                                                    <td class="">X</td>
                                                    <td class="">A</td>
                                                    <td class="">15%</td>
                                                    <td class="">1.5</td>
                                                    <td class="">
                                                        <span class="text-danger fw-medium">Fail</span>
                                                    </td>
                                                    <td class="">
                                                        <div class="dropdown d-inline-block" data-bs-toggle="dropdown">
                                                            <a aria-label="anchor" href="javascript:void(0);" class="tx-inverse" ><i class="bi bi-three-dots"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a href="javascript:void(0);" class="dropdown-item">Action</a></li>
                                                                <li><a href="javascript:void(0);" class="dropdown-item">Another Action</a></li>
                                                                <li><a href="javascript:void(0);" class="dropdown-item">Something Else Here</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Exam Results
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light text-muted"> View All<i class="ti ti-arrow-narrow-right ms-1"></i> </a>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Student</th>
                                                    <th>Subject</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#8547</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <span class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span class="d-block fw-semibold lh-1 mb-1">Ion Somer</span>
                                                                <span class="fs-13 text-muted">Science</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Science</td>
                                                    <td class="text-success">92%</td>
                                                </tr>
                                                <tr>
                                                    <td>#7564</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <span class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span class="d-block fw-semibold lh-1 mb-1">Shakira</span>
                                                                <span class="fs-13 text-muted">English</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>English</td>
                                                    <td class="text-success">78%</td>
                                                </tr>
                                                <tr>
                                                    <td>#1254</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <span class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span class="d-block fw-semibold lh-1 mb-1">Thomas Shelby</span>
                                                                <span class="fs-13 text-muted">History</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>History</td>
                                                    <td class="text-success">88%</td>
                                                </tr>
                                                <tr>
                                                    <td>#7458</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <span class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span class="d-block fw-semibold lh-1 mb-1">Stefan U</span>
                                                                <span class="fs-13 text-muted">Geography</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Geography</td>
                                                    <td class="text-secondary">65%</td>
                                                </tr>
                                                <tr>
                                                    <td>#6325</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <span class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="img">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span class="d-block fw-semibold lh-1 mb-1">Michael Shreff</span>
                                                                <span class="fs-13 text-muted">Physics</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Physics</td>
                                                    <td class="text-success">80%</td>
                                                </tr>
                                                <tr>
                                                    <td>#2321</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <span class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span class="d-block fw-semibold lh-1 mb-1">Leo Phllip</span>
                                                                <span class="fs-13 text-muted">Chemistry</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Chemistry</td>
                                                    <td class="text-success">83%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End::Row-4 -->

@endsection

@section('scripts')
        
        <!-- Apex Charts JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- HRM Dashboard JS -->
        @vite('resources/assets/js/school-dashboard.js')

@endsection
