
@extends('layouts.master')

@section('styles')



@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Charts</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apex Charts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Apex Pie Charts</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Apex Pie Charts</h1>
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
                    <!-- Page Header Close -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Basic Pie Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="pie-basic"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Simple Donut Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="donut-simple"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Updating Donut Chart</div>
                                </div>
                                <div class="card-body mx-auto">
                                    <div id="donut-update"></div>
                                    <div class="text-center mt-4">
                                        <button class="btn btn-primary btn-sm m-1" id="randomize">Randomize</button>
                                        <button class="btn btn-primary btn-sm m-1" id="add">Add</button>
                                        <button class="btn btn-primary btn-sm m-1" id="remove">Remove</button>
                                        <button class="btn btn-primary btn-sm m-1" id="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Monochrome Pie Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="pie-monochrome"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Gradient Donut Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="donut-gradient"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Donut Chart With Patterns</div>
                                </div>
                                <div class="card-body mx-auto">
                                    <div id="donut-pattern"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Image Filled Pie Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="pie-image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->

@endsection

@section('scripts')
	
        <!-- Apex Charts JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Internal Apex Pie Charts JS -->
        @vite('resources/assets/js/apexcharts-pie.js')

@endsection
