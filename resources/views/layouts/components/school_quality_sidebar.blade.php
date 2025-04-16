
<aside class="app-sidebar sticky" id="sidebar" style="background-color:rgb(60, 94, 127);">

<!-- Start::main-sidebar-header -->
<div class="main-sidebar-header" style="background-color: rgb(60, 94, 127);">

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
            <li class="slide__category"><span class="category-name">Kampanje</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="/school_quality/campaigns" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                    <span class="side-menu__label">Kampanje</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Splošno</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="/school_quality/targetgroups" class="side-menu__item">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                    <span class="side-menu__label">Ciljne skupine</span>
                </a>
            </li>
            <!-- End::slide -->

            

            

            

</div>
<!-- End::main-sidebar -->

</aside>