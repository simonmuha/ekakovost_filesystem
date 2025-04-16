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
    <img class="navbar-brand"" src="/storage/app/logo1.png"> <img class="navbar-brand"" src="/storage/LogoERS.png">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item {{ (Route::is('home')) ? 'active' : '' }}">
         <a class="nav-link" href="/home">
           <i class="fa fa-home"></i>
           Domov
           <span class="sr-only">(current)</span>
           </a>
       </li>
       
       <li class="nav-item {{ (Route::is('systems.*')) ? 'active' : '' }}">
        <a class="nav-link" href="/quality/systems">
          <i class="fa fa-building  ">
          </i>
          Sistemi
        </a>
      </li>
       <li class="nav-item {{ (Route::is('standards.*')) ? 'active' : '' }}">
        <a class="nav-link" href="/quality/standards">
          <i class="fa fa-bars"></i>
          Standardi
        </a>
      </li>
      <li class="nav-item {{ (Route::is('indicators.*')) ? 'active' : '' }}">
        <a class="nav-link" href="/quality/indicators">
          <i class="fa fa-bar-chart"></i>
          Kazalniki
        </a>
      </li>
      <li class="nav-item {{ (Route::is('questions.*')) ? 'active' : '' }}">
        <a class="nav-link" href="/quality/questions">
          <i class="fa fa-question">
          </i>
          Vprašanja
        </a>
      </li>
      <li class="nav-item {{ (Route::is('questionnaires.*')) ? 'active' : '' }}">
        <a class="nav-link" href="/quality/questionnaires">
          <i class="fa fa-file-text-o">
          </i>
          Vprašalniki
        </a>
      </li>
      <li class="nav-item {{ (Route::is('campaigns.*')) ? 'active' : '' }}">
        <a class="nav-link" href="/quality/campaigns">
          <i class="fa fa-eercast">
          </i>
          Kampanje
        </a>
      </li>
      <li class="nav-item {{ (Route::is('reports.*')) ? 'active' : '' }}">
        <a class="nav-link" href="/quality/reports">
          <i class="fa fa-book">
            <span class="badge badge-danger">V izdelavi</span>
          </i>
          Poročila
        </a>
      </li>

      @if (1==3)
        <li class="nav-item {{ (Route::is('settings.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/settings">
            <i class="fa fa-cog">
            </i>
            Nastavitve
          </a>
        </li>
      @endif
      <li class="nav-item">
         <a class="nav-link disabled" href="#">
           <i class="fa fa-comments-o">
             <span class="badge badge-warning">11</span>
           </i>
           Pogovori
         </a>
       </li>
       <li class="nav-item ">
        <a class="nav-link disabled" href="#">
          <i class="fa fa-bell-o">
            <span class="badge badge-danger">11</span>
          </i>
          Obvestila
        </a>
      </li>
     </ul>
  </ul>
    
     <ul class="navbar-nav ">
      @if ( Auth::user()->user_permission == 127)
        <li class="nav-item {{ (Route::is('admin*.*')) ? 'active' : '' }}">
          <a class="nav-link" href="/admin">
            <i class="fa fa-cogs">
            </i>
            App admin
          </a>
        </li>
    @endif
      <li class="nav-item">
        <a class="nav-link" href="/users/{{ Auth::user()->id }}"">
          <i class="fa fa-user-o">
          </i>
          {{ Auth::user()->name }}
        </a>
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