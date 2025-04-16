@extends('layouts.school')
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
    <div class="col-md-12">
        <div class="card school-card h-100">
            <div class="card-body">
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">
                    <h4>
                        <div class="row">
                            <div class="col-md-2">
                                <img class="rounded-image" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
                            </div>
                            <div class="col-md-10"> 
                                {{$school_organization->school_organization_name}}
                                @if($school_organization->parent) 
                                    ({{$school_organization->parent->school_organization_name}})
                                @endif
                            </div>
                        </div>
                    </h4>
                </div>
                <div class="bd-highlight">
                </div>
            </div>
            </div>
        </div>

    </div>
</div>
<br>
<div class="row d-flex align-items-stretch">
    <div class="col-md-8">
    <div class="card school-card h-100">
            <div class="card-header school-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Aktivna področja šole
                    </h5>
                    <div>
                    </div>
                </div>
            </div>
            <div class="card-body">
            @if (count($school_organization->school_areas) > 0)
                    @foreach($school_organization->school_areas as $index => $school_area)
                        <div class="row">
                            <div class="col-md-4">
                                <a href="/school/areas/{{ $school_area->id }}">
                                    <div class="btn btn-info btn-block">    
                                        {{ $school_area->school_area_name }}
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                @else
                    <p>Trenutno ni nobenih področij šole na voljo.</p>
                @endif
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card school-card h-100">
            <div class="card-header school-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Splošni podatki
                    </h5>
                    <div>
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
            </div>
            <div class="card-footer">
            </div>
        </div>
        
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card school-card h-100">
            <div class="card-header school-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Zaposleni ({{ $school_year->year->school_year_name }})
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/create_user_add_to_company/{{$school_organization->id}}">
                            <i class="fa fa-plus fa-lg icon-menu"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($school_organization_people)>0)
                    <div class="card-columns">
                        @if (count($app_positions)>0)
                            @foreach ($app_positions as $app_position)
                                @if (count($app_position->peopleInSchool($school_organization->id, $school_year->id   ))>0)
                                    <div class="card school-card h-100">
                                        <div class="card-header school-card-header">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <h5>
                                                    
                                                    {{ $app_position->app_position_name }}
                                                </h5>
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($app_position->peopleInschool($school_organization->id, $school_year->id) as $school_organization_person)
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        {{ $school_organization_person->person_name }} {{ $school_organization_person->person_surname }}
                                                    </div>
                                                    <div class="col-md-1 text-right">
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



    

@endsection