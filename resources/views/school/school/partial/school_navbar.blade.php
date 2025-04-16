<nav class="navbar navbar-expand-lg navbar-primary-transparent mb-3">
    <div class="container-fluid">
        <a aria-label="anchor" class="navbar-brand" href="javascript:void(0);">
            <img src="/storage/app/organizations/{{$school_organization->app_organization->app_organization_image}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarColor01" aria-controls="navbarColor01"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'school.about' ? 'active' : '' }}" 
                        href="{{ route('school.about', $school_organization->id) }}">
                        O šoli
                        </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'school.social_medias' ? 'active' : '' }}" 
                        href="{{ route('school.social_medias', $school_organization->id) }}">
                        Socialni mediji
                        </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'school.files' ? 'active' : '' }}" 
                        href="{{ route('school.files', $school_organization->id) }}">
                        Datoteke
                        </a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>