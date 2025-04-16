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
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <div class="row">
                    <div class="col-md-2">
                        <img style="width: 100%;" src="/storage/app/organizations/{{$person->person_image}}">
                    </div>
                    <div class="col-md-10">
                        {{$person->person_name}}
                        @if($person->parent) 
                            (<a href="/organization_admin/companies/users/{{$person->parent->id}}" title="Prikaži">{{$person->parent->person_name}}</a>)
                        @endif
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
                        {{ \Carbon\Carbon::parse($person->person_employment_start_date)->format('d. m. Y') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Konec zaposlitve:
                    </div>
                    <div class="col-md-8">
                        {{ \Carbon\Carbon::parse($person->person_employment_end_date)->format('d. m. Y') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Zadnja sprememba:
                    </div>
                    <div class="col-md-8">
                        {{ \Carbon\Carbon::parse($person->updated_at)->format('d. m. Y') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        Datum kreiranja:
                    </div>
                    <div class="col-md-8">
                        {{ \Carbon\Carbon::parse($person->created_at)->format('d. m. Y') }}
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
                        <a href="/organization_admin/companies/users/{{$person->id}}/pdf_user_login" title="Uredi">
                            <i class="fa fa-file-pdf-o fa-lg icon-menu"></i>
                        </a>
                        <a href="/organization_admin/companies/users/{{$person->id}}/email" title="Uredi">
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
                        <button class="btn organization_admin-btn">Resetiraj geslo</button>
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
                        Profil
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/users/create_admin_add_to_company/{{$person->id}}" title="Dodaj administratorja">
                            <i class="fa fa-plus fa-lg icon-menu"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
            </div>
            <div class="card-footer">
                <!-- Vaša vsebina -->
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
                        Uporabniki
                    </h5>
                    <div>
                        <a href="/organization_admin/companies/users/create_user_add_to_company/{{ $person->id }}" title="Dodaj administratorja">
                            <i class="fa fa-plus fa-lg icon-menu"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
            </div>
            <div class="card-footer">
                <!-- Vaša vsebina -->
            </div>
        </div>
    </div>
</div>
<br>


    

@endsection