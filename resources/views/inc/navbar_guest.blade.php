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

.navbar-brand {
   height: 50px;
   width: 50px;
}

</style>
           
</head>
<body>




    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">

    <img class="navbar-brand"" src="/storage/app/logo1.png">



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        
    <form class="form-inline my-2 my-lg-0" action="{{ route('user_questionnaire_create') }}" method="POST" id="obrazec">
        @csrf
        <div class="form-group">
            <input class="form-control mr-sm-2" type="text" name="user_questionnaires_code" placeholder="Vnesi kodo vprašalnika (npr. 124D.1001)" aria-label="Search" id="user_questionnaires_code">
        </div>
    </form>
    </ul>
    <ul class="navbar-nav ">

        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fa fa-sign-in">
                    </i>
                    Prijava
                </a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    <i class="fa fa-user-plus">
                    </i>
                    Registracija
                </a>
            </li>
        @endif

    </ul>

    </div>
</nav>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Poiščemo vnosno polje s kodo vprašalnika
        var vnosnoPolje = document.getElementById("koda_vprašalnika");

        // Poslušamo dogodek pritiska na tipko "Enter" v vnosnem polju
        vnosnoPolje.addEventListener("keypress", function(event) {
            // Če je pritisnjena tipka "Enter" (koda 13), pošljemo obrazec
            if (event.keyCode === 13) {
                event.preventDefault(); // Preprečimo privzeto vedenje ob pritisku na tipko "Enter"
                document.getElementById("obrazec").submit(); // Pošljemo obrazec
            }
        });
    });
</script>

</body>
</html>