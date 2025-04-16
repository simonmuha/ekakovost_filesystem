@extends('layouts.organization_admin')
@section('styles')
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section ('content')



    <div class="row">
        <div class="d-flex align-items-center justify-content-between bd-highlight" >
            <div class="bd-highlight">
                <h4>Dodaj administratorja k šoli: {{ $school_organization->school_organization_name }}</h4>
            </div>
            <div class="bd-highlight">
                <a href="{{ url()->previous() }}" title="Nazaj">
                    <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                    | 
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </a>
            </div>
            <input name="app_organization_parent_id" type="hidden" value="null"> 
        </div>
        <hr> 
    </div> 
    {!! Form::open(['action' => 'App\Http\Controllers\OrganizationAdmin\OrganizationCompanySchoolsController@store_admin_to_school', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
    <input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
    <div class="row">
        <div class="col-md-12">
            <small>Izbranemu uporabniku dodajte funkcijo administratorja šole.</small>
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
                                {{ Form::label('person_id', 'Obstoječi uporabnik') }}
                            </div>
                            <div class="col-md-9">
                                {!! Form::select('person_id', $app_organization_users, null, ['class' => 'form-control', 'id' => 'person_id', 'placeholder' => 'Izberite obstoječega uporabnika organizacije']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-right">
                {{ Form::submit('Dodaj administratorja', ['class' => 'btn btn-primary']) }}
            </div>
            {!! Form::close() !!}
            
        </div>
    </div>
    

@endsection
@section('scripts')
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