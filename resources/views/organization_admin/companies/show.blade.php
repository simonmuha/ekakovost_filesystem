@extends('layouts.organization_admin')
@section ('content')
<style>
    .tab {
        overflow: hidden;
    }

    .tab button {
        background-color: #f2f2f2; 
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px 20px;
        transition: 0.3s;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    .tabcontent {
        display: none;
        padding: 20px;
        border: 1px solid #ccc;
    }
</style>

@if ($school_organization)
    <!-- Add School Admin to School -->
    <div class="modal fade" id="AddSchoolAdminToSchoolModal" tabindex="-1" role="dialog" aria-labelledby="AddSchoolAdminToSchoolModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="{{ action('App\\Http\\Controllers\\OrganizationAdmin\\OrganizationCompanySchoolsController@store_admin_to_school') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <input type="hidden" name="school_organization_id" value="{{ $school_organization->id }}">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <div class="row">
                <div class="col-md-12">
                    <h3>Dodajte zaposlenega za administratorja šole</h3>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="person_id">Zaposleni</label>
                    </div>
                    <div class="col-md-9">
                        <select name="person_id" id="app_side_bar_app_area_id" class="form-control">
                            <option value="" disabled selected>Izberite zaposlenega</option>
                            @foreach($app_organization_people as $app_organization_person)
                                <option value="{{ $app_organization_person->id }}">
                                    {{ $app_organization_person->person_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
            <button type="submit" class="btn btn-primary">Dodaj zaposlenega</button>
        </div>
    </div>
</form>
        </div>
    </div>
@endif


<!-- Main -->
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <div class="row">
                    <div class="col-md-2">
                        <img style="width: 100%;" src="/storage/app/organizations/{{$app_organization->app_organization_image}}">
                    </div>
                    <div class="col-md-10">
                        {{$app_organization->app_organization_name}}
                        @if($app_organization->parent) 
                            (<a href="/organization_admin/companies/{{$app_organization->parent->id}}" title="Prikaži">{{$app_organization->parent->app_organization_name}}</a>)
                        @endif
                    </div>
                </div>
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
                <i class="fa fa-arrow-circle-left fa-lg icon-menu"></i>
            </a>
            <a href="/organization_admin/companies/{{$app_organization->id}}/edit" title="Uredi">
                <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
            </a>
            | 
            <a href="{{ route('home') }}" title="Domov">
                <i class="fa fa-home fa-lg icon-menu"></i>
            </a>
        </div>
    </div>
    <hr>
</div>
<div class="row d-flex align-items-stretch">
    <div class="col-md-8">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Splošni podatki
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/{{$app_organization->id}}/edit" title="Uredi">
                            <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        Polni naziv
                    </div>
                    <div class="col-md-8">
                        {{$app_organization->app_organization_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Kratko ime
                    </div>
                    <div class="col-md-8">
                        {{$app_organization->app_organization_name_short}}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        Naslov
                    </div>
                    <div class="col-md-8">
                        {{$app_organization->app_organization_address}}<br>
                        <b>{{$app_organization->post->app_post_postal_code}}  {{$app_organization->post->app_post_name}}</b>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                footer
            </div>
        </div>
    </div>
    @if($app_organization->app_organization_parent_id == null)
        <div class="col-md-4">
            <div class="card admin-card h-100">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h5>
                            Organizacijske enote
                        </h5>
                        <div>
                            <a href="/organization_admin/companies/create_subcompany/{{$app_organization->id}}">
                                <i class="fa fa-plus fa-lg icon-menu"> </i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (count($app_organization->suborganizations) > 0)
                                @foreach ($app_organization->suborganizations as $app_organization_suborganization)
                                    <a href="/organization_admin/companies/{{$app_organization_suborganization->id}}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img style= "width:100%" src="/storage/app/organizations/{{$app_organization_suborganization->app_organization_image}}">
                                            </div>
                                            <div class="col-md-8">
                                                {{$app_organization_suborganization->app_organization_name}}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                Še ni dodanih organizacijskih enot.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    Število enot: {{ count($app_organization->suborganizations) }}
                </div>
            </div>
        </div>
    @else
        <div class="col-md-4">
            <div class="card admin-card h-100">
            </div>
        </div>
    @endif
</div>
<br>


@if ($app_organization->school)
    <div class="row">
        <div class="col-md-12">
            <div class="card admin-card">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h5>
                            Šola ({{ $app_organization->school->school_organization_name_short }})
                        </h5>
                        <div>
                            <a href="/organization_admin/companies/{{$app_organization->school->id}}/edit" title="Uredi">
                                <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img style="width: 100%;" src="/storage/schools/organizations/{{$app_organization->school->school_organization_image}}">
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    Ime šole:
                                </div>
                                <div class="col-md-8">
                                    {{ $app_organization->school->school_organization_name }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Kratko ime šole:
                                </div>
                                <div class="col-md-8">
                                    {{ $app_organization->school->school_organization_name_short }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Aktivno šolsko leto:
                                </div>
                                <div class="col-md-8">
                                    @if ($app_organization->school->active_year != null)
                                        {{ $app_organization->school->active_year->year->school_year_name }}
                                    @else
                                        Šola nima določenega aktivnega šolskega leta
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @if (count($school_admins) > 0)
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>
                                                    Administratorji
                                                </h5>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#" data-target="#AddSchoolAdminToSchoolModal" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    @foreach ($school_admins as $school_admin)
                                        <div class="col-md-12 mb-12">
                                            <a href="/organization_admin/companies/people/{{$school_admin->id}}">
                                                <div class="btn btn-info btn-block">    

                                                    {{ $school_admin->person_name }}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Šola nima administratorjev.</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    @if ($app_organization->school->active_year != null)
                                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>
                                                Zaposleni (šolsko leto {{ $app_organization->school->active_year->year->school_year_name }})
                                            </h5>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                @if (count($school_organization_active_year_people) > 0) 
                                    <div class="row">
                                        @foreach ($school_organization_active_year_people as $school_organization_active_year_person)
                                            <div class="col-md-3 mb-3">
                                                <a href="/organization_admin/companies/people/{{$school_organization_active_year_person->id}}">
                                                    <div class="btn btn-info btn-block">
                                                        {{ $school_organization_active_year_person->person_name }}
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Šola nima zaposlenih.</p>
                                @endif
                            </div>
                            <div class="col-md-3" style="border-left: 2px solid #000; height: 100%;">
                                

                            </div>
                        </div>
                        @else
                            Šola nima določenega aktivnega šolskega leta.
                        @endif
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12">
            <div class="card admin-card">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h5>
                            Šola 
                        </h5>
                        <div>
                            <a href="/organization_admin/companies/schools/create_school_add_to_company/{{$app_organization->id}}" title="Dodaj administratorja">
                                <i class="fa fa-plus fa-lg icon-menu"> </i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        Organizacija nima šole
                </div>
                <div class="card-footer">
                    <!-- Vaša vsebina -->
                </div>
            </div>
        </div>
    </div>
@endif
<br>




<div class="row">
    <div class="col-md-12">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Zaposleni (organizacija: {{ $app_organization->app_organization_name_short }})
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/create_user_add_to_company/{{$app_organization->id}}">
                            <i class="fa fa-plus fa-lg icon-menu"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($app_organization_people) > 0) 
                    <div class="row">
                        @foreach ($app_organization_people as $app_organization_person)
                            <div class="col-md-3 mb-3">
                                <a href="/organization_admin/companies/people/{{$app_organization_person->id}}">
                                    <div class="btn btn-info btn-block">
                                        {{ $app_organization_person->person_name }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>Organizacija nima zaposlenih.</p>
                @endif
            </div>
            <div class="card-footer">
                Število zaposlenih: {{ count($app_organization->people) }}
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Zaposleni (organizacija: {{ $app_organization->app_organization_name_short }})
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/create_user_add_to_company/{{$app_organization->id}}">
                            <i class="fa fa-plus fa-lg icon-menu"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($app_organization_people)>0) 
                    <div class="card-columns">
                        @if (count($app_positions)>0)
                            @foreach ($app_positions as $app_position)
                                @if (count($app_position->peopleInOrganization($app_organization->id))>0)

                                                        <!-- Add Person to App Position -->
<div class="modal fade" id="AddPersonToAppPosition{{ $app_position->id }}" tabindex="-1" role="dialog" aria-labelledby="AddPersonToAppPosition" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ action('App\\Http\\Controllers\\OrganizationAdmin\\OrganizationCompaniesController@store_person_to_app_position') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="hidden" name="app_position_id" value="{{ $app_position->id }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Dodajte zaposlenega k delovnem mestu</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="app_position_id">Delovno mesto</label>
                            </div>
                            <div class="col-md-9">
                                <label>{{ $app_position->app_position_name }}</label>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="person_id">Zaposleni</label>
                            </div>
                            <div class="col-md-9">
                                <select name="person_id" id="app_side_bar_app_area_id" class="form-control">
                                    <option value="" disabled selected>Izberite zaposlenega</option>
                                    @foreach($app_organization_people as $app_organization_person)
                                        <option value="{{ $app_organization_person->id }}">
                                            {{ $app_organization_person->person_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                    <button type="submit" class="btn btn-primary">Dodaj zaposlenega</button>
                </div>
            </div>
        </form>
    </div>
</div>




                                    <div class="card admin-card h-100">
                                        <div class="card-header admin-card-header">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <h5>
                                                    
                                                    {{ $app_position->app_position_name }}
                                                </h5>
                                                <div>
                                                    <a href="#" data-target="#AddPersonToAppPosition{{ $app_position->id }}" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($app_position->peopleInOrganization($app_organization->id) as $app_organization_person)
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <a href="/organization_admin/companies/people/{{$app_organization_person->id}}">
                                                            {{ $app_organization_person->person_name }} {{ $app_organization_person->person_surname }}
                                                        </a>
                                                    </div>
                                                    <div class="col-md-1 text-right">
                                                        @if (count ($app_organization_person->positions)>1)

                                                            <a href="/organization_admin/companies/remove_position_from_organization/{{ $app_organization_person->id }}/{{ $app_position->id }}"
                                                            title="Zbriši delovno mesto iz organizacije"
                                                            onclick="event.preventDefault(); if(confirm('Ali ste prepričani, da želite izbrisati delovno mesto?')) { document.getElementById('delete-form-{{ $app_organization_person->id }}-{{ $app_position->id }}').submit(); }">
                                                                <i class="fa fa-trash fa-lg icon-menu"></i>
                                                            </a>
                                                            
                                                            <form id="delete-form-{{ $app_organization_person->id }}-{{ $app_position->id }}" action="/organization_admin/companies/remove_position_from_organization/{{ $app_organization_person->id }}/{{ $app_position->id }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="card-footer">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @else
                    Ni urejenih zaposlenih.
                @endif
            </div>
            <div class="card-footer">
                Število zaposlenih: {{ count($app_organization->people) }}
            </div>
        </div>
    </div>
</div>
<br>

@endsection