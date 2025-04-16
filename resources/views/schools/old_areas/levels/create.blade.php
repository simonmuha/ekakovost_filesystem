@extends('layouts.app_schoolareas')
@section ('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 

{!! Form::open(['action' => 'App\Http\Controllers\School\SchoolAreaLevelsController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
<input type="hidden" name="school_area_level_number" value="{{ $school_area_level_max }}">
<input type="hidden" name="school_area_id" value="{{ $school_area->id }}">
<div class="card schoolareas-card" style="flex: 0 0 60%;">     
    <div class="card-body">
        <div class="row"> 
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">
                    <h4>Področje šole: {{$school_area->school_area_name}}</h4>
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
                                <h4>Nivo: {{ $school_area_level_max }}.</h4>
                            </div>
                            <div class="bd-highlight">
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_area_level_name','Ime nivoja')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('school_area_level_name','',['class' =>'form-control', 'placeholder'=>'Ime'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4>Na {{ $school_area_level_max }}. nivoju je področje {{ $school_area->school_area_name }}:</h4>
                            </div>
                            <div class="bd-highlight">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                {{Form::textarea('school_area_level_description', '', ['id' => 'description-ckeditor', 'class' => 'form-control', 'placeholder' => 'Kratko opišete kaj je prvi nivo področja.','rows' => 5])}}
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4>Na {{ $school_area_level_max }}. nivoju boste morali.:</h4>
                            </div>
                            <div class="bd-highlight">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                {{Form::textarea('school_area_level_do', '', ['id' => 'do-ckeditor', 'class' => 'form-control', 'placeholder' => 'Opišete kaj boste na tem nivoju naredili. Kaj bo rezultat tega nivoja.','rows' => 5])}}
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
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4>Naloži sliko</h4>
                            </div>
                            <div class="bd-highlight">
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::file('school_area_level_image') !!}
                            </div>
                            <div class="col-md-12">
                                <small>Priporočljiva velikost slike je: 600x600 pt.</small><br>
                                <a href="https://www.canva.com/design/DAFxHrY_E4k/GVdvy5MHaLS8LQRDk33dYg/edit" title="Canva" target="_blank">Canva - Slika - 600x360</a>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
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
            <div class="row">
                <div class="col-md-12">
                    
                    
                    

                    
                </div>
            </div>
            
            <br>
            {{ Form::submit("Shrani nivo {$school_area_level_max}.", ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
            
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
        ClassicEditor.create( document.querySelector( '#do-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection