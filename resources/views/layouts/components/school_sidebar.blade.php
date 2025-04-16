
<aside class="app-sidebar sticky" id="sidebar">

<!-- Start::main-sidebar-header -->
<div class="main-sidebar-header">
    <a href="/home" class="header-logo">
        <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
        <img src="/storage/app/logo1.png" alt="logo" class="toggle-dark">
    </a>
    <div style="display: flex; align-items: center; gap: 10px;">
        <a href="/home" class="header-logo">
            <img src="/storage/app/logo1.png" alt="logo" class="desktop-dark">
        </a>
        @if (Auth::user()->active_organization)
            <a href="/school/school/4" class="header-logo">
                <img class="desktop-dark" src="/storage/app/organizations/{{ Auth::user()->active_organization->app_organization_image }}">
            </a>
        @endif
    </div>
    <a href="/home" class="header-logo">
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
            

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Šola</span></li>
            <!-- End::slide__category -->
            
            <!-- Start::slide -->
            <li class="slide">
                <a href="/school/projects" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                    <span class="side-menu__label">Projekti</span>
                </a>
            </li>
            <!-- End::slide -->
            <!-- Start::slide -->
            <li class="slide">
                <a href="/school/calendars" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                    <span class="side-menu__label">Koledar</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                    <span class="side-menu__label">Področja</span>
                    <i class="ri-arrow-down-s-line side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                    <li class="slide side-menu__label1">
                        <a href="javascript:void(0)">Področja</a>
                    </li>
                    <li class="slide has-sub">
                        <a href="/school/areas/1" class="side-menu__item">Strateško načrtovanje
                            <i class="ri-arrow-down-s-line side-menu__angle"></i></a>
                    </li>
                </ul>
            </li>
            <!-- End::slide -->

            

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Kakovost</span></li>
            <!-- End::slide__category -->
            <!-- Start::slide -->
            <li class="slide">
                <a href="/school/groups" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                    </svg>
                    <span class="side-menu__label">Skupina za kakovost</span>
                </a>
            </li>
            <!-- End::slide -->
            <!-- Start::slide -->
            <li class="slide">
                <a href="/school/quality/campaigns" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                    </svg>
                    <span class="side-menu__label">Kampanje</span>
                </a>
            </li>
            <!-- End::slide -->
<!-- Start::slide -->
<li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                    <span class="side-menu__label">Sistemi kakovosti</span>
                    <i class="ri-arrow-down-s-line side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                    <li class="slide side-menu__label1">
                        <a href="javascript:void(0)">Sistemi kakovosti</a>
                    </li>
                    <li class="slide has-sub">
                        <a href="/school/quality/systems/eqavet" class="side-menu__item">EQAVET
                            </a>
                    </li>
                </ul>
            </li>
            <!-- End::slide -->

        

        <!-- Start::slide__Help -->
        <li class="slide__category"><span class="category-name">Pomoč</span></li>
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
            <a href="/school/app/helps/faq" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>


                <span class="side-menu__label">Vprašanja</span>
            </a>
        </li>
        <li class="slide">
            <a href="/school/app/suggestions/create" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
               F         <path strokeLinecap="round" strokeLinejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>


                <span class="side-menu__label">Predlogi</span>
            </a>
        </li>
        <!-- End::slide -->
        @if ($blade_person->organization->school)
            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Organizacija</span></li>
            <!-- End::slide__category -->
            <!-- Start::slide -->
            <li class="slide">
                <a href="/school/school/{{ $blade_person->organization->school->id }}" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-6 9 6v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 22V12h6v10" />
                    </svg>
                    <span class="side-menu__label">{{ $blade_person->organization->app_organization_name_short }}</span>
                </a>
            </li>
            <!-- End::slide -->
        @endif
    </nav>
    <!-- End::nav -->

</div>
<!-- End::main-sidebar -->

</aside>