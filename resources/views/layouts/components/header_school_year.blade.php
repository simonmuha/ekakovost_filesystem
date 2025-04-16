@if(count($blade_person->school_organization_years) > 0)
    <li class="header-element country-selector dropdown">
        <!-- Start::header-link|dropdown-toggle -->
        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown">
            {{ $blade_person->school_organization_year_current->year->school_year_name }}
        </a>
        <!-- End::header-link|dropdown-toggle -->
        <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
            
            @foreach($blade_person->school_organization_years as $school_organizational_year) 
                @if ($blade_person->school_organization_year_id_current == $school_organizational_year->id)
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/school/school/people/change_person_active_school_year/{{ $blade_person->id }}/{{ $school_organizational_year->id}}" font-weight: bold">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                        <img src="{{asset('build/assets/images/flags/us_flag.jpg')}}" alt="img">
                                    </span>
                                    <b>{{ $school_organizational_year->year->school_year_name }}</b>
                                </div>
                            </div>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/school/school/people/change_person_active_school_year/{{ $blade_person->id }}/{{ $school_organizational_year->id}}">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                        <img src="{{asset('build/assets/images/flags/us_flag.jpg')}}" alt="img">
                                    </span>
                                    {{ $school_organizational_year->year->school_year_name }}
                                </div>
                            </div>
                        </a>
                    </li>
                @endif    
            @endforeach
        </ul>
    </li>
@endif
