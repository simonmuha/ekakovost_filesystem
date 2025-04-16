<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- Font Awesome JS -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<style>
  @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    
</style>               
</head>
<body>
  
  <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <img class="navbar-brand"" src="/storage/app/logo1.png"> 
      <img class="navbar-brand"" src="/storage/app/organizations/{{ Auth::user()->active_organization->app_organization_image }}">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ (Route::is('home*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school">
            <i class="fa fa-home">
            </i>
            Domov
          </a>
        </li>
        <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school/{{ $blade_person->school->id }}">
            <i class="fa fa-university">
            </i>
            Šola
          </a>
        </li>
        <li class="nav-item {{ (Route::is('areas*.*')) ? 'active' : '' }}">
         <a class="nav-link qaq-link" href="/school/areas">
           <i class="fa fa-book qaq-icon"></i>
           Področja
           <span class="sr-only">(current)</span>
           </a>
       </li>
       <li class="nav-item {{ (Route::is('sevents*.*')) ? 'active' : '' }}">
         <a class="nav-link qaq-link" href="/school/calendars">
           <i class="fa fa-calendar qaq-icon"></i>
            Koledar
           <span class="sr-only">(current)</span>
           </a>
       </li>
       <li class="nav-item {{ (Route::is('campaign*.*')) ? 'active' : '' }}">
         <a class="nav-link qaq-link" href="/school/quality/campaigns">
           <i class="fa fa-eercast qaq-icon"></i>
            Kampanje
           <span class="sr-only">(current)</span>
           </a>
       </li>
        
        <li class="nav-item {{ (Route::is('help*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school/helps">
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
                    <a class="dropdown-item" href="/school/school/people/change_person_active_school_year/{{ $blade_person->id }}/{{ $school_organizational_year->id}}" style="background-color: #ffff; font-weight: bold">
                      {{ $school_organizational_year->year->school_year_name }}
                    </a>
                  @else
                    <a class="dropdown-item" href="/school_admin/school/people/change_person_active_school_year/{{ $blade_person->id }}/{{ $school_organizational_year->id}}" style="background-color: #ffff; ">
                      {{ $school_organizational_year->year->school_year_name }}
                    </a>
                  @endif    
                
              @endforeach
              
              
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