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
        <li class="nav-item {{ (Route::is('school*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_areas/home">
            <i class="fa fa-home">
            </i>
            Domov
          </a>
        </li>
        <li class="nav-item {{ (Route::is('schools/areas')) ? 'active' : '' }}">
         <a class="nav-link qaq-link" href="/school_areas/areas">
           <i class="fa fa-book qaq-icon"></i>
           Področja
           <span class="sr-only">(current)</span>
           </a>
       </li>
        <li class="nav-item {{ (Route::is('help*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/school_areas/helps">
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
      

      @include('inc.part_navbar_user_area')
      
      
       
     </ul>
   </div>
 </nav>
    </body>
</html>