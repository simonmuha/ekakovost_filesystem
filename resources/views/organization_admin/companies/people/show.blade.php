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





<!-- Main -->
<div class="row">
    <div class="col-md-12">
        <img style="width: 100%;" src="/storage/app/organizations/people/{{$person->person_home_image}}">
    </div>
</div>
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img style="width: 100%;" src="/storage/users/{{$person->user->user_profile_image}}">
                    </div>
                    <div class="col-md-10 d-flex align-items-center">
                        <span>
                            {{$person->person_name}} {{$person->person_surname}}
                            @if($person->parent) 
                                (<a href="/organization_admin/companies/users/{{$person->parent->id}}" title="Prikaži">{{$person->parent->person_name}}</a>)
                            @endif
                        </span>
                    </div>
                </div>
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
                <i class="fa fa-arrow-circle-left fa-lg icon-menu"></i>
            </a>
            <a href="/organization_admin/companies/users/{{$person->id}}/edit" title="Uredi">
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
    <div class="col-md-7">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Osebni profil ({{$person->organization->app_organization_name}})
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/users/{{$person->id}}/edit" title="Uredi">
                            <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{$person->person_description}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Ime:
                    </div>
                    <div class="col-md-8">
                        {{$person->person_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Priimek:
                    </div>
                    <div class="col-md-8">
                    {{$person->person_surname}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        E-naslov:
                    </div>
                    <div class="col-md-8">
                        {{$person->person_email	}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        GSM:
                    </div>
                    <div class="col-md-8">
                        {{$person->person_GSM}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Začetek zaposlitve:
                    </div>
                    <div class="col-md-8">
                        @if ($person->person_employment_start_date != null)
                            {{ \Carbon\Carbon::parse($person->person_employment_start_date)->format('d. m. Y') }}
                        @else
                            Datum ni določen
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Konec zaposlitve:
                    </div>
                    <div class="col-md-8">
                        @if ($person->person_employment_end_date != null)
                            {{ \Carbon\Carbon::parse($person->person_employment_end_date)->format('d. m. Y') }}
                        @else
                            Datum ni določen
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Zadnja sprememba:
                    </div>
                    <div class="col-md-8">
                        @if ($person->updated_at != null)
                            {{ \Carbon\Carbon::parse($person->updated_at)->format('d. m. Y') }}
                        @else
                            Datum ni določen
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Datum kreiranja:
                    </div>
                    <div class="col-md-8">
                        @if ($person->created_at != null)
                            {{ \Carbon\Carbon::parse($person->created_at)->format('d. m. Y') }}
                        @else
                            Datum ni določen
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Prijavni podatki
                        
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/users/{{$person->id}}/edit" title="Uredi">
                            <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
                        </a>
                        <a href="/organization_admin/companies/users/{{$person->id}}/pdf_user_login" title="Prenesi prijavne podatke">
                            <i class="fa fa-file-pdf-o fa-lg icon-menu"></i>
                        </a>
                        <a href="/organization_admin/companies/users/{{$person->id}}/mail_user_login" title="Uredi">
                            <i class="fa fa-envelope-o fa-lg icon-menu"></i>
                        </a> 
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        Ime:
                    </div>
                    <div class="col-md-8">
                        {{$person->user->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Uporabniško ime:
                    </div>
                    <div class="col-md-8">
                        {{$person->user->username}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Geslo:
                    </div>
                    <div class="col-md-8">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        E-naslov:
                    </div>
                    <div class="col-md-8">
                        {{$person->user->email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Zadnja sprememba:
                    </div>
                    <div class="col-md-8">
                        {{ \Carbon\Carbon::parse($person->user->updated_at)->format('d. m. Y') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Datum kreiranja:
                    </div>
                    <div class="col-md-8">
                        {{ \Carbon\Carbon::parse($person->user->created_at)->format('d. m. Y') }}
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <a href="/organization_admin/companies/users/reset_password/{{ $person->user->id }}" class="btn btn-primary">
                            Ponastavi geslo
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                footer
            </div>
        </div>
    </div>
    
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <div class="card admin-card">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Vsi profili v organizaciji
                    </h5>
                    <div>
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($app_organization_people)>0)
                    <div class="card-columns">
                        @foreach ($app_organization_people as $user_person)

                                            <!-- Modal Add Position To Person  -->
                                            <div class="modal fade" id="AddPositionToPersonModal{{ $user_person->id }}" tabindex="-1" role="dialog" aria-labelledby="AddPositionToPersonModal" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <form action="{{ action('App\Http\Controllers\OrganizationAdmin\OrganizationCompanyPeopleController@add_position_to_person') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                                    <input name="person_id" type="hidden" value="{{ $user_person->id }}">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h3>
                                                                        Dodajte delovno mesto osebi:<br>
                                                                        {{ $user_person->person_name }} 
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body" >
                                                            <div class='form-group'>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label for="organization_id">Organizacija:</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <span>{{ $user_person->organization->app_organization_name }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class='form-group'>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label for="person_id">Delovno mesto:</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                    <select name="app_position_id" id="app_position_id" class="form-control">
                                                                            <option value="" disabled selected>Izberite delovn omesto</option>
                                                                            @foreach($organization_admin_person_subpositions as $person_subposition)
                                                                                <option value="{{ $person_subposition->id }}">
                                                                                    {{ $person_subposition->app_position_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                                                            <button type="submit" class="btn btn-primary">Dodaj delovno mesto</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card admin-card h-100">
                                        <div class="card-header admin-card-header">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <h5>
                                                    {{ $user_person->organization->app_organization_name }}
                                                </h5>
                                                <div>
                                                    <a href="#" data-target="#AddPositionToPersonModal{{ $user_person->id }}" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @if (count($user_person->positions)>0)
                                                @foreach ($user_person->positions as $user_person_position)
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <a href="/app/positions/{{$user_person_position->id}}" title="Prikaži">
                                                            {{ $user_person_position->app_position_name }}
                                                        </a>
                                                    </div>
                                                    <div class="col-md-1 text-right">
                                                        <a href="/organization_admin/companies/people/remove_position_from_person/{{ $user_person->id }}/{{$user_person_position->id}}"
                                                        title="Zbriši delovno mesto"
                                                        onclick="event.preventDefault(); if(confirm('Ali ste prepričani, da želite izbrisati to podrejeno delovno mesto?')) { document.getElementById('delete-form-{{ $user_person->id }}-{{$user_person_position->id}}').submit(); }">
                                                            <i class="fa fa-trash fa-lg icon-menu"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $user_person->id }}-{{$user_person_position->id}}" action="/organization_admin/companies/people/remove_position_from_person/{{ $user_person->id }}/{{$user_person_position->id}}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                                    
                                                @endforeach
                                            @else
                                                Ni delovnih mest.
                                            @endif
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                @else
                    Ni urejenih profilov.
                @endif
            </div>
            <div class="card-footer">
                <!-- Vaša vsebina -->
            </div>
        </div>
    </div>
</div>



    

@endsection