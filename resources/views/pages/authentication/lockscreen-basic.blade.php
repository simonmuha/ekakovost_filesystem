
@extends('layouts.custom-master2')

@section('styles')



@endsection

@section('content')
	
        <div class="container-lg">
            <div class="row justify-content-center authentication authentication-basic align-items-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card">
                        <div class="card-body p-5">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{url('index')}}">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
                                </a>
                            </div>
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

@endsection

@section('scripts')
	
        <!-- Show Password JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection
