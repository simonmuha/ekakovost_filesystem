
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
                                    <li class="breadcrumb-item active" aria-current="page">Apex Candlestick Charts</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Apex Candlestick Charts</h1>
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
                                    <div class="card-title">Basic Candlestick Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="candlestick-basic"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Candlestick Synced With Brush Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="chart-candlestick"></div>
                                    <div id="chart-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Candlestick With Cateory X-axis</div>
                                </div>
                                <div class="card-body">
                                    <div id="candlestick-categoryx"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Candlestick With Line Chart</div>
                                </div>
                                <div class="card-body">
                                    <div id="candlestick-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->

@endsection

@section('scripts')
	
        <!-- Apex Charts JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Used For Candlestick Synced With Brush Chart -->
        <script src="{{asset('build/assets/apexcharts-candlestick-seriesdata.js')}}"></script>

        <!-- Used For Candlestick With Cateory X-axis Chart-->
        <script src="{{asset('build/assets/apexcharts-dayjs.js')}}"></script>

        <!-- Internal Apex Candlestick Charts JS -->
        @vite('resources/assets/js/apexcharts-candlestick.js')

@endsection
