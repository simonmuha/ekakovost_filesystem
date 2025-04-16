
@extends('layouts.custom-master2')

@section('styles')



@endsection

@section('content')
	
        <!-- End Switcher -->
        <div class="container-lg">
            <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card my-4">
                        <div class="card-body p-5">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{url('index')}}">
                                    <img alt="logo" class="desktop-logo" src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}"> 
                                    <img alt="logo" class="desktop-white" src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}">
                                </a>
                            </div>
                            <p class="h5 mb-2 text-center">Create Password</p>
                            <p class="mb-4 text-muted fw-normal text-center fs-14">Hi Henry!</p>
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label class="form-label text-default" for="create-password">Password<sup class="fs-12 text-danger">*</sup></label>
                                    <div class="position-relative">
                                        <input class="form-control create-password-input" id="create-password" placeholder="password" type="password"> <a class="show-password-button text-muted" href="javascript:void(0);" onclick="createpassword('create-password',this)"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label class="form-label text-default" for="create-confirmpassword">Confirm Password<sup class="fs-12 text-danger">*</sup></label>
                                    <div class="position-relative">
                                        <input class="form-control create-password-input" id="create-confirmpassword" placeholder="password" type="password"> <a class="show-password-button text-muted" href="javascript:void(0);" onclick="createpassword('create-confirmpassword',this)"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" id="defaultCheck1" type="checkbox" value=""> <label class="form-check-label text-muted fw-normal" for="defaultCheck1">Remember password ?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button class="btn btn-primary">Save Password</button>
                            </div>
                            <div class="text-center">
                                <p class="text-muted mt-3 mb-0">Back to home ? <a class="text-primary" href="{{url('index')}}">Click Here</a></p>
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
