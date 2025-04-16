@extends('layouts.organization_admin')
@section('styles')
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section ('content')


{!! Form::open(['action' => 'App\Http\Controllers\OrganizationAdmin\OrganizationCompaniesController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
@if ($app_organization == null)
    <div class="row">
        <div class="d-flex align-items-center justify-content-between bd-highlight" >
            <div class="bd-highlight">
                <h4>Dodaj organizacijo</h4>
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
@else
    <div class="row">
        <div class="d-flex align-items-center justify-content-between bd-highlight" >
            <div class="bd-highlight">
                <h4>Dodaj organizacijsko enoto k organizaciji: {{$app_organization->app_organization_name}}</h4>
            </div>
            <div class="bd-highlight">
                <a href="{{ url()->previous() }}" title="Nazaj">
                    <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                    | 
                    <a href="/app/organizations" title="Organizacije"><i class="fa fa-building fa-lg icon-menu"> </i></a>
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </a>
            </div>
            <input name="app_organization_parent_id" type="hidden" value="{{$app_organization->id}}"> 
        </div>
        <hr>
    </div>

@endif
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
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('app_organization_name','Ime organizacije')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('app_organization_name','',['class' =>'form-control', 'placeholder'=>'Ime'])}}
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('app_organization_name_short','Kratko ime')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('app_organization_name_short','',['class' =>'form-control', 'placeholder'=>'Kratko ime'])}}
                            </div>
                        </div>
                    </div>
                    
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('app_organization_address','Naslov')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('app_organization_address','',['class' =>'form-control', 'placeholder'=>'Naslov'])}}
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('app_post_id', 'Pošta') }}
                            </div>
                            <div class="col-md-9">
                                {!! Form::select('app_post_id', $app_posts, null, ['class' => 'form-control', 'id' => 'app_post_id', 'placeholder' => 'Izberite pošto']) !!}
                            </div>
                        </div>
                    </div>
                    <div class='form-group'> 
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('app_organization_image','Izberite sliko')}}
                                <br>
                                <small>Priporočljiva velikost slike je: 600x360 pt.</small>
                            </div>
                            <div class="col-md-9">
                                {!! Form::file('app_organization_image') !!}
                                <div>
                                    <a href="https://www.canva.com/design/DAFxHrY_E4k/GVdvy5MHaLS8LQRDk33dYg/edit" title="Canva" target="_blank">Canva - Slika - 600x360</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{Form::submit('Shrani organizacijo', ['class' =>'btn btn-primary' ])}}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#app_post_id').select2({
            placeholder: 'Izberite pošto',
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endsection