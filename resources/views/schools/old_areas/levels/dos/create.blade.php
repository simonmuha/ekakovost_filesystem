@extends('layouts.app_schoolareas')
@section ('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 

{!! Form::open(['action' => 'App\Http\Controllers\School\SchoolAreaLevelDosController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
<input type="hidden" name="school_area_level_id" value="{{ $school_area_level->id }}">
<input type="hidden" name="school_area_level_do_must_number" value="{{ $school_area_level_do_must_number }}">


<div class="card schoolareas-card" style="flex: 0 0 60%;">     
    <div class="card-body">
        <div class="row"> 
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">
                    <h4>Področje šole: {{$school_area_level->area->school_area_name}}</h4>
                    <h5>Stopnja {{$school_area_level->school_area_level_number}}: {{$school_area_level->school_area_level_name}}</h5>
                    Odsek B: Kaj morate narediti!
                </div>
                <div class="bd-highlight">
                </div>
            </div>
        </div>
    </div>
</div>

    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card schoolareas-card" style="flex: 0 0 60%;">     
                <div class="card-body">
                    
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h5>Kaj morate narediti:</h5>
                            </div>
                            <div class="bd-highlight">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_area_level_do_must_number','B.'.$school_area_level_do_must_number)}}
                            </div>
                            <div class="col-md-9">
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_area_level_do_title','Naslov:')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('school_area_level_do_title','',['class' =>'form-control', 'placeholder'=>'Naslov'])}}
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_area_level_do_must_description','Opis:')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::textarea('school_area_level_do_must_description', '', ['id' => 'description_short-ckeditor', 'class' => 'form-control', 'placeholder' => 'Opis','rows' => 5])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="col-md-4">
            <div class="card schoolareas-card" style="flex: 0 0 60%;">     
                <div class="card-body">
                    <div class="row"> 
                        {{ Form::submit("Shrani", ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor.create( document.querySelector( '#description-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        <script>
        ClassicEditor.create( document.querySelector( '#description_short-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection