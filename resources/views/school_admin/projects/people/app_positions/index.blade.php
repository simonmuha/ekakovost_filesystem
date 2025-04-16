
@extends('layouts.school_admin_master')

@section('styles')

        <!-- FlatPickr CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/flatpickr/flatpickr.min.css')}}">

        <link rel="stylesheet" href="{{asset('build/assets/libs/dragula/dragula.min.css')}}">

        <style>
        /* Osnovni stil za vnosno polje in seznam */
        #search-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #available-people {
            width: 100%;
            padding: 8px;
        }
    </style>

@endsection

@section('content')
	
                    <!-- Start::page-header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Administracija šole</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projekti</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $project->project_name }}</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Človeški viri</h1>
                        </div>
                        

                        <div class="btn-list"> 
                            

                            
                        </div>
                    </div>
                    <!-- End::page-header -->
                    
                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-medium fs-16 me-2">Sodelavci</span><span class="badge bg-primary align-middle">{{ $project_people->count() }}</span>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-secondary mb-sm-0 mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg">Dodaj zaposlenega</button>

                                            <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('project-people-app-positions.store') }}" id="add-person-form-{{ $project->id }}">
                                                        @csrf
                                                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                                                                    
                                                            <div class="modal-header">
                                                                <h6 class="modal-title" id="exampleModalLgLabel">Dodaj zaposlenega k projektu {{ $project->project_name }}
                                                                </h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <label for="available-people-{{ $project->id }}" class="form-label">
                                                                    Zaposleni
                                                                </label>
                                                                <!-- Vnosno polje za iskanje -->
                                                                <input type="text" name= "person_id"    id="search-input" placeholder="Začnite tipkati ime ali priimek...">

                                                                <!-- Spustni seznam -->
                                                                <select name="person_id" id="available-people" size="6">
                                                                    @foreach ($school_people as $school_person)
                                                                        <option value="{{ $school_person->id }}">
                                                                            {{ $school_person->person_name }} {{ $school_person->person_surname }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                                <script>
                                                                    document.getElementById('search-input').addEventListener('input', function() {
                                                                        let searchValue = this.value.toLowerCase();
                                                                        let options = document.querySelectorAll('#available-people option');

                                                                        options.forEach(option => {
                                                                            let text = option.textContent.toLowerCase();
                                                                            if (text.includes(searchValue)) {
                                                                                option.style.display = 'block';
                                                                            } else {
                                                                                option.style.display = 'none';
                                                                            }
                                                                        });
                                                                    });
                                                                </script>



                                                                <label for="available-people-{{ $project->id }}" class="form-label">
                                                                    Delovno mesto na projektu
                                                                </label>

                                                                <select class="form-control listbox" name= "position_category_pivot_id" id="positions-listbox">
                                                                    @foreach ($app_position_subcategories as $subcategory)
                                                                        <optgroup label="{{ $subcategory->app_position_category_name }}">
                                                                            
                                                                            @foreach ($subcategory->positions_category_pivot_active as $position_category_pivot)
                                                                                <option value="{{ $position_category_pivot->id }}">{{ $position_category_pivot->app_position->app_position_name }}</option>
                                                                            @endforeach
                                                                        </optgroup>
                                                                    @endforeach
                                                                </select>


                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <label class="form-label">
                                                                            Začetek dela na projektu (od: 
                                                                            {{ $project->project_start_date ? \Carbon\Carbon::parse($project->project_start_date)->locale('sl')->format('j. n. Y') : 'Ni določeno' }}
                                                                            ):
                                                                        </label>

                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-text text-muted">
                                                                                    <i class="ri-calendar-line"></i>
                                                                                </div>
                                                                                <input type="text" class="form-control" id="project_person_app_position_start_date" name="project_person_app_position_start_date" placeholder="Izberi datum" value="{{ old('project_person_app_position_start_date', $project->project_start_date ? \Carbon\Carbon::parse($project->project_start_date)->format('Y-m-d') : '') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-6">
                                                                        <label class="form-label">
                                                                            Konec dela na projektu (do: 
                                                                            {{ $project->project_end_date ? \Carbon\Carbon::parse($project->project_end_date)->locale('sl')->format('j. n. Y') : 'Ni določeno' }}
                                                                            ):
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-text text-muted"><i class="ri-calendar-line"></i></div>
                                                                                <input type="text" class="form-control" id="project_person_app_position_end_date" name="project_person_app_position_end_date" placeholder="Izberi datum" value="{{ old('project_person_app_position_end_date', $project->project_end_date ? \Carbon\Carbon::parse($project->project_end_date)->format('Y-m-d') : '') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <script>
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                        flatpickr("#project_person_app_position_start_date", {
                                                                            locale: "sl",
                                                                            dateFormat: "Y-m-d",
                                                                            altInput: true,
                                                                            altFormat: "j. n. Y",
                                                                            allowInput: true,
                                                                            defaultDate: "{{ old('project_person_app_position_start_date', $project->project_start_date ? \Carbon\Carbon::parse($project->project_start_date)->format('Y-m-d') : '') }}"
                                                                        });

                                                                        flatpickr("#project_person_app_position_end_date", {
                                                                            locale: "sl",
                                                                            dateFormat: "Y-m-d",
                                                                            altInput: true,
                                                                            altFormat: "j. n. Y",
                                                                            allowInput: true,
                                                                            defaultDate: "{{ old('project_person_app_position_end_date', $project->project_end_date ? \Carbon\Carbon::parse($project->project_end_date)->format('Y-m-d') : '') }}"
                                                                        });
                                                                    });
                                                                </script>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Prekliči</button>
                                                                <button type="submit" class="btn btn-primary">Potrdi</button>
                                                            </div>
                                                        </div>
                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->

                    <!-- Start::row-2 -->
                    <div class="row">

                        @foreach($app_position_subcategories as $subcategory)
                            <div class="col-xxl-2 col-md-4">
                                <div class="card custom-card border border-primary border-opacity-50">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-top flex-wrap justify-content-between">
                                            <div>
                                                <h6 class="fw-medium lead-discovered"><i class="ri-circle-fill p-1 lh-1 fs-7 rounded-2 bg-primary-transparent text-primary me-2 align-middle"></i>{{ $subcategory->app_position_category_name_slo }}</h6>
                                            </div>
                                            <div class="ms-auto text-center">
                                                <span class=" badge bg-primary">{{ $project->peopleByCategory($subcategory->id)->count() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                    <!-- End::row-2 -->

                    <!-- Start::row-3 -->
                    <div class="row">
                        @foreach($app_position_subcategories as $subcategory)
                            <div class="col-xxl-2" id="leads-discovered">
                                @if($project->peopleByCategory($subcategory->id)->isEmpty())
                                    <p class="text-muted">V tej kategoriji ni oseb.</p>
                                @else 
                                    <ul class="list-group">
                                        @foreach($project->peoplePositions as $project_person_position)
                                            @if ($project_person_position->position_category_pivot->app_position_category_id  == $subcategory->id)
                                                <div class="card custom-card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 mb-3"> 
                                                            <div class="d-flex align-items-center gap-1 flex-wrap">
                                                                <div class="lh-1">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="/storage/users/{{$project_person_position->person->user->user_profile_image}}" alt="">
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    
                                                                    <div class="">{{ $project_person_position->person->person_name }} {{ $project_person_position->person->person_surname }}</div>
                                                                    <div class="text-muted fs-10">
                                                                        {{ \Carbon\Carbon::parse($project_person_position->project_person_app_position_start_date)->format('d.m.Y') }}

                                                                        @if($project_person_position->project_person_app_position_end_date)
                                                                            - {{ \Carbon\Carbon::parse($project_person_position->project_person_app_position_end_date)->format('d.m.Y') }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-light btn-icons btn-sm text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fe fe-more-vertical"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Uredi</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="fw-medium mb-1 fs-14">

                                                            <p>{{ $project_person_position->position->app_position_name }}</p>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        
                                    </ul>
                                @endif

                            </div>
                        @endforeach


                        
                    <!-- End::row-3 -->

                    <!-- Start:: New Deal -->
                    <div class="modal fade" id="create-contact" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">New Deal</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row gy-3">
                                        <div class="col-xl-12">
                                            <div class="mb-0 text-center">
                                                <span class="avatar avatar-xxl avatar-rounded">
                                                    <img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="" id="profile-img">
                                                    <span class="badge rounded-pill bg-primary avatar-badge">
                                                        <input type="file" name="photo" class="position-absolute w-100 h-100 op-0" id="profile-change">
                                                        <i class="fe fe-camera"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="deal-name" class="form-label">Contact Name</label>
                                            <input type="text" class="form-control" id="deal-name" placeholder="Contact Name">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="deal-lead-score" class="form-label">Deal Value</label>
                                            <input type="number" class="form-control" id="deal-lead-score" placeholder="Deal Value">
                                        </div>
                                        <div class="col-xl-12">
                                            <label for="company-name" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="company-name" placeholder="Company Name">
                                        </div>
                                        <div class="col-xl-12">
                                            <label class="form-label">Last Contacted</label>
                                            <div class="input-group">
                                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                <input type="text" class="form-control" id="targetDate" placeholder="Choose date and time">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Create Deal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: New Deal -->

@endsection

@section('scripts')
	
        <!-- Dragula JS -->
        <script src="{{asset('build/assets/libs/dragula/dragula.min.js')}}"></script>

        <!-- Flat Picker JS -->
        <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>

        <!-- CRM Deals JS -->
        @vite('resources/assets/js/crm-deals.js')

        <!-- Flat Picker JS -->
        <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/sl.js"></script>



@endsection
