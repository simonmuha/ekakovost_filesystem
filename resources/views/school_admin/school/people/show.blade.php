@extends('layouts.school_admin_master')
@section ('content')



@if ($person != null)
    <div class="row">
        <div class="col-md12 col-sm-12">
            <div class="img-edit">
                <img style= "width:100%" src="/storage/users/{{$person->person_home_image}}">
            </div>
        </div>
    </div>
@endif
<br>
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                Profil organizacije {{ $person->organization->app_organization_name }}
            </h4> 
        </div>
        <div class="bd-highlight">
            <h4>
                <a href="{{ route('home') }}" title="Domov">
                    <i class="fa fa-home fa-lg icon-menu"> </i>
                </a>
            </h4>
        </div>
    </div>
    <hr>
</div>
<div class="row d-flex align-items-stretch">
    <div class="col-md-3">
        <div class="card admin-card h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md12 col-sm-12">
                            <div class="img-edit">
                                <img style= "width:100%" src="/storage/users/{{$person->user->user_profile_image}}">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex align-items-center justify-content-between bd-highlight" >
                    <div class="bd-highlight">
                        <h4>
                            Profil 
                        </h4>
                    </div>
                    <div class="bd-highlight">
                        <a href="/persons/{{$person->id}}/edit">
                            <i class="fa fa-pencil-square-o fa-2x icon-on-picture" title="Uredi osebne podatke"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                @if ($person != null)
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <b>Ime in priimek:</b><br>
                        </div>
                        <div class="col-md-4">
                            {{$person->person_name}} {{$person->person_surname}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <b>Datum rojstva:</b><br>
                        </div>
                        <div class="col-md-4">
                            {{ \Carbon\Carbon::parse($person->person_birth_date)->format('j. n. Y') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <b>GSM:</b><br>
                        </div>
                        <div class="col-md-4">
                            {{$person->person_GSM}} 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <b>Opis:</b><br>
                        </div>
                        <div class="col-md-4">
                            @if ($person->person_description != null)
                                {!!$person->person_description!!}
                            @else
                                Nimate izpolnjenega opisa.
                            @endif
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <b>Spol:</b><br>
                        </div>
                        <div class="col-md-4">
                            @if ($person->person_gender == "male")
                                Moški
                            @else
                                Ženski
                            @endif
                        </div>
                    </div>  
                @else
                    Nimate še ustvarjenega osebnega profila.
                    <div style="display: flex; justify-content: flex-end">
                        <a class="btn btn-danger" href="/persons/create">Ustvari svoj osebni profil</a>
                    </div>

                @endif
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card admin-card h-100">
        <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Prijavni podatki
                        
                    </h5>
                    <div>
                        <a href="/school_admin/school/users/{{$person->id}}/edit" title="Uredi">
                            <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>Uredi
                        </a>
                        <a href="/school_admin/school/users/{{$person->id}}/pdf_user_login" title="Prenesi prijavne podatke">
                            <i class="fa fa-file-pdf-o fa-lg icon-menu"></i>pdf
                        </a>
                        <a href="/school_admin/school/users/{{$person->id}}/mail_user_login" title="Uredi">
                            <i class="fa fa-envelope-o fa-lg icon-menu"></i>mail
                        </a> 
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <b>Ime:</b><br>
                    </div>
                    <div class="col-md-7">
                        {{$person->person_name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <b>E-naslov:</b><br>
                    </div>
                    <div class="col-md-7">
                        {{$person->person_email}}
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <b>Datum registracije:</b><br>

                    </div>
                    <div class="col-md-7">
                        {{ \Carbon\Carbon::parse($person->user->created_at)->format('d. m. Y')}}
                    </div>
                </div> 
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>
<br>
<div class="row d-flex align-items-stretch">
    <div class="card user-card h-100">
        <div class="card-header user-card-header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h5>
                    Področja
                </h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if (count($person->positions) > 0)
                        <ul>
                            @foreach ($person->positions as $person_position)
                                <li>
                                    {{ $person_position->app_position_name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
<br>

@endsection