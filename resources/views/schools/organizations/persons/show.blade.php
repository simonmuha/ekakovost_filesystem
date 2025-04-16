@extends('layouts.app_quality')
@section ('content')


<!-- Add Role To Person in Organization -->
<div class="modal fade" id="AddRoleToPersonInOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="AddEducationalProgramToOrganizationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\School\SchoolOrganizationPersonsController@add_role_to_person_in_organization', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="person_id" type="hidden" value="{{$school_organization_person->person->id}}"> 
        <input name="school_organization_id" type="hidden" value="{{$school_organization_person->school_organization_id}}"> 
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodaj vlogo osebi</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{$school_organization_person->person->person_name}} {{$school_organization_person->person->person_surname}}
                        </div>
                        <div class="col-md-9">
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('role_id','Vloga')}}
                        </div>
                        <div class="col-md-9"> 
                        </div>
                    </div>
                </div> 
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                    {{Form::submit('Dodaj vlogo', ['class' =>'btn btn-primary' ])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
 </div>

<!-- Main -->
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                {{$school_organization_person->person->person_name}} {{$school_organization_person->person->person_surname}}
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
                <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                <a href="/schools/organizations/persons/{{$school_organization_person->id}}/edit" title="Uredi"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                | 
                <a href="/schools/organizations/persons" title="Zaposleni na šoli"><i class="fa fa-users fa-lg icon-menu"> </i></a>
                <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
            </a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-3 text-center">
        Šola:
    </div>
    <div class="col-md-9">
        <a href="/schools/organizations/{{$school_organization_person->school_organization->id}}" title="Prikaži">
            <div class="row d-flex align-items-center">
                <div class="col-md-2">
                    <img style= "width:100%" src="/storage/schools/organizations/{{$school_organization_person->school_organization->school_organization_image}}">
                </div>
                <div class="col-md-9">
                    {{$school_organization_person->school_organization->school_organization_name}}
                    @if ($school_organization_person->school_organization->school_organization_parent_id != null)
                        ({{$school_organization_person->school_organization->parent->school_organization_name}})
                    @endif
                </div>
            </div>
        </a>
        
    </div>
    
</div>

<hr>

<div class="row">
    <div class="col-md-3 text-center">
        Vloge:
    </div>
    <div class="col-md-7">
Candy Color No Elasticity Women's Thigh-high Silk Stockings Sexy Transparent Lingerie Ultra-thin Long Socks For Garter Belt        
    </div>
    <div class="col-md-2">
        
        <a href="#" data-target="#AddRoleToPersonInOrganizationModal" title="Dodaj vlogo osebi" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
    </div>
</div>

<hr>



@endsection