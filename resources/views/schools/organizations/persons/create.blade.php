@extends('layouts.app_quality')
@section ('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>   


{!! Form::open(['action' => 'App\Http\Controllers\School\SchoolOrganizationPersonsController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
<input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
<input name="school_organization_year_id" type="hidden" value="{{$school_organization->id}}"> 

    <div class="row">
        <div class="d-flex align-items-center justify-content-between bd-highlight" >
            <div class="bd-highlight">
                <h4>Dodaj novega zaposlenega k organizaciji: {{$school_organization->school_organization_name}}</h4>
            </div>
            <div class="bd-highlight">
                <a href="{{ url()->previous() }}" title="Nazaj">
                    <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                    | 
                    <a href="/schools/organizations" title="Organizacije"><i class="fa fa-building fa-lg icon-menu"> </i></a>
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </a>
            </div>
            <input name="school_organization_parent_id" type="hidden" value="{{$school_organization->id}}"> 
        </div>
        <hr>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">
            <div class="card border-0">
                <div class="row">
                    <div class="col-md-12 text-center">
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('person_name','Ime:')}}
                    </div>
                    <div class="col-md-9">
                        {{Form::text('person_name','',['class' =>'form-control', 'placeholder'=>'Ime'])}}
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('person_surname','Priimek:')}}
                    </div>
                    <div class="col-md-9">
                        {{Form::text('person_surname','',['class' =>'form-control', 'placeholder'=>'Priimek'])}}
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('person_email','E-naslov:')}}
                    </div>
                    <div class="col-md-9">
                        {{ Form::text('person_email', '', ['class' =>'form-control', 'placeholder'=>'Vnesi e-naslov', 'type'=>'email']) }}
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div> 
            <div class='form-group'>
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('person_employment_start_date','Začetek zaposlitve')}}
                    </div>
                    <div class="col-md-9">
                        {{Form::text('person_employment_start_date','',['class' =>'date form-control', 'placeholder'=>'Datum'])}} 
                    </div>
                </div>
            </div>
            <div class='form-group'>
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('person_employment_end_date','Konec zaposlitve')}}
                    </div>
                    <div class="col-md-9">
                    {{Form::text('person_employment_start_date','',['class' =>'date form-control', 'placeholder'=>'Datum'])}} 
                    </div>
                </div>
            </div>
                
            <div class="modal-footer justify-content-end">
                {{Form::submit('Dodaj osebo', ['class' =>'btn btn-primary' ])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>

 <script type="text/javascript">
    $('.date').datepicker({  
        format: 'dd. mm. yyyy'
        });  
</script> 
@endsection