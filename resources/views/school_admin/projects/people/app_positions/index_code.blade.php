@foreach($project->peopleByCategory($subcategory->id) as $project_person)
                                            <div class="card custom-card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center gap-2 mb-3"> 
                                                        <div class="d-flex align-items-center gap-1 flex-wrap">
                                                            <div class="lh-1">
                                                                <span class="avatar avatar-sm avatar-rounded">
                                                                    <img src="{{asset('build/assets/images/faces/11.jpg')}}" alt="">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                
                                                                <div class="">{{ $project_person->person_name }} {{ $project_person->person_surname }}</div>
                                                                <div class="text-muted fs-10">{{ $project_person->person_name }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown ms-auto">
                                                            <a aria-label="anchor" href="javascript:void(0);" class="btn btn-light btn-icons btn-sm text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="javascript:void(0);">Edit</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);">Delete</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p class="fw-medium mb-1 fs-14">

                                                        @foreach($project_person->appPositions as $position)
                                                            <p>{{ $position->app_position_name }}</p>
                                                        @endforeach
                                                    </p>
                                                    <p class="fw-medium"><span class="text-muted fw-normal">Amount:</span> $50,000</p>
                                                    <div class="deal-description">
                                                        <div class="">
                                                            <a href="javascript:void(0);" class="company-name">Initech Info</a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach