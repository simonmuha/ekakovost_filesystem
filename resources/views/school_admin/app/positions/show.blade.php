@extends('layouts.school_admin')
@section('content')


<!-- Add main app area to position -->
<div class="modal fade" id="AddPersonToPossitionModal" tabindex="-1" role="dialog" aria-labelledby="AddPersonToPossitionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\SchoolAdmin\AppPositionsController@store_person_to_possition', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="app_position_id" type="hidden" value="{{ $app_position->id }}"> 
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodaj uporabnika na delovno mesto: {{ $app_position->app_position_name }}</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('person_id','Uporabnik') }}
                        </div>
                        <div class="col-md-9"> 
                            <select type="text" name="person_id" class="form-control" required="required"> 
                                <option value="">Izberite uporabnika</option> 
                                @foreach($school_organization_people as $school_organization_person) 
                                        <option value="{{ $school_organization_person->id }}">{{ $school_organization_person->person_name }}</option>  
                                @endforeach 
                            </select> 
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                {{ Form::submit('Dodaj uporabnika', ['class' =>'btn btn-primary' ]) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>




<!-- Main -->

<div class="row d-flex align-items-stretch">
    <div class="col-md-8">
        <div class="card school_admin-card h-100">
            <div class="card-header school_admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                    {{$app_position->app_position_name}} 
                    </h5>
                    <div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $app_position->app_position_description !!}
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card school_admin-card h-100">
            <div class="card-header school_admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Področja
                    </h5>
                    <div>
                    
                    </div>
                </div>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>
<br>
<div class="card school_admin-card h-100">
    <div class="card-header school_admin-card-header">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h5>
                Uporabniki
            </h5>
            <div>
                <a href="#" data-target="#AddPersonToPossitionModal" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
            </div>
        </div>
    </div>
    <div class="card-body">
    </div>
    <div class="card-footer">

    </div>
</div>
<br>






<!-- Include Bootstrap CSS if not already included -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-fgbrPmUpH6sFTa9daX0qRz/Wvc1pK4pIYWXYMLiJ/NScvoEGH/HdgMSL2C/zrGw4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection
