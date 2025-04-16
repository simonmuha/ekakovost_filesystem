
@extends('layouts.custom-master1')

@section('styles')



@endsection

@section('content')
	
        <div class="row authentication coming-soon justify-content-center g-0 my-auto">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-7 col-11 my-auto">
                <div class="authentication-cover rounded-3 overflow-hidden card custom-card border my-3">
                    <div class="aunthentication-cover-content text-center">
                        <div class="row justify-content-center align-items-center mx-0 g-0">
                            <div class="col-xxl-11 col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
                                <div>
                                    <div class="mb-4"> <a href="{{url('index')}}"> 
                                        <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="" class="authentication-brand"> </a> 
                                    </div>
                                    <h4 class="mb-2">Under Maintenance</h4>
                                    <p class="mb-5 text-muted">Excuse our digital dust - we're sprucing up our site to bring you an even better browsing adventure soon!</p>
                                    <div class="input-group mb-5">
                                        <input type="email" class="form-control form-control-lg bg-light" placeholder="info@gmail.com" aria-label="info@gmail.com" aria-describedby="button-addon2">
                                        <button class="btn btn-primary btn-lg" type="button" id="button-addon2">Subscribe</button>
                                    </div>
                                    <div class="d-flex gap-3 flex-wrap mt-4 mb-0 gy-xxl-0 gy-3 justify-content-center" id="timer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
	
        <!-- Anime JS -->
        <script src="{{asset('build/assets/libs/animejs/lib/anime.min.js')}}"></script>

        <!-- Internal Coming Soon JS -->
        <script src="{{asset('build/assets/coming-soon.js')}}"></script>

@endsection
