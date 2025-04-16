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
        
      </li>
    
    
        

        <li class="nav-item {{ Route::is('school*.*') ? 'active' : '' }} dropdown">
            <a class="nav-link dropdown-toggle" href="/users/{{ Auth::user()->id }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-o"></i> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if ($blade_user->people->count() > 0)
                    @foreach($blade_user->people as $person)
                        <a class="dropdown-item profil" >
                            {{ $person->organization->app_organization_name }}
                        </a>
                        @if ($person->person_app_areas->count() > 0)
                            @foreach($person->person_app_areas as $person_app_area)
                                <a class="dropdown-item" href="/app/areas/persons/change_person_app_area/{{ $person->id }}/{{ $person_app_area->id }}"
                                style="{{ $person_app_area->app_area_people_active ? 'background-color: #ffff; font-weight: bold' : '' }}">
                                    {{ $person_app_area->app_area_name }}
                                </a>
                            @endforeach
                        @endif


                    @endforeach
                    <div class="dropdown-divider"></div>
                @else
                    Ni osebnih profilov
                    <div class="dropdown-divider"></div>
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
     </ul>
   </div>
 </nav>
    </body>
</html>