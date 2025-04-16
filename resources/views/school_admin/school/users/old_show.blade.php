@extends('layouts.school_admin')
@section ('content')



@if ($person != null)
    <div class="row">
        <div class="col-md12 col-sm-12">
            
            <div class="img-edit">
                <img style= "width:100%" src="/storage/users/{{$person->person_home_image}}">
                <!-- edit icon -->
                <a href="/users/edit_user_home_image/{{ $person->id }}"><i class="fa fa-pencil-square-o fa-2x icon-on-picture" ></i></a>
            </div>
        </div>
    </div>
@endif
<br>
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>Profil</h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ route('home') }}" title="Domov">
                <i class="fa fa-home fa-lg icon-menu"> </i>
            </a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card"> 
            <div class="row">
                <div class="col-md12 col-sm-12">
                        <div class="img-edit">
                            <img style= "width:100%" src="/storage/users/{{$person->user->user_profile_image}}">
                            <!-- edit icon -->
                            <a href="/users/edit_user_profile_image/{{$person->id}}"><i class="fa fa-pencil-square-o fa-2x icon-on-picture"></i></a>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                </div>
            </div>
        </div>
        <br>
        
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-10">
                <h4>
                    <b>
                        Prijavni podatki
                    </b>
                </h4>
            </div>
            <div class="col-md-1">
                <a href="/school/users/{{$person->id}}/edit"><i class="fa fa-pencil-square-o fa-2x icon-on-picture" title="Uredi prijavne podatke"></i></a>
            </div>
            <div class="col-md-1">
                @if ($person->user->user_status==1)
                    <i class="fa fa-unlock fa-2x" title="Javen profil"></i>
                @else
                    <i class="fa fa-lock fa-2x" title="Zaseben profil"></i>
                @endif
            </div>
        </div>  
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <b>Ime:</b><br>
            </div>
            <div class="col-md-4">
                {{$person->person_name}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <b>E-naslov:</b><br>
            </div>
            <div class="col-md-4">
                {{$person->person_email}}
            </div>
        </div> 
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <b>Datum registracije:</b><br>

            </div>
            <div class="col-md-4">
                {{ \Carbon\Carbon::parse($person->user->created_at)->format('d. m. Y')}}
            </div>
        </div> 
        <hr>
        <div class="row">

        </div>  
        <div class="row">
            <div class="col-md-10">
                <h4>
                    <b>
                        Osebni profil
                    </b>
                </h4>
            </div>
            <div class="col-md-1">
                <a href="/persons/{{$person->id}}/edit">
                    <i class="fa fa-pencil-square-o fa-2x icon-on-picture" title="Uredi osebne podatke"></i>
                </a>
            </div>
        </div>  

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
</div>
<hr>

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
                        @foreach ($user_people_areas as $profile)
                            <ul>
                                @foreach ($person->positions as $person_position)
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
<br>

@endsection