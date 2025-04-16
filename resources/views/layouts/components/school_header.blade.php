
				<header class="app-header sticky" id="header">

					<!-- Start::main-header-container -->
					<div class="main-header-container container-fluid">

						<!-- Start::header-content-left -->
						<div class="header-content-left">
							@include('inc.messages')
							<!-- Start::header-element -->
							<div class="header-element">
								<div class="horizontal-logo">
									<a href="" class="header-logo">
										<img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo1" class="desktop-logo">
										<img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo2" class="toggle-dark">
										<img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="logo3" class="desktop-dark"> 
										<img style="width: 20px; height: 20px;" src="/storage/app/organizations/{{$blade_person->organization->app_organization_image}}" alt="Organization Logo" class="toggle-logo">
										<img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo5" class="toggle-white">
										<img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo6" class="desktop-white">
                                    </a>
								</div>
							</div>
							<!-- End::header-element -->

							<!-- Start::header-element -->
							
							<!-- End::header-element -->

							

						</div>
						<!-- End::header-content-left -->

						<!-- Start::header-content-right -->
						<ul class="header-content-right">

							<!-- Start::header-element -->
							<li class="header-element d-md-none d-block">
								<a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#header-responsive-search">
									<!-- Start::header-link-icon -->
									<i class="bi bi-search header-link-icon"></i>
									<!-- End::header-link-icon -->
								</a>  
							</li>
							<!-- End::header-element -->

							@include('layouts.components.header_notification')

							<!-- Start::header-element -->


							@include('layouts.components.header_school_year')

							
							<!-- End::header-element -->

							

							<!-- Start::header-element -->
							<li class="header-element dropdown">
								<!-- Start::header-link|dropdown-toggle -->
								<a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
									<div class="d-flex align-items-center">
										<div>
											<img src="/storage/users/{{$blade_user->user_profile_image}}" alt="img" class="avatar avatar-sm">
										</div>
									</div>
								</a>
								<!-- End::header-link|dropdown-toggle -->



								<ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
									<li>
										<div class="dropdown-item text-center border-bottom">
											<span>
                                            {{ $blade_user->name }}
											</span>
											<span class="d-block fs-12 text-muted">
                                            {{ $blade_user->active_person->organization->school_organization_name }}
                                            </span>
										</div>
									</li>


									@if ($blade_user->people->count() > 0)
										@foreach($blade_user->people as $person)
											<li>
												<a class="dropdown-item d-flex align-items-center" >
													<img style="width: 20px; height: 20px;" src="/storage/app/organizations/{{$person->organization->app_organization_image}}" alt="Organization Logo" class="me-2 rounded-circle">
													{{ $person->organization->app_organization_name_short }}
												</a>
											</li>
											@if ($person->person_app_areas->count() > 0)
												@foreach($person->person_app_areas as $person_app_area)
													<li>
													<a class="dropdown-item d-flex align-items-center" 
													href="/app/areas/persons/change_person_app_area/{{ $person->id }}/{{ $person_app_area->id }}"
													style="{{ $person_app_area->app_area_people_active ? 'background-color: #ffff; font-weight: bold;' : 'background-color: transparent;' }}">
														{{ $person_app_area->app_area_name }}
													</a>

													</li>
												@endforeach
											@endif
											<div class="dropdown-divider"></div>

										@endforeach
									@else
										Ni osebnih profilov
									@endif

									<li><a class="dropdown-item d-flex align-items-center" href="/users/{{ $blade_user->id }}"><i class="fe fe-user p-1 rounded-circle bg-primary-transparent ut me-2 fs-16"></i>Moj profil</a></li>
								</ul>
							</li>  
							<!-- End::header-element -->

							

                            <!-- Start::header-element LogOut-->
                            <li class="header-element">
								<!-- Start::header-link|switcher-icon -->
								<a href="{{ route('logout') }}" >
									<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 header-link-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
									</svg>
								</a>
								<!-- End::header-link|switcher-icon -->
							</li>
							<!-- End::header-element -->
						</ul>
						<!-- End::header-content-right -->

					</div>
					<!-- End::main-header-container -->

				</header>
					