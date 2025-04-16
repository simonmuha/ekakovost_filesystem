<script>
    setTimeout(function () {
        window.location.href= '/home'; // the redirect goes here
    },5000); // 5 seconds 
</script>

@extends('layouts.error_master')

@section('styles')



@endsection

@section('content')
	
        <div class="page error-bg">
            <!-- Start::error-page -->
            <div class="error-page">
                <div class="container">
                    <div class="my-auto">
                        <div class="row align-items-center justify-content-center h-100">
                            <div class="col-xl-7 col-lg-5 col-md-6 col-12">
                                <p class="error-text mb-4">500</p>
                                <p class="fs-4 fw-normal mb-2">Ups! Stran, ki jo želite obiskati, ne obstaja.</p>
                                <p class="fs-15 mb-5 text-muted">Prišlo je do notranje napake strežnika. Prosimo, poskusite znova pozneje ali obvestite skrbnika sistema.</p>
                                <a href="{{url('index')}}" class="btn btn-primary"><i class="ri-arrow-left-line align-middle me-1 d-inline-block"></i> BACK TO HOME PAGE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
	


@endsection
