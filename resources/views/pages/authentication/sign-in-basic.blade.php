
@extends('layouts.custom-master2')

@section('styles')



@endsection

@section('content')
	
        <div class="container">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card my-4">
                        <div class="card-body p-5">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{url('index')}}">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
                                </a>
                            </div>
                            <p class="h5 mb-2 text-center">Sign In</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back Henry !</p>
                            <div class="d-flex mb-3 justify-content-between gap-2 flex-wrap flex-lg-nowrap">
                                <button class="btn btn-lg btn-light-ghost border d-flex align-items-center justify-content-center flex-fill bg-light">
                                    <span class="avatar avatar-xs flex-shrink-0">
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
                                    <label for="signin-username" class="form-label text-default">User Name<sup class="fs-12 text-danger">*</sup></label>
                                    <input type="text" class="form-control" id="signin-username" placeholder="user name">
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default d-block">Password<sup class="fs-12 text-danger">*</sup><a href="{{url('reset-password-basic')}}" class="float-end fw-normal text-muted">Forget password ?</a></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control create-password-input" id="signin-password" placeholder="password">
                                        <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
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
                            </div>
                            <div class="d-grid mt-4">
                                <a href="{{url('index')}}" class="btn btn-primary">Sign In</a>
                            </div>
                            <div class="text-center">
                                <p class="text-muted mt-3 mb-0">Dont have an account? <a href="{{url('sign-up-basic')}}" class="text-primary">Sign Up</a></p>
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

@endsection

@section('scripts')
	
        <!-- Show Password JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection
