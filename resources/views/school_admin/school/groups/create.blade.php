@extends('layouts.school_admin')
@section('styles')
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<!-- Include Select2 CSS -->
@endsection

@section ('content')

    <div class="row">
        <div class="d-flex align-items-center justify-content-between bd-highlight" >
            <div class="bd-highlight">
                <h4>Dodaj skupino k šoli: {{ $school_organization->school_organization_name }}</h4>
            </div>
            <div class="bd-highlight">
                <a href="{{ url()->previous() }}" title="Nazaj">
                    <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                    | 
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </a>
            </div>
            <input name="school_organization_parent_id" type="hidden" value="null"> 
        </div>
        <hr>
    </div>
    {!! Form::open(['action' => 'App\Http\Controllers\SchoolAdmin\SchoolGroupsController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
    <input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
    <div class="row">
        <div class="col-md-12">
            <small>Kreirajte novo skupino na šoli.</small>
        </div>
    </div>
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
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_group_name','Ime skupine:')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('school_group_name','',['class' =>'form-control', 'placeholder'=>'Ime'])}}
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_group_description','Opis')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::textarea('school_group_description', '', ['id' => 'school_group_description-ckeditor', 'class' => 'form-control', 'placeholder' => 'Opis','rows' => 3])}}
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('person_id', 'Vodja skupine') }}
                            </div>
                            <div class="col-md-9">
                                {!! Form::select('person_id', $school_users, null, ['class' => 'form-control', 'id' => 'person_id', 'placeholder' => 'Izberite vodjo skupine']) !!}
                            </div>
                        </div>
                    </div>
                    
                    <div class='form-group'> 
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_group_image','Izberite sliko')}}
                                <br>
                                <small>Priporočljiva velikost slike je: 600x360 pt.</small>
                            </div>
                            <div class="col-md-9">
                                {!! Form::file('school_group_image') !!}
                                <div>
                                    <a href="https://www.canva.com/design/DAFxHrY_E4k/GVdvy5MHaLS8LQRDk33dYg/edit" title="Canva" target="_blank">Canva - Slika - 600x360</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class='form-group'> 
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_group_home_image','Izberite naslovno sliko')}}
                                <br>
                                <small>Priporočljiva velikost slike je: 1400x400 pt.</small>
                            </div>
                            <div class="col-md-9">
                                {!! Form::file('school_group_home_image') !!}
                                <div>
                                    <a href="https://www.canva.com/design/DAGMNuzhRxs/6c2eTI-XDLTcbl9g0MLmsA/edit" title="Canva" target="_blank">Canva - Slika - 1400x400</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-right">
                {{ Form::submit('Kreiraj skupino', ['class' => 'btn btn-primary']) }}
            </div>
            {!! Form::close() !!}
            
        </div>
    </div>
    

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#person_id').select2({
            placeholder: 'Izberite vodjo skupine',
            allowClear: true,
            width: '100%'
        });
    });
</script>


<script>
        ClassicEditor.create( document.querySelector( '#school_group_description-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#user_id').select2({
            placeholder: 'Izberite obstoječega uporabnika',
            allowClear: true,
            width: '100%'
        });
    });
    <!-- Include Select2 JS -->
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#person_id').select2({
            placeholder: 'Izberite obstoječega uporabnika organizacije',
            allowClear: true,
            width: '100%'
        });
    });
</script>
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#user_id').select2({
            placeholder: 'Izberite obstoječega uporabnika',
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endsection