
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
                                    <li class="breadcrumb-item active" aria-current="page">Chartjs</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Chartjs</h1>
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
                                    <div class="card-title">Chartjs Line Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-line" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Bar Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-bar" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Pie Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-pie" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Doughnut Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-doughnut" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Mixed Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-mixed" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Polar Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-polar" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Radial Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-radar" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Scatter Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-scatter" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Chartjs Bubble Chart</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-bubble" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->

@endsection

@section('scripts')
	
        <!-- Chartjs Chart JS -->
        <script src="{{asset('build/assets/libs/chart.js/chart.umd.js')}}"></script>

        <!-- Imternal Chartjs JS -->
        @vite('resources/assets/js/chartjs-charts.js')

@endsection
