@extends('layouts.login_master')

@section('title', 'Nadzorna plošča - eKakovost')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vnos podatkov za ponastavitev gesla') }}</div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            Za ponastavitev gesla vpišite vaš elektronski naslov. Na ta elektronski naslov boste prejeli povezavo za ponastavitev gesla. Če tega naslova ne poznate, se za pridobitev podatkov obrnite na administratorja, kjer ste račun pridobili.
                            Povezava za ponastavitev gesla bo veljavna eno uro.
                        </div>
                    </div>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-naslov') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pošlji podatke') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
