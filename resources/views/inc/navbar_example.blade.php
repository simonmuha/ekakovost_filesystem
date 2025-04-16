<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }} dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSchool" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-university"></i> Šola
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownSchool">
                        @foreach(Auth::user()->person->person_organizations->sortByDesc('active')->unique('school_organization_id')->sortby('school_organization_id') as $person_organization)
                            <a class="dropdown-item {{ $person_organization->active ? 'font-weight-bold' : '' }}" href="/school/organizations/persons/change_person_active_organization/{{ $person_organization->id}}" style="background-color: #ffff;">
                                {{ $person_organization->school_organization->school_organization_name }}
                            </a>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        @foreach(Auth::user()->person->person_school_organizations() as $person_school_organization)
                            <a class="dropdown-item {{ $person_school_organization->active ? 'font-weight-bold' : '' }}" href="/school/organizations/persons/change_person_active_organization/{{ $person_school_organization->id}}" style="background-color: #ffff;">
                                {{ $person_school_organization->school_organization_year->year->school_year_name }}
                            </a>
                        @endforeach
                    </ul>
                </li>
                @if (Auth::user()->person->app_areas->count() > 1)
                    <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }} dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                            @foreach(Auth::user()->person->app_areas->sortByDesc('app_area_people_active') as $person_app_area)
                                <a class="dropdown-item {{ $person_app_area->app_area_people_active ? 'font-weight-bold' : '' }}" href="/app/areas/persons/change_person_app_area/{{ $person_app_area->id}}" style="background-color: #ffff;">
                                    {{ $person_app_area->app_area->app_area_name }}
                                </a>
                            @endforeach 
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">Moj profil</a>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/users/{{ Auth::user()->id }}">
                            <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
