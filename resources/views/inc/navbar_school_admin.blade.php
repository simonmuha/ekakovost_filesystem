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
    @if (Auth::user()->active_organization)
      <img class="navbar-brand"" src="/storage/app/organizations/{{ Auth::user()->active_organization->app_organization_image }}">
    @endif
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ (Route::is('school_admin*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin">
            <i class="fa fa-cogs">
            </i>
            Administracija šole
          </a>
        </li>
        <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin/school">
            <i class="fa fa-university">
            </i>
            Šola
          </a>
        </li>
         
        <li class="nav-item {{ (Route::is('areas*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin/school/areas">
            <i class="fa fa-book">
            </i>
            Področja
          </a>
        </li>
        <li class="nav-item {{ (Route::is('groups*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin/groups">
            <i class="fa fa-object-group">
            </i>
            Skupine
          </a>
        </li>
        

        <li class="nav-item {{ (Route::is('users.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin/school/people">
            <i class="fa fa-users">
            </i>
            Uporabniki
          </a>
        </li>
        
        <li class="nav-item {{ (Route::is('help*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin/school/organization/years">
            <i class="fa fa-calendar-o ">
            </i>
            Šolska leta
          </a>
        </li>
        <li class="nav-item {{ (Route::is('educationalprograms.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin/school/educational_programs">
            <i class="fa fa-book">
            </i>
            Izobraževalni programi 
          </a>
        </li>
        <li class="nav-item {{ (Route::is('campaigns.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/quality/campaigns">
            <i class="fa fa-eercast">
            </i>
            Kampanje
          </a>
        </li>
        <li class="nav-item {{ (Route::is('help*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_admin/helps">
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
      <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }} dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-calendar-o  qaq-icon"></i> {{ $blade_person->school_organization_year_current->year->school_year_name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach($blade_person->school_organization_years as $school_organizational_year) 
                  @if ($blade_person->school_organization_year_id_current == $school_organizational_year->id)
                    <a class="dropdown-item" href="/school_admin/school/people/change_person_active_school_year/{{ $blade_person->id }}/{{ $school_organizational_year->id}}" style="background-color: #ffff; font-weight: bold">
                      {{ $school_organizational_year->year->school_year_name }}
                    </a>
                  @else
                    <a class="dropdown-item" href="/school_admin/school/people/change_person_active_school_year/{{ $blade_person->id }}/{{ $school_organizational_year->id}}" style="background-color: #ffff; ">
                      {{ $school_organizational_year->year->school_year_name }}
                    </a>
                  @endif    
                
              @endforeach
              
              <div class="dropdown-divider"></div>
              
              @foreach($blade_user->person->person_school_organizations() as $person_school_organization)
                  @if ($person_school_organization->active)
                      <a class="dropdown-item" href="/school/organizations/persons/change_person_active_organization/{{ $person_school_organization->id}}" style="background-color: #ffff; font-weight: bold ">{{ $person_school_organization->school_organization_year->year->school_year_name }}</a>
                  @else
                      <a class="dropdown-item" href="/school/organizations/persons/change_person_active_organization/{{ $person_school_organization->id}}">{{ $person_school_organization->school_organization_year->year->school_year_name }}</a>
                  @endif
              @endforeach

          </ul>
      </li>

      @include('inc.part_navbar_user_area')
      
      
       
     </ul>
   </div>
 </nav>
    </body>
</html>