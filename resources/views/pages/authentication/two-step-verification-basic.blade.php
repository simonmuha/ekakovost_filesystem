
@extends('layouts.custom-master2')

@section('styles')



@endsection

@section('content')
	
        <div class="container-lg">
            <div class="row justify-content-center align-items-center authentication two-step-verification authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card my-4">
                        <div class="card-body p-4 p-sm-5">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{url('index')}}">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                                    <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
                                </a>
                            </div>
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

@endsection

@section('scripts')
	
        <!-- Internal Two Step Verification JS -->
        <script src="{{asset('build/assets/two-step-verification.js')}}"></script>

@endsection
