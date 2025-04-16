@extends('layouts.app')
@section ('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>   

<style>

.btn-light {
  width: 100%;
}
.btn:active,
.active {
  color: black !important;
  background-color: green !important;
  border-color: blue !important;

   

}
    .btn.btn-toggle
    {
        cursor:pointer;
        text-transform:lowercase;
        background-color:#727272;
        margin: 6px;
    }
    .btn.btn-toggle:last-of-type
    {
        margin-right:0;
    }
    .btn.btn-toggle:active,
    .btn.btn-toggle.active
    {
        background-color:#7cab66 !important;
    }
    .btn.btn-toggle:active:focus
    {
        box-shadow:none !important;
    }
    .btn:hover:not([disabled]):not(.disabled),
    .btn:focus:not([disabled]):not(.disabled)
    {
        color:#fff;
        -webkit-box-shadow:0 5px 20px 0 rgba(0,0,0,.2);
        -moz-box-shadow:0 5px 20px 0 rgba(0,0,0,.2);
        box-shadow:0 5px 20px 0 rgba(0,0,0,.2);
    }


</style>


{!! Form::open(['action' => 'App\Http\Controllers\PersonsController@store', 'method' =>'POST']) !!}
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>Moj osebni profil</h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
                <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
            </a>
        </div>
    </div>
    <hr>
</div>

    <br>
    <div class="row">
        <div class="col-md-2">
            <div class="card border-0">
                <img src="/storage/users/{{$user->user_profile_image}}" alt="Profilna slika" class="card-img-top"> 
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">

                    <div class="card"> 
                        <div class="card-header">Osebni podatki</div>
                        <div class="card-body">
                        Spol: 
                        <div class="btn-group-toggle" data-toggle="buttons" style="margin:5px;">
                            <label class='btn btn-toggle'>
                                <input type="radio" name="person_gender" id="option1" autocomplete="off" value="male"> moški
                            </label>
                            <label class='btn btn-toggle'>
                                <input type="radio" name="person_gender" id="option2" autocomplete="off" value="female"> ženski
                            </label>
                        </div>
                        <hr>
                            <div class='form-group'>
                                <div class="row">
                                    <div class="col-md-3">
                                        {{Form::label('person_name','Ime')}}
                                    </div>
                                    <div class="col-md-9">
                                        {{Form::text('person_name','',['class' =>'form-control', 'placeholder'=>'Ime'])}}
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="row">
                                    <div class="col-md-3">
                                        {{Form::label('person_surname','Priimek')}}
                                    </div>
                                    <div class="col-md-9">   
                                        {{Form::text('person_surname','',['class' =>'form-control', 'placeholder'=>'Priimek'])}}
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="row">
                                    <div class="col-md-3">
                                        {{Form::label('person_birth_date','Datum rojstva: ')}}
                                    </div>
                                    <div class="col-md-9"> 
                                        {{Form::text('person_birth_date','',['class' =>'date form-control', 'placeholder'=>'Datum'])}}    
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="row">
                                    <div class="col-md-3">
                                        {{Form::label('gsm','GSM')}}
                                    </div>
                                    <div class="col-md-9"> 
                                        {{Form::text('gsm','',['class' =>'form-control', 'placeholder'=>'GSM'])}}
                                    </div>
                                </div>
                            </div>
                             
                        </div> 
                    </div>
                </div>
            </div>
            <br>
            
            
            <br>
            {{Form::submit('Shrani svoj profil', ['class' =>'btn btn-primary' ])}}
            {!! Form::close() !!}
            
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.date').datepicker({  
           format: 'dd. mm. yyyy'
         });  
    </script> 
  

@endsection