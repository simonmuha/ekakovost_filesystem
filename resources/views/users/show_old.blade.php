@extends('layouts.app_user')
@section ('content')



@if ($person != null)
    <div class="row">
        <div class="col-md12 col-sm-12">
            
        <div class="img-edit">
            <img class="rounded-image" src="/storage/app/organizations/people/{{$person->person_home_image}}">
            <!-- edit icon -->
            <a href="/users/edit_user_home_image/{{ Auth::user()->id }}">
                <i class="fa fa-pencil-square-o fa-2x icon-on-picture"></i>
            </a>
        </div>
        </div>
    </div> 
@endif 
<br>


<div class="row align-items-center">
    <div class="card-group">
        <div class="col-md-2">
            <div class="img-edit">
                <img class="rounded-image" src="/storage/users/{{$user->user_profile_image}}">
                <!-- edit icon -->
                <a href="/users/edit_user_profile_image/{{Auth::user()->id}}">
                    <i class="fa fa-pencil-square-o fa-2x icon-on-picture"></i>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card user-card h-100">
                <div class="card-header user-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h5>
                            Osebni profil
                        </h5>
                        <div>
                        <a href="/persons/{{Auth::user()->user_person_id}}/edit">
                            <i class="fa fa-pencil-square-o fa-2x icon-on-picture" title="Uredi osebne podatke"></i>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                @if ($person != null)
                    <div class="row">
                        <div class="col-md-5">
                            <b>Ime in priimek:</b><br>
                        </div>
                        <div class="col-md-7">
                            {{$person->person_name}} {{$person->person_surname}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <b>Datum rojstva:</b><br>
                        </div>
                        <div class="col-md-7">
                            {{ \Carbon\Carbon::parse($person->person_birth_date)->format('j. n. Y') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <b>GSM:</b><br>
                        </div>
                        <div class="col-md-7">
                            {{$person->person_GSM}} 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <b>Opis:</b><br>
                        </div>
                        <div class="col-md-7">
                            @if ($person->person_description != null)
                                {!!$person->person_description!!}
                            @else
                                Nimate izpolnjenega opisa.
                            @endif
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-5">
                            <b>Spol:</b><br>
                        </div>
                        <div class="col-md-7">
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
            <div class="card user-card h-100">
                <div class="card-header user-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h5>
                            Prijavni podatki
                        </h5>
                    </div>
                    <div>
                        <a href="/users/{{Auth::user()->id}}/edit"><i class="fa fa-pencil-square-o fa-2x icon-on-picture" title="Uredi prijavne podatke"></i></a>
                        @if (Auth::user()->user_status==1)
                            <i class="fa fa-unlock fa-2x" title="Javen profil"></i>
                        @else
                            <i class="fa fa-lock fa-2x" title="Zaseben profil"></i>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <b>Ime:</b><br>
                        </div>
                        <div class="col-md-7">
                            {{Auth::user()->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <b>E-naslov:</b><br>
                        </div>
                        <div class="col-md-7">
                            {{Auth::user()->email}}
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-5">
                            <b>Datum registracije:</b><br>

                        </div>
                        <div class="col-md-7">
                            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d. m. Y')}}
                        </div>
                    </div> 
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="card user-card h-100">
            <div class="card-header user-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Vaši profili
                    </h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($user->people) > 0)
                            <div class="card-columns">
                                @foreach ($user->people as $user_person)
                                    <div class="card user-card h-100">
                                        <img class="card-img-top" src="/storage/app/organizations/people/{{$user_person->person_home_image}}" alt="Card image cap">
                                        <div class="card-header user-card-header">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <h5>
                                                    @if ($user_person->id == $person->id)
                                                        Osebni profil
                                                    @else
                                                        @if ($user_person->school_organization_id != null)
                                                            {{ $user_person->school->school_organization_name_short }}
                                                   
                                                        @endif
                                                    @endif
                                                </h5>
                                                <div>
                                                    <a href="/persons/{{$user_person->id}}/edit">
                                                        <i class="fa fa-pencil-square-o fa-2x icon-on-picture" title="Uredi osebne podatke"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{$user_person->person_name}}  {{$user_person->person_surname}} 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{$user_person->person_email}} 
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <b>Področja aplikacije:</b>
                                                    <br>
                                                    @foreach ($user_person->areas as $area)
                                                        {{ $area->app_area_name }}
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
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
                        @if (count($user_people_areas) > 0)
                            @foreach ($user_people_areas as $profile)
                                <ul>
                                    @foreach ($profile->appAreas as $appArea)
                                        <li>
                                            {{ $appArea->app_area_name }}
                                            @if ($appArea->pivot->app_area_person_active)
                                                (Aktivno)
                                            @else
                                                (Neaktivno)
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>

@endsection