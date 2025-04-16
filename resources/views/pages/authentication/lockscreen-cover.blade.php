
@extends('layouts.custom-master3')

@section('styles')



@endsection

@section('content')
	
        <div class="row authentication authentication-cover-main mx-0">
            <div class="col-xxl-6 col-xl-7">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-6 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                        <div class="card custom-card my-auto border">
                            <div class="card-body p-5">
                                <p class="h5 mb-3 text-center">Lock Screen</p>
                                <div class="row gy-3">
                                    <div class="col-xl-12 mb-2">
                                        <label for="lockscreen-password" class="form-label text-default">Password<sup class="fs-12 text-danger">*</sup></label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control create-password-input" id="lockscreen-password" placeholder="password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('lockscreen-password',this)"  id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                    Remember password ?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 d-grid mt-2">
                                        <a href="{{url('index')}}" class="btn btn-primary">Unlock</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mt-3 mb-0">Back to home ? <a class="text-primary" href="{{url('index')}}">Click Here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-5 col-lg-12 d-xl-block d-none px-0">
                <div class="authentication-cover overflow-hidden">
                    <div class="authentication-cover-logo"> 
                        <a href="{{url('index')}}"> 
                            <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="" class="authentication-brand desktop-white"> 
                        </a> 
                    </div>
                    <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                        <div>
                            <h3 class="text-fixed-white mb-1 fw-medium">Welcome Henry!</h3>
                            <h6 class="text-fixed-white mb-3 fw-medium">Login to Your Account</h6>
                            <p class="text-fixed-white mb-1 op-6">Welcome to the Admin Dashboard. Please log in to securely manage your administrative tools and oversee platform activities. Your credentials ensure system integrity and functionality.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
	
        <!-- Swiper JS -->
        <script src="{{asset('build/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

        <!-- Show Password JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection
