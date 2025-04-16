<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- Font Awesome JS -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<style>
  @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    .navbar-icon-top .navbar-nav .nav-link > .fa {
      position: relative;
      width: 36px;
      font-size: 24px;
    }
    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
      font-size: 0.75rem;
      position: absolute;
      right: 0;
      font-family: sans-serif;
    }
    .navbar-icon-top .navbar-nav .nav-link > .fa {
      top: 3px;
      line-height: 12px;
    }
    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
      top: -10px;
    }
    @media (min-width: 576px) {
      .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }
      .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }
      .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }
    @media (min-width: 768px) {
      .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }
      .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }
      .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }
    @media (min-width: 992px) {
      .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }
      .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }
      .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }
    @media (min-width: 1200px) {
      .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }
      .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }
      .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }
    body { 
        padding-top: 65px; 
    }
    .navbar-brand {
      height: 50px;
      width: 50px;
    }
    .nav-item:active,
    .active {
      color: black !important;
      background-color: grey !important;
      border-color: red !important;
    }
</style>               
</head>
<body>


  
  <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <img class="navbar-brand"" src="/storage/app/logo1.png"> 
    @school
      <img class="navbar-brand"" src="/storage/LogoERS.png">
    @endschool
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
      @appadmin
        <li class="nav-item {{ (Route::is('app*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app">
            <i class="fa fa-cogs">
            </i>
            App
          </a>
        </li>
        <li class="nav-item {{ (Route::is('organizations*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/organizations">
            <i class="fa fa-building-o">
            </i>
            Organizacije
          </a>
        </li>

        <li class="nav-item {{ (Route::is('areas.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/areas">
            <i class="fa fa-crosshairs">
            </i>
            Področja aplikacije
          </a>
        </li>
        
        
        <li class="nav-item {{ (Route::is('users.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/users">
            <i class="fa fa-users">
            </i>
            Uporabniki aplikacije
          </a>
        </li>
        <li class="nav-item {{ (Route::is('positions.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/positions">
            <i class="fa fa-align-center">
            </i>
            Delovna mesta
          </a>
        </li>
        <li class="nav-item {{ (Route::is('educationalprograms.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/educationalprograms">
            <i class="fa fa-book">
            </i>
            Izobraževalni programi 
          </a>
        </li>
        <li class="nav-item {{ (Route::is('years.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/years">
            <i class="fa fa-calendar-o">
            </i>
            Šolska leta
          </a>
        </li>
        <li class="nav-item {{ (Route::is('ais*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/ais">
            <i class="fa fa-commenting-o">
            </i>
            Chat
          </a>
        </li>
        <li class="nav-item {{ (Route::is('help*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/app/helps">
            <i class="fa fa-info-circle">
            </i>
            Pomoč
          </a>
        </li>
      @endappadmin

     

    </ul>

     <ul class="navbar-nav">
       <li class="nav-item ">
        <a class="nav-link disabled" href="#">
          <i class="fa fa-bell-o">
            <span class="badge badge-danger">11</span>
          </i>
          Obvestila
        </a>
      </li>
      <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }} dropdown">
        @school
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-university"></i> Šola
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach(Auth::user()->person->person_organizations->sortByDesc('active')->unique('school_organization_id')->sortby('school_organization_id') as $person_organization)
                @if ($person_organization->active)
                  <a class="dropdown-item" href="/school/organizations/persons/change_person_active_organization/{{ $person_organization->id}}" style="background-color: #ffff; font-weight: bold ">{{ $person_organization->school_organization->school_organization_name }}</a>
                @else
                  <a class="dropdown-item" href="/school/organizations/persons/change_person_active_organization/{{ $person_organization->id}}">{{ $person_organization->school_organization->school_organization_name }}</a>
                @endif
              @endforeach 
              <div class="dropdown-divider"></div>
              
              @foreach(Auth::user()->person->person_school_organizations() as $person_school_organization)
                  @if ($person_school_organization->active)
                      <a class="dropdown-item" href="/school/organizations/persons/change_person_active_organization/{{ $person_school_organization->id}}" style="background-color: #ffff; font-weight: bold ">{{ $person_school_organization->school_organization_year->year->school_year_name }}</a>
                  @else
                      <a class="dropdown-item" href="/school/organizations/persons/change_person_active_organization/{{ $person_school_organization->id}}">{{ $person_school_organization->school_organization_year->year->school_year_name }}</a>
                  @endif
              @endforeach

          </ul>
          @endschool 
      </li>
    
    
      <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }} dropdown">
          <a class="nav-link dropdown-toggle" href="/users/{{ Auth::user()->id }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if (Auth::user()->person->app_areas->count()>1)
                @foreach(Auth::user()->person->app_areas->sortByDesc('app_area_people_active') as $person_app_area)
                  @if ($person_app_area->app_area_people_active)
                    <a class="dropdown-item" href="/app/areas/persons/change_person_app_area/{{ $person_app_area->id}}" style="background-color: #ffff; font-weight: bold ">{{ $person_app_area->app_area->app_area_name }}</a>
                  @else
                    <a class="dropdown-item" href="/app/areas/persons/change_person_app_area/{{ $person_app_area->id}}">{{ $person_app_area->app_area->app_area_name }}</a>
                  @endif
                @endforeach 
                <div class="dropdown-divider"></div>
              @endif  
              <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">Moj profil</a>
          </ul>
      </li>

       <li class="nav-item">
         <a class="nav-link" href="{{ route('logout') }}">
           <i class="fa fa-sign-out">
             
           </i>
           Odjava
         </a>
       </li>
     </ul>
   </div>
 </nav>
    </body>
</html>