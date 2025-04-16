<head>

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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
     
      <li class="nav-item {{ (Route::is('home/emqq')) ? 'active' : '' }}">
         <a class="nav-link qaq-link" href="/home/emqq">
           <i class="fa fa-home qaq-icon"></i>
           Domov
           <span class="sr-only">(current)</span>
           </a>
       </li>
      <li class="nav-item {{ (Route::is('questions*')) ? 'active' : '' }}">
        <a class="nav-link qaq-link" href="/quality/questions">
          <i class="fa fa-question qaq-icon">
          </i>
          Vprašanja
        </a>
      </li>
      <li class="nav-item {{ (Route::is('questionnaires.*')) ? 'active' : '' }}">
        <a class="nav-link qaq-link" href="/quality/questionnaires">
          <i class="fa fa-file-text-o qaq-icon">
          </i>
          Vprašalniki
        </a>
      </li>
      <li class="nav-item {{ (Route::is('personroles.*')) ? 'active' : '' }}">
        <a class="nav-link qaq-link" href="/quality/personroles">
          <i class="fa fa-users qaq-icon">
          </i>
          Vloge oseb
        </a>
      </li>
      <li class="nav-item {{ (Route::is('questions/types.*')) ? 'active' : '' }}">
        <a class="nav-link qaq-link" href="/quality/questions/types">
          <i class="fa fa-users qaq-icon">
          </i>
          Tipi vprašanj
        </a>
      </li>
      <li class="nav-item {{ (Route::is('tags.*')) ? 'active' : '' }}">
        <a class="nav-link qaq-link" href="/quality/tags">
          <i class="fa fa-tags qaq-icon">
          </i>
          Oznake
        </a>
      </li>
      
    </ul>

     <ul class="navbar-nav">
       <li class="nav-item ">
        <a class="nav-link disabled" href="#">
          <i class="fa fa-bell-o qaq-icon">
            <span class="badge badge-danger">11</span>
          </i>
          Obvestila
        </a>
      </li>
      <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }} dropdown">
        @school
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-university qaq-icon"></i> Šola
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
      
        
        @include('inc.part_navbar_user_area')


     </ul>
   </div>
 </nav>
    </body>
</html>