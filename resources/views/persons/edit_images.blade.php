@extends('layouts.app')
@section ('content')

@if(Auth::user()->id != $person->person_user_id ) <script>window.location = "/home";</script> @endif
{!! Form::open(['action' => 'App\Http\Controllers\PersonsController@store', 'method' =>'POST']) !!}

<div class="row">
    <div class="col-md-12">
        <h4>
            <b>
                Urejanje profila - Slike
            </b>
        </h4>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="card"> 
            <div class="row">
                <div class="col-md12 col-sm-12">
                    <div class="img-edit">
                        <img style= "width:100%" src="/storage/users/{{$person->person_profile_image}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <b>Ime:</b><br>
                {{Auth::user()->name}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>E-naslov:</b><br>
                {{Auth::user()->email}}
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
                <b>Datum registracije:</b><br>
                {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d. m. Y')}}
            </div>
        </div> 
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <h4>
                    <b>
                        Naslovna slika
                    </b>
                </h4>
            </div>
            <div class="col-md-12">
                <img style= "width:100%" src="/storage/users/{{$person->person_home_image}}">
            </div>

        </div>  
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <b>Naloži novo sliko:</b><br>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <small>Ločljivost slike je: 1400x400 pt.</small><br>
            </div>
            <div class="col-md-1">
            </div>
        </div> 
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h4>
                    <b>
                        Profilna slika
                    </b>
                </h4>
            </div>
            <div class="col-md-4">
                <img style= "width:100%" src="/storage/users/{{$person->person_profile_image}}">
            </div>

        </div>  
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <b>Naloži novo sliko:</b><br>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <small>Ločljivost slike je: 400x400 pt.</small><br>
            </div>
            <div class="col-md-1">
            </div>
        </div> 
        <hr>


 
            {{Form::submit('Naloži slike', ['class' =>'btn btn-primary' ])}}
            {!! Form::close() !!}
            
            </div>
        </div>
    </div>

  

@endsection