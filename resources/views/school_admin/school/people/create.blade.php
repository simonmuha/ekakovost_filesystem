@extends('layouts.school_admin_master')
@section('styles')
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section ('content') 

 
<div class="row"> 
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>Dodaj novega uporabnika k šoli: {{ $school_organization->school_organization_name }}</h4>
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
<form action="{{ action('App\\Http\\Controllers\\SchoolAdmin\\SchoolOrganizationsController@store_person_to_school') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input name="school_organization_year_id" type="hidden" value="{{ $school_organization_year->id }}">
    
    <div class="row">
        <div class="col-md-12">
            <div class='form-group'>
                <div class="row">
                    <div class="col-md-3">
                        <label for="app_position_id">Delovno mesto</label>
                    </div>
                    <div class="col-md-9">
                        <select name="app_position_id" id="app_position_id" class="form-control">
                            <option value="">Izberite delovno mesto</option>
                            @foreach($school_admin_active_person_subpositions as $position)
                                <option value="{{ $position->id }}">{{ $position->app_position_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class='form-group'>
                <div class="row">
                    <div class="col-md-3">
                        <label for="school_year_id">Šolsko leto</label>
                    </div>
                    <div class="col-md-9">
                        {{ $school_organization_year->year->school_year_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class='form-group'>
                <div class="row">
                    <div class="col-md-3">
                        <label for="person_id">Obstoječi uporabnik</label>
                    </div>
                    <div class="col-md-9">
                        <select name="person_id" id="person_id" class="form-control">
                            <option value="">Izberite obstoječega uporabnika organizacije</option>
                            @foreach($app_organization_users as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Dodaj uporabnika k šoli</button>
    </div>
</form>

@endsection
@section('scripts')

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#app_position_id').select2({
            placeholder: 'Izberite delovno mesto',
            allowClear: true,
            width: '100%'
        });
    });
    <!-- Include Select2 JS -->
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