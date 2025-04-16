@extends('layouts.login')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <br>
            <h1>Dobrodošli!</h1>
            <br>
            <p>
                Aplikacija omogoča enostavno upravljanje in spremljanje kakovosti na šoli. 
                Aplikacija vključuje različne že pripravljene sisteme kakovosti, hkrati pa vam daje možnost, 
                da oblikujete svoj lasten sistem, prilagojen potrebam  šole.
            </p>
            <p>
                S pomočjo aplikacije lahko ustvarjate in upravljate vprašalnike za zbiranje mnenj in 
                analizirate rezultate za izboljšanje kakovosti na  šoli. 
            </p>
            <p>
                Poleg tega vam aplikacija ponuja pregledno nadzorno ploščo, kjer lahko  
                pregledujete trenutne pomembne atribute kakovosti za šolo ali učitelja. To vam omogoča 
                hitro in učinkovito sledenje ključnim kazalnikom kakovosti in sprejemanje informiranih odločitev.
            </p>
        
        </div>
        <div class="col-md-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <img style= "width:100%" src="/storage/LogoERS.png">
                                </div>
                            </div>
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="email">{{ __('E-naslov') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="password" >{{ __('Geslo') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Zapomni se me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Prijava') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Pozabljeno geslo?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


