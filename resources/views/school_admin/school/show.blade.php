@extends('layouts.school_admin')
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


<!-- Main -->
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <div class="row">
                    <div class="col-md-2">
                        <img style="width: 100%;" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
                    </div>
                    <div class="col-md-10">
                        {{$school_organization->school_organization_name}}
                        @if($school_organization->parent) 
                            (<a href="/school_admin/school/{{$school_organization->parent->id}}" title="Prikaži">{{$school_organization->parent->school_organization_name}}</a>)
                        @endif
                    </div>
                </div>
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="/school_admin/school/{{$school_organization->id}}/edit" title="Uredi">
                <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
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
                        <a href="/school_admin/school/{{$school_organization->id}}/edit" title="Uredi">
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
                        {{$school_organization->school_organization_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Kratko ime
                    </div>
                    <div class="col-md-8">
                        {{$school_organization->school_organization_name_short}}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        Naslov
                    </div>
                    <div class="col-md-8">
                        {{$school_organization->school_organization_address}}<br>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                footer
            </div>
        </div>
    </div>
    @if($school_organization->school_organization_parent_id == null)
        <div class="col-md-4">
            <div class="card admin-card h-100">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h5>
                            Organizacijske enote
                        </h5>
                        <div>
                            <a href="/school_admin/school/create_subcompany/{{$school_organization->id}}">
                                <i class="fa fa-plus fa-lg icon-menu"> </i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (count($school_organization->suborganizations) > 0)
                                @foreach ($school_organization->suborganizations as $school_organization_suborganization)
                                    <a href="/school_admin/school/{{$school_organization_suborganization->id}}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img style= "width:100%" src="/storage/app/organizations/{{$school_organization_suborganization->school_organization_image}}">
                                            </div>
                                            <div class="col-md-8">
                                                {{$school_organization_suborganization->school_organization_name}}
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
                    Število enot: {{ count($school_organization->suborganizations) }}
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




<div class="row">
    <div class="col-md-12">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Zaposleni - Trenutno v urejenju ({{ $school_organization_year->year->school_year_name }})
                    </h5>
                    <div>
                        <a href="/school_admin/school/add_person_to_school/{{ $school_organization->id }}">
                            <i class="fa fa-plus fa-lg icon-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($school_organization_year_people)>0)
                    <div class="card-columns">
                        @foreach ($school_organization_year_people as $school_organization_year_person)


                                                    <!-- Add App Position to Person -->
                                                    <div class="modal fade" id="AddAppPositionToPerson-{{$school_organization_year_person->id}}" tabindex="-1" role="dialog" aria-labelledby="AddAppPositionToPerson" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="{{ action('App\\Http\\Controllers\\SchoolAdmin\\SchoolOrganizationsController@store_app_position_to_person') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input name="school_organization_year_person_id" type="hidden" value="{{$school_organization_year_person->id}}">
                                                                <input name="school_organization_year_id" type="hidden" value="{{$school_organization_year->id}}">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3>Dodajte delovno mesto zaposlenemu</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class='form-group'>
                                                                            <label>Uporabnik</label>
                                                                            <p>{{ $school_organization_year_person->person->person_name }}</p>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Šolsko leto</label>
                                                                            <p>{{ $school_organization_year->year->school_year_name }}</p>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label for="app_position_id">Delovno mesto</label>
                                                                            <select name="app_position_id" class="form-control">
                                                                                <option value="" disabled selected>Izberite delovno mesto</option>
                                                                                @foreach($school_admin_active_person_subpositions as $position)
                                                                                    <option value="{{ $position->id }}">{{ $position->app_position_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                                                                        <button type="submit" class="btn btn-primary">Dodaj delovno mesto</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>




                            <div class="card admin-card h-100">
                                <div class="card-header admin-card-header">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <h5>
                                            
                                            {{ $school_organization_year_person->person->person_name }}
                                        </h5>
                                        <div>
                                            <a href="#" data-target="#AddAppPositionToPerson-{{$school_organization_year_person->id}}" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    @foreach ($school_organization_year_person->positions as $school_organization_year_person_position)
                                        <div class="row">
                                            <div class="col-md-10">
                                                <a href="/school_admin/school/people/{{$school_organization_year_person_position->id}}">
                                                    {{ $school_organization_year_person_position->app_position->app_position_name }} 
                                                </a>
                                            </div>
                                            <div class="col-md-1 text-right">
                                            @if (count($school_organization_year_person->person->positions) > 1)
                                                <a href="{{ url('/school_admin/school/remove_position_from_person/' . $school_organization_year_person_position->id) }}"
                                                title="Zbriši delovno mesto iz organizacije"
                                                onclick="event.preventDefault(); if(confirm('Ali ste prepričani, da želite izbrisati delovno mesto?')) { document.getElementById('delete-form-{{ $school_organization_year_person_position->id }}').submit(); }">
                                                    <i class="fa fa-trash fa-lg icon-menu"></i>
                                                </a>
                                                <form id="delete-form-{{ $school_organization_year_person_position->id }}" 
                                                    action="{{ url('/school_admin/school/remove_position_from_person/' . $school_organization_year_person_position->id) }}" 
                                                    method="POST" 
                                                    style="display: none;">
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
                        @endforeach
                    </div>
                @else
                    Ni urejenih zaposlenih.
                @endif
            </div>
            <div class="card-footer">
                Število zaposlenih: {{ count($school_organization->people) }}
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
                        Zaposleni ({{ $school_organization_year->year->school_year_name }})
                    </h5>
                    <div>
                        <a href="/school_admin/school/add_person_to_school/{{ $school_organization->id }}">
                            <i class="fa fa-plus fa-lg icon-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($school_organization_people)>0)
                    <div class="card-columns">
                        @if (count($app_positions)>0)
                            @foreach ($app_positions as $app_position)
                                @if (count($app_position->peopleInSchool($school_organization->id, $school_organization_year->id   ))>0)
                                    <div class="card admin-card h-100">
                                        <div class="card-header admin-card-header">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <h5>
                                                    
                                                    {{ $app_position->app_position_name }}
                                                </h5>
                                                <div>
                                                    <a href="#" data-target="#AddAreaToPossitionModal" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($app_position->peopleInschool($school_organization->id, $school_organization_year->id) as $school_organization_person)
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <a href="/school_admin/school/people/{{$school_organization_person->id}}">
                                                            {{ $school_organization_person->person_name }} {{ $school_organization_person->person_surname }}
                                                        </a>
                                                    </div>
                                                    <div class="col-md-1 text-right">
                                                        @if (count ($school_organization_person->positions)>1)

                                                            <a href="/app/organizations/remove_position_from_organization/{{ $school_organization_person->id }}/{{ $app_position->id }}"
                                                            title="Zbriši delovno mesto iz organizacije"
                                                            onclick="event.preventDefault(); if(confirm('Ali ste prepričani, da želite izbrisati delovno mesto?')) { document.getElementById('delete-form-{{ $school_organization_person->id }}-{{ $app_position->id }}').submit(); }">
                                                                <i class="fa fa-trash fa-lg icon-menu"></i>
                                                            </a>
                                                            
                                                            <form id="delete-form-{{ $school_organization_person->id }}-{{ $app_position->id }}" action="/app/organizations/remove_position_from_organization/{{ $school_organization_person->id }}/{{ $app_position->id }}" method="POST" style="display: none;">
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
                Število zaposlenih: {{ count($school_organization->people) }}
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
                        Zaposleni (organizacija: {{ $school_organization->app_organization->app_organization_name }})
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/create_user_add_to_company/33">
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
                Število zaposlenih: {{ count($app_organization_people) }}
            </div>
        </div>
    </div>
</div>


    

@endsection