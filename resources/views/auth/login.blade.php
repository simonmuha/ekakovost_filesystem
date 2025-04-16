
@extends('layouts.login_master')

@section('styles')

@section('title', 'Prijava - eKakovost')

@endsection

@section('content')
	
        <div class="row authentication authentication-cover-main mx-0">
            <div class="col-xxl-6 col-xl-7">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-xxl-7 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                        <div class="card custom-card my-auto border">
                            <div class="card-body p-5">
                                <p class="h5 mb-2 text-center">
                                    <div class="row" style="display: flex; justify-content: center; align-items: center;">
                                        <div class="col-md-6">
                                            <img style="width: 100%; max-width: 300px;" src="/storage/LogoERS.png" alt="Logo">
                                        </div>
                                    </div>
                                </p>



                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <label for="email" class="form-label text-default">{{ __('E-naslov') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xl-12 mb-2">
                                        <label for="password" class="form-label text-default d-block">Geslo
                                            @if (Route::has('password.request'))
                                                <a class="float-end fw-normal text-muted" href="{{ route('password.request') }}">
                                                    {{ __('Pozabljeno geslo?') }}
                                                </a>
                                            @endif
                                        </label>
                                        

                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  id="password" placeholder="geslo">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" name="password" required autocomplete="current-password" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label text-muted fw-normal" for="remember">
                                                    Zapomni se me?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Prijava') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-5 col-lg-12 d-xl-block d-none px-0">
                <div class="authentication-cover overflow-hidden">
                    <div class="authentication-cover-logo"> 
                        <a href="{{url('index')}}"> 
                        <img src="storage/app/logo1.png" alt="" class="authentication-brand desktop-white" style="transform: scale(2);">
                        </a> 
                    </div>
                    <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                        <div>
                            <h3 class="text-fixed-white mb-1 fw-medium">Dobrodošli!</h3>
                            <h6 class="text-fixed-white mb-3 fw-medium">Pot do odličnosti</h6>
                            <p class="text-fixed-white mb-1 op-6" style="font-size: 150%;">
                                Aplikacija omogoča enostavno upravljanje in spremljanje kakovosti na šoli. 
                                Vključuje različne že pripravljene sisteme kakovosti, hkrati pa daje možnost, 
                                oblikovanja svojega lastenga sistema, prilagojen potrebam šole.
                            </p>
                            <p class="text-fixed-white mb-1 op-6" style="font-size: 150%;">
                                S pomočjo aplikacije lahko ustvarjate in upravljate vprašalnike za zbiranje mnenj in 
                                analizirate rezultate za izboljšanje kakovosti na šoli. 
                            </p>
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
