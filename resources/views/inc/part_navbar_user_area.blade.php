<li class="nav-item {{ Route::is('users*.*') ? 'active' : '' }} dropdown">
    <a class="nav-link dropdown-toggle" href="/users/{{ Auth::user()->id }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if ($blade_user->people->count() > 0)
            @foreach($blade_user->people as $person)
                <div >
                    <img style="width: 20px;" src="/storage/app/organizations/{{$person->organization->app_organization_image}}">
                    {{ $person->organization->app_organization_name_short }}
                </div>
                @if ($person->person_app_areas->count() > 0)
                    @foreach($person->person_app_areas as $person_app_area)
                        <a class="dropdown-item" href="/app/areas/persons/change_person_app_area/{{ $person->id }}/{{ $person_app_area->id }}"
                        style="{{ $person_app_area->app_area_people_active ? 'background-color: #ffff; font-weight: bold' : '' }}">
                            {{ $person_app_area->app_area_name }}
                        </a>
                    @endforeach
                @endif
                <div class="dropdown-divider"></div>

            @endforeach
        @else
            Ni osebnih profilov
        @endif 
        <a class="dropdown-item profil" href="/users/{{ $blade_user->id }}">Moj profil</a>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}">
        <i class="fa fa-sign-out">
            
        </i>
        Odjava
    </a>
</li>