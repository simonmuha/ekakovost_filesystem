@extends('layouts.organization_admin')
@section('styles')
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section ('content')
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight">
        <div class="bd-highlight">
            <h4>Dodaj novega uporabnika k organizaciji: {{ $app_organization->app_organization_name }}</h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
                <i class="fa fa-arrow-circle-left fa-lg icon-menu"></i>
                |
                <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"></i></a>
            </a>
        </div>
        <input name="app_organization_parent_id" type="hidden" value="null">
    </div>
    <hr>
</div>

<form action="{{ action('App\\Http\\Controllers\\OrganizationAdmin\\OrganizationCompaniesController@store_user_add_to_company') }}" method="POST" enctype="multipart/form-data">
    <input name="app_organization_id" type="hidden" value="{{$app_organization->id}}">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <small>Kreirajte novega uporabnika in ga dodajte k organizaciji.</small>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class='form-group'>
                <div class="row">
                    <div class="col-md-3">
                        <label for="app_position_id">Delovno mesto</label>
                    </div>
                    <div class="col-md-9">
                        <select name="app_position_id" class="form-control" id="app_position_id">
                            <option value="" disabled selected>Izberite delovno mesto</option>
                            @foreach($app_positions as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    @if($app_organization->app_organization_parent_id == null)
        <div class="row">
            <div class="col-md-12">
                <small>Kreirajte novega uporabnika organizacije in ga dodajte k organizaciji.</small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class='form-group'>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name">Ime</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="Ime">
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="email">E-naslov</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" placeholder="e-naslov">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <small>Izberite obstoječega uporabnika organizacije in ga dodajte k organizaciji.</small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class='form-group'>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="person_id">Obstoječi uporabnik</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="person_id" class="form-control" id="person_id">
                                        <option value="" disabled selected>Izberite obstoječega uporabnika organizacije</option>
                                        @foreach($app_organization_users as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <br>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Kreiraj uporabnika in ga dodaj k organizaciji</button>
    </div>
</form>
@endsection
@section('scripts')
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#app_position_id, #person_id').select2({
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endsection
