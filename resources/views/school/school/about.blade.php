
@extends('layouts.school_master')

@section('styles')

        <link rel="stylesheet" href="{{asset('build/assets/libs/swiper/swiper-bundle.min.css')}}">

@endsection

@section('content')
                    @include('school.school.partial.school_navbar')
	
                    <!-- Start::page-header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $school_organization->school_organization_name_short }}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">O šoli</a></li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">O šoli</h1>
                        </div>
                    </div>
                    <!-- End::page-header -->
                    
                    <!-- Start::row-1 -->
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-2 col-xl-12">
                                    <img style="width: 100%" src="/storage/app/organizations/{{$school_organization->app_organization->app_organization_image}}" alt="Logo šole" class="toggle-logo">
                                </div>
                                <div class="col-xxl-10 col-xl-12">
                                    <div class="card custom-card shadow-none border mb-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12 mt-xxl-0 mt-3">
                                                    <div class="d-flex gap-2 align-items-center justify-content-between mb-3">
                                                        <div>
                                                            <p class="fs-18 fw-medium mb-0">{{ $school_organization->school_organization_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fs-15 fw-medium mb-1">Opis:</p>
                                                        <p class="text-muted mb-0">
                                                        @if($vision = $school_organization->description('description'))
                                                            {!! $school_organization->description('description')->school_description_description !!}
                                                        @else
                                                            <p>Opis ni na voljo.</p>
                                                        @endif
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fs-15 fw-medium mb-1">Vizija:</p>
                                                        <p class="text-muted mb-0">
                                                        @if($vision = $school_organization->description('vision'))
                                                            {!! $school_organization->description('vision')->school_description_description !!}
                                                        @else
                                                            <p>Opis ni na voljo.</p>
                                                        @endif
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="fs-15 fw-medium mb-1">Poslanstvo:</p>
                                                        <p class="text-muted mb-0">
                                                        @if($vision = $school_organization->description('mission'))
                                                            {!! $school_organization->description('mission')->school_description_description !!}
                                                        @else
                                                            <p>Opis ni na voljo.</p>
                                                        @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->
                        
                    @if (1==2)
                        <!--Start::row-2 -->
                        <div class="row">
                            <div class="col-xxl-12 col-sm-12">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">Mediji:</div>
                                        <a href="javascript:void(0);" class="btn btn-light btn-sm text-muted ms-auto">
                                            Dodaj
                                        </a>
                                    </div>
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4 col-sm-12">
                                            <div class="swiper swiper-preview-details bg-light product-details-page">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide" id="img-container">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/2.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="swiper-slide image-container">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/3.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="swiper-slide image-container">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/4.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="swiper-slide image-container">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/5.jpg')}}" alt="img">
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                            <div class="swiper swiper-view-details mt-2">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/2.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="swiper-slide image-container">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/3.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="swiper-slide image-container">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/4.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="swiper-slide image-container">
                                                        <img class="img-fluid" src="{{asset('build/assets/images/nft-images/5.jpg')}}" alt="img">
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End::row-2 -->
                    @endif

                    

@endsection

@section('scripts')
	
        <!-- Swiper JS -->
        <script src="{{asset('build/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

        <!-- Internal NFT-Details JS -->
        @vite('resources/assets/js/nft-details.js')

@endsection
