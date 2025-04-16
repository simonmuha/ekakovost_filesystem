
@extends('layouts.custom-master3')

@section('styles')



@endsection

@section('content')
	
        <div class="row authentication two-step-verification authentication-cover-main mx-0">
            <div class="col-xxl-6 col-xl-7">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-6 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                        <div class="card custom-card my-auto border">
                            <div class="card-body p-4 p-sm-5">
                                <p class="h5 mb-2 text-center">Verification Code</p>
                                <p class="mb-4 text-muted op-7 fw-normal text-center fs-12">Enter the 4 digit code sent to the moble number ******850.</p>
                                <div class="row gy-3">
                                    <div class="col-xl-12 mb-2">
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="one" maxlength="1" onkeyup="clickEvent(this,'two')">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="two" maxlength="1" onkeyup="clickEvent(this,'three')">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="three" maxlength="1" onkeyup="clickEvent(this,'four')">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control text-center" id="four" maxlength="1">
                                            </div>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label fs-14" for="defaultCheck1">
                                                Didn't recieve a code ?<a href="{{url('mail')}}" class="text-primary ms-2 d-inline-block">Resend</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 d-grid mt-2">
                                        <a href="{{url('index')}}" class="btn btn-primary">Verify</a>
                                    </div>
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
	
        <!-- Internal Two Step Verification JS -->
        <script src="{{asset('build/assets/two-step-verification.js')}}"></script>

@endsection
