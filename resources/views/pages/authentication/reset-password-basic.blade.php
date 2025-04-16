
@extends('layouts.custom-master2')

@section('styles')



@endsection

@section('content')
	
        <div class="container-lg">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card my-4">
                        <div class="card-body p-5">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{url('index')}}">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
                                </a>
                            </div>
                            <p class="h5 mb-2 text-center">Reset Password</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center fs-14">Hi Henry!</p>
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="reset-password" class="form-label text-default">Current Password <sup class="fs-12 text-danger">*</sup></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control create-password-input" id="reset-password" placeholder="current password">
                                        <a href="javascript:void(0);" class="show-password-button text-muted"  onclick="createpassword('reset-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <label for="reset-newpassword" class="form-label text-default">New Password <sup class="fs-12 text-danger">*</sup></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control create-password-input" id="reset-newpassword" placeholder="new password">
                                        <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('reset-newpassword',this)" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="reset-confirmpassword" class="form-label text-default">Confirm Password <sup class="fs-12 text-danger">*</sup></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control create-password-input" id="reset-confirmpassword" placeholder="confirm password">
                                        <a href="javascript:void(0);" class="show-password-button text-muted"  onclick="createpassword('reset-confirmpassword',this)" id="button-addon22"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                    <div class="mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember Me ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <a href="{{url('sign-in-basic')}}" class="btn btn-primary">Create</a>
                            </div>
                            <div class="text-center">
                                <p class="text-muted mt-3">Remembered your password? <a href="{{url('sign-in-basic')}}" class="text-primary">Sign In</a></p>
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
