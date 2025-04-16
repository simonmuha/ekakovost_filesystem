
<aside class="app-sidebar sticky" id="sidebar" style="background-color: #37477A;">

<!-- Start::main-sidebar-header -->
<div class="main-sidebar-header" style="background-color: #37477A;">
    <a href="{{url('index')}}" class="header-logo">
        <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
        <img src="/storage/app/logo1.png" alt="logo" class="toggle-dark">
        <div style="display: flex; align-items: center; gap: 10px;">
            <img src="/storage/app/logo1.png" alt="logo" class="desktop-dark">
            @if (Auth::user()->active_organization)
                <img class="desktop-dark" src="/storage/app/organizations/{{ Auth::user()->active_organization->app_organization_image }}">
            @endif
        </div>
        <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
        <img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="toggle-white">
        <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
    </a>
</div>
<!-- End::main-sidebar-header -->

<!-- Start::main-sidebar -->
<div class="main-sidebar" id="sidebar-scroll">

    <!-- Start::nav -->
    <nav class="main-menu-container nav nav-pills flex-column sub-open">
        <div class="slide-left" id="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
        </div>
        <ul class="main-menu">
            <!-- Start::slide__category -->
            <!--  <li class="slide__category"><span class="category-name">Main</span></li> -->
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="/home" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                    <span class="side-menu__label">Domov</span>
                </a>
            </li>
            <!-- End::slide -->
            
            @if ($blade_user->people->count() > 0)
                @foreach($blade_user->people as $person)
                    <li>
                        <!-- Start::slide__category -->
                        <li class="slide__category">
                            <span class="category-name">
                                <img style="width: 20px; height: 20px;" src="/storage/app/organizations/{{$person->organization->app_organization_image}}" alt="Organization Logo" class="me-2 rounded-circle">
                                {{ $person->organization->app_organization_name_short }}
                            </span>
                        
                        </li>
                        <!-- End::slide__category -->
                    </li>
                    @if ($person->person_app_areas->count() > 0)
                        @foreach($person->person_app_areas as $person_app_area)
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="/app/areas/persons/change_person_app_area/{{ $person->id }}/{{ $person_app_area->id }}" class="side-menu__item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                                <span class="side-menu__label">
                                    {{ $person_app_area->app_area_name }}
                                </span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        @endforeach
                    @endif
                    <div class="dropdown-divider"></div>

                @endforeach
            @else
                Ni osebnih profilov
            @endif
            
<!-- Start::slide__Communication -->
<li class="slide__category"><span class="category-name">Komunikacija</span></li>
        <!-- End::slide__Help -->

        @if (1==2)
            <!-- Start::slide -->
            <li class="slide">
                <a href="/school/app/areas" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                    <span class="side-menu__label">Pomoč</span>
                </a>
            </li>
            <!-- Start::slide -->
             @endif
        <li class="slide">
            <a href="/users/files" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4.5-5.815V4a1.5 1.5 0 0 0-3 0v1.185A6.002 6.002 0 0 0 6 11v3.159c0 .379-.214.725-.553.938L4.5 17h5m6 0a3 3 0 1 1-6 0" />
                </svg>
                <span class="side-menu__label">Datoteke</span>
            </a>
        </li>
        <li class="slide">
            <a href="/user/notifications" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4.5-5.815V4a1.5 1.5 0 0 0-3 0v1.185A6.002 6.002 0 0 0 6 11v3.159c0 .379-.214.725-.553.938L4.5 17h5m6 0a3 3 0 1 1-6 0" />
                </svg>
                <span class="side-menu__label">Obvestila</span>
            </a>
        </li>
        <li class="slide">
            <a href="/user/emails" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 7.5v9a2.25 2.25 0 0 1-2.25 2.25h-15A2.25 2.25 0 0 1 2.25 16.5v-9m19.5 0a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 2.25 7.5m19.5 0v.422a2.25 2.25 0 0 1-.958 1.846l-6.91 4.606a3 3 0 0 1-3.764 0L3.208 9.768A2.25 2.25 0 0 1 2.25 7.922V7.5" />
                    </svg>


                <span class="side-menu__label">E-pošta</span>
            </a>
        </li>
        <!-- End::slide -->
            
        <!-- Start::slide__category -->
        <li class="slide__category"><span class="category-name">Pomoč</span></li>
        <!-- End::slide__category -->
        <!-- Start::slide -->
        <li class="slide">
            <a href="/school/app/helps/faq" class="side-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                <span class="side-menu__label">Vprašanja</span>
            </a>
        </li>
        <!-- End::slide -->



            

        </ul>
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
    </nav>
    <!-- End::nav -->

</div>
<!-- End::main-sidebar -->

</aside>