
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Socialni mediji</a></li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Socialni mediji</h1>
                        </div>
                    </div>
                    <!-- End::page-header -->
                    <!--Start::Social media -->
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="row">
                                @if ( $school_organization->activeSocialMedia )
                                    @foreach ($school_organization->activeSocialMedia()->get() as $school_social_media)
                                        <div class="col-xl-2">
                                            <div class="card custom-card social-cards {{ $school_social_media->appSocialMediaType->app_social_media_social_cards }}">
                                                <div class="card-body flex-fill">
                                                    <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                        <div>
                                                            <p class="flex-fill fs-15 fw-medium mb-1 text-primary2">{{ $school_social_media->appSocialMediaType->app_social_media_type_name }} </p>
                                                            <p class="mb-2 fs-24 fw-medium"> </p>
                                                            <div class="flex-between">
                                                                <span class="text-muted fs-12">
                                                                    <a href= "{{ $school_social_media->school_social_media_url }}" target="_blank"> 
                                                                        Odpri
                                                                    </a> 
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="align-self-center ms-auto">
                                                            <!-- <span class="avatar avatar-md bg-transparent text-primary2"><i class="ri-instagram-line fs-25 lh-1"></i></span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--End::Social media -->
                    
                        
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
