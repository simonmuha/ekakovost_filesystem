
@extends('layouts.custom-master3')

@section('styles')



@endsection

@section('content')
	
        <div class="row authentication authentication-cover-main mx-0">
            <div class="col-xxl-6 col-xl-7">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-7 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                        <div class="card custom-card my-5 border">
                        <div class="card-body p-5">
                                <p class="h5 mb-2 text-center">Sign Up</p>
                                <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome! Begin by creating your account.</p>
                                <div class="d-flex mb-3 justify-content-between gap-2 flex-wrap flex-lg-nowrap">
                                    <button class="btn btn-lg border d-flex align-items-center justify-content-center flex-fill btn-light">
                                        <span class="avatar avatar-xs">
                                            <img src="{{asset('build/assets/images/media/apps/google.png')}}" alt="">
                                        </span>
                                        <span class="lh-1 ms-2 fs-13 text-default">Signup with Google</span>
                                    </button>
                                </div>
                                <div class="text-center my-3 authentication-barrier">
                                    <span>OR</span>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signup-firstname" class="form-label text-default">Full Name<sup class="fs-12 text-danger">*</sup></label>
                                        <input type="text" class="form-control" id="signup-firstname" placeholder="full name">
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signup-password" class="form-label text-default">Password<sup class="fs-12 text-danger">*</sup></label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control create-password-input" id="signup-password" placeholder="password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-password',this)"  id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signup-confirmpassword" class="form-label text-default">Confirm Password<sup class="fs-12 text-danger">*</sup></label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control create-password-input" id="signup-confirmpassword" placeholder="confirm password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-confirmpassword',this)"  id="button-addon21"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal fs-14" for="defaultCheck1">
                                            </label>
                                            By creating a account you agree to our 
                                            <a href="{{url('terms-conditions')}}" class="text-success"><u>Terms & Conditions</u></a> and <a class="text-success"><u>Privacy Policy</u></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button class="btn btn-primary">Create Account</button>
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mt-3 mb-0">Already have an account? <a href="{{url('sign-in-basic')}}" class="text-primary">Sign In</a></p>
                                </div>
                                <div class="btn-list text-center mt-3">
                                    <button class="btn btn-icon btn-wave btn-primary-light">
                                        <i class="ri-facebook-line lh-1 align-center fs-17"></i>
                                    </button>
                                    <button class="btn btn-icon btn-wave btn-primary1-light">
                                        <i class="ri-twitter-x-line lh-1 align-center fs-17"></i>
                                    </button>
                                    <button class="btn btn-icon btn-wave btn-primary2-light">
                                        <i class="ri-instagram-line lh-1 align-center fs-17"></i>
                                    </button>
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
	
        <!-- Show Password JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection
