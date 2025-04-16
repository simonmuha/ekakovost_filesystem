@extends('layouts.school_master')
@section('styles')
<!-- jQuery in Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

@endsection 

@section ('content')
    <!-- Modal za potrditev brisanja -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Potrditev brisanja</h5>
                </div>
                <div class="modal-body">
                    Ali ste prepričani, da želite izbrisati ta element?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Prekliči</button>
                    <form id="deleteEventForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Briši</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal za potrditev brisanja -->



    <!-- Page Header -->
    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="/school/calendars">Koledar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dogodki</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0"></h1>
        </div>
        <div class="btn-list">
            
        </div>
    </div>
    <!-- Page Header Close -->
    <!-- Start:: row-1 -->
    <div class="row">
        <div class="row">
            <div class="col-xl-7">
                
            </div>
            <div class="col-xl-5">
                

            </div>
        </div>
    </div>
    <!-- End:: row-1 -->
    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card profile-card">
            </div>
            <div class="card-body pb-0 position-relative">
                <div class="row profile-content">
                    <div class="col-xl-7">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <p class="h5 fw-semibold mb-0">{{$calendar_event->calendar_event_title}}</p>
                                            
                                            <span class="badge bg-secondary">{{$calendar_event->ownership->calendar_event_ownership_name_slo}}</span>
                                        </div>
                                        <div class="d-sm-flex align-items-center mb-3">
                                            <div class="d-flex align-items-center flex-fill">
                                                <span class="avatar avatar-sm avatar-rounded me-3">
                                                    <img src="/storage/users/{{$calendar_event->person->user->user_profile_image}}" alt="">
                                                </span>
                                                <div>
                                                    <p class="mb-0 fw-medium">{{ $calendar_event->person->person_name }} {{ $calendar_event->person->person_surname }}</p>
                                                    
                                                    <div class="fs-12 text-muted fw-normal"><i class="ri-calendar-fill me-2 align-middle lh-1 text-primary1"></i>
                                                        {{ \Carbon\Carbon::parse($calendar_event->updated_at)->format('j. n. Y') }}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-list mt-sm-0 mt-2">
                                                @if ($calendar_event->person_id == $person->id)
                                                    <!-- Gumb za brisanje dogodka -->
                                                    <button class="btn btn-sm btn-primary3-light btn-wave" data-toggle="modal" data-target="#deleteModal" data-event-id="{{ $calendar_event->id }}">
                                                        <i class="ri-delete-bin-line"></i> Briši
                                                    </button>

                                                @endif 
                                            </div>
                                        </div>
                                        <div>
                                            @php
                                                use Carbon\Carbon;

                                                // Pretvorba datumskih vrednosti
                                                $start = Carbon::parse($calendar_event->calendar_event_start_time);
                                                $end = Carbon::parse($calendar_event->calendar_event_end_time);

                                                // Prikaz datuma in ure v formatu "d. M Y | H:i"
                                                $startFormatted = $start->format('d. M Y | H:i');
                                                $endFormatted = $end->format('d. M Y | H:i');
                                                $startDateOnly = $start->format('d. M Y');
                                                $endDateOnly = $end->format('d. M Y');
                                            @endphp
                                            <div class="fs-12 text-muted fw-normal">
                                            <span class="badge bg-secondary">{{$calendar_event->type->calendar_event_type_name_slo}}</span>

                                                Trajanje: 
                                                @if ($calendar_event->calendar_event_whole_day && $start->isSameDay($end))
                                                    <!-- Celodnevni dogodek en dan -->
                                                    {{ $startDateOnly }}
                                                @elseif ($calendar_event->calendar_event_whole_day && !$start->isSameDay($end))
                                                    <!-- Celodnevni dogodek več dni -->
                                                    {{ $startDateOnly }} - {{ $endDateOnly }}
                                                @elseif ($start->isSameDay($end))
                                                    <!-- Dogodek se konča isti dan -->
                                                    {{ $startFormatted }} - {{ $end->format('H:i') }}
                                                @else
                                                    <!-- Dogodek se konča drug dan -->
                                                    {{ $startFormatted }} - {{ $endFormatted }}
                                                @endif
                                        
                                            </div>
                                        </div>
                                        <hr>
                                        <li class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event mb-1 bg-primary-transparent d-flex justify-content-between align-items-center">
                                            <div class="fc-event-main text-primary">
                                                {!! $calendar_event->calendar_event_description_short !!}
                                            </div>
                                        </li>
                                        <p class="mb-4">
                                            {!! $calendar_event->calendar_event_description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        
                    @if ($calendar_event->calendar_event_parent_id == null)
                            <div class="card custom-card overflow-hidden border">

                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Poddogodki
                                    </div>
                                    @if ($calendar_event->person_id == $person->id)
                                        <a href="/school/calendars/events/{{ $calendar_event->id }}/create_child_event" class="btn btn-light btn-wave btn-sm text-muted waves-effect waves-light">Dodaj poddogodek</a>
                                    @endif
                                </div>
                                @if ($calendar_event->childEvents->count() > 0)
                                    <div class="card-body">
                                        @foreach ($calendar_event->childEvents as $childEvent)
                                            <div class="d-flex align-items-center justify-content-between mb-3">                
                                                <div class="d-flex align-items-center">
                                                    <div>   
                                                        <a href="/school/calendars/events/{{$childEvent->id}}">
                                                            <p class="mb-0 fw-medium">{{$childEvent->calendar_event_title}} </p>    
                                                        </a>                                            
                                                        @php
                                                            $start = \Carbon\Carbon::parse($childEvent->calendar_event_start_time);
                                                            $end = \Carbon\Carbon::parse($childEvent->calendar_event_end_time);
                                                            $startFormatted = $start->format('d. M Y | H:i');
                                                            $endFormatted = $end->format('d. M Y | H:i');
                                                            $startDateOnly = $start->format('d. M Y');
                                                            $endDateOnly = $end->format('d. M Y');
                                                            // Pretvorba datumskih vrednosti
                                                        @endphp
                                                        <div class="fs-12 text-muted fw-normal">

                                                            Trajanje: 
                                                            @if ($childEvent->calendar_event_whole_day && $start->isSameDay($end))
                                                                <!-- Celodnevni dogodek en dan -->
                                                                {{ $startDateOnly }}
                                                            @elseif ($childEvent->calendar_event_whole_day && !$start->isSameDay($end))
                                                                <!-- Celodnevni dogodek več dni -->
                                                                {{ $startDateOnly }} - {{ $endDateOnly }}
                                                            @elseif ($start->isSameDay($end))
                                                                <!-- Dogodek se konča isti dan -->
                                                                {{ $startFormatted }} - {{ $end->format('H:i') }}
                                                            @else
                                                                <!-- Dogodek se konča drug dan -->
                                                                {{ $startFormatted }} - {{ $endFormatted }}
                                                            @endif
                                                    
                                                        </div>
                                                    </div>                                                
                                                </div>                                                
                                            </div>                                            
                                        @endforeach   
                                    </div>
                                @else
                                    <div class="card-body">
                                        
                                            <p class="mb-0 fw-medium">Dogodek nima poddogodkov </p>    
                                    </div> 
                                @endif
                            </div>
                        @endif

                        @if ($calendar_event->calendar_event_parent_id != null)
                            <div class="card custom-card overflow-hidden border">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        <a href="/school/calendars/events/{{ $calendar_event->calendar_event_parent_id }}">  
                                            <p class="h5 fw-semibold mb-0">{{$calendar_event->parentEvent->calendar_event_title}}</p>
                                        </a>  
                                    </div>
                                    <a href="/school/calendars/events/{{ $calendar_event->calendar_event_parent_id }}/create_child_event" class="btn btn-light btn-wave btn-sm text-muted waves-effect waves-light">Dodaj poddogodek</a>
                                </div>
                                <div class="card-body">
                                @foreach ($calendar_event->parentEvent->childEvents as $childEvent)
                                    <div class="d-flex align-items-center justify-content-between mb-3 
                                                {{ $childEvent->id == $calendar_event->id ? 'bg-primary-transparent text-dark p-2 rounded' : '' }}">                
                                        <div class="d-flex align-items-center">
                                            <div>   
                                                <a href="/school/calendars/events/{{$childEvent->id}}" 
                                                class="{{ $childEvent->id == $calendar_event->id ? 'text-dark' : '' }}">
                                                    <p class="mb-0 fw-medium">{{$childEvent->calendar_event_title}} </p>    
                                                </a>                                            
                                                @php
                                                    $start = \Carbon\Carbon::parse($childEvent->calendar_event_start_time);
                                                    $end = \Carbon\Carbon::parse($childEvent->calendar_event_end_time);
                                                    $startFormatted = $start->format('d. M Y | H:i');
                                                    $endFormatted = $end->format('d. M Y | H:i');
                                                    $startDateOnly = $start->format('d. M Y');
                                                    $endDateOnly = $end->format('d. M Y');
                                                @endphp
                                                <div class="fs-12 fw-normal 
                                                            {{ $childEvent->id == $calendar_event->id ? 'text-dark' : 'text-muted' }}">

                                                    Trajanje: 
                                                    @if ($childEvent->calendar_event_whole_day && $start->isSameDay($end))
                                                        {{ $startDateOnly }}
                                                    @elseif ($childEvent->calendar_event_whole_day && !$start->isSameDay($end))
                                                        {{ $startDateOnly }} - {{ $endDateOnly }}
                                                    @elseif ($start->isSameDay($end))
                                                        {{ $startFormatted }} - {{ $end->format('H:i') }}
                                                    @else
                                                        {{ $startFormatted }} - {{ $endFormatted }}
                                                    @endif
                                            
                                                </div>
                                            </div>                                                
                                        </div>                                                
                                    </div>                                            
                                @endforeach 

                                </div>
                            </div>
                        @endif
                        <div class="card custom-card overflow-hidden border">
                            <div class="card-body">
                                <ul class="nav nav-tabs tab-style-6 mb-3 p-0" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link w-100 text-start active" id="people-tab" data-bs-toggle="tab"
                                            data-bs-target="#people-tab-pane" type="button" role="tab"
                                            aria-controls="people-tab-pane" aria-selected="true">Sodelujoči</button>
                                    </li>
                                    @if ($calendar_event->person_id == $person->id)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="edit-event-tab" data-bs-toggle="tab"
                                                data-bs-target="#edit-event-tab-pane" type="button" role="tab"
                                                aria-controls="edit-event-tab-pane" aria-selected="true">Uredi dogodek</button>
                                        </li>
                                    @endif
                                    @if ($calendar_event->person_id == $person->id || $calendar_event_report)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="report-tab" data-bs-toggle="tab"
                                                data-bs-target="#report-tab-pane" type="button" role="tab"
                                                aria-controls="report-tab-pane" aria-selected="false">Poročila</button>
                                        </li>
                                    @endif

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link w-100 text-start" id="gallery-tab" data-bs-toggle="tab"
                                            data-bs-target="#gallery-tab-pane" type="button" role="tab"
                                            aria-controls="gallery-tab-pane" aria-selected="false">Dokumenti</button>
                                    </li>
                                    @if ($projects->count() >0)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="project-tab" data-bs-toggle="tab"
                                                data-bs-target="#project-tab-pane" type="button" role="tab"
                                                aria-controls="project-tab-pane" aria-selected="false">Projekti</button>
                                        </li>
                                    @endif
                                </ul>
                                <div class="tab-content" id="profile-tabs">
                                    <div class="tab-pane show active p-0 border-0" id="people-tab-pane" role="tabpanel" aria-labelledby="people-tab" tabindex="0">
                                        <ul class="list-group list-group-flush border rounded-3">
                                            
                                            <li class="list-group-item p-3">
                                                <span class="fw-medium fs-15 d-block mb-3">Lastnik dogodka</span>
                                                <div class="d-sm-flex align-items-center mb-3">
                                                    <div class="d-flex align-items-center flex-fill">
                                                        <span class="avatar avatar-sm avatar-rounded me-3">
                                                            <img src="/storage/users/{{$calendar_event->person->user->user_profile_image}}" alt="">
                                                        </span>
                                                        <div>
                                                            <p class="mb-0 fw-medium">{{ $calendar_event->person->person_name }} {{ $calendar_event->person->person_surname }}</p>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="btn-list mt-sm-0 mt-2">
                                                        
                                                    </div>
                                                </div>
                                                @foreach ($calendar_event_person_roles as $calendar_event_person_role)
                                                    <!-- Modal za dodajanje osebe -->
                                                    <div class="modal modal-lg fade" id="modal-add-person-role-{{ $calendar_event_person_role->id }}" tabindex="-1" aria-labelledby="modal-add-person-role-label-{{ $calendar_event_person_role->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="modal-add-person-role-label-{{ $calendar_event_person_role->id }}">
                                                                        Dodaj osebo kot {{ $calendar_event_person_role->calendar_event_person_role_name }}
                                                                    </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form method="POST" action="{{ route('calendar_event.add_person') }}" id="add-person-form-{{ $calendar_event_person_role->id }}">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <!-- Listbox za zaposlene -->
                                                                        <div class="row">
                                                                            <div class="col-xl-5 mb-2">
                                                                                <input type="hidden" name="calendar_event_id" value="{{ $calendar_event->id }}">
                                                                                <input type="hidden" name="calendar_event_person_role_id" value="{{ $calendar_event_person_role->id }}">
                                                                                <label for="available-people-{{ $calendar_event_person_role->id }}" class="form-label">
                                                                                    Zaposleni
                                                                                </label>
                                                                                <select class="form-control listbox" size="10" id="available-people-{{ $calendar_event_person_role->id }}" multiple>
                                                                                    @php
                                                                                        $peopleWithoutRole = $school_people->diff($calendar_event->peopleByRole($calendar_event_person_role->id));
                                                                                    @endphp
                                                                                    @foreach ($peopleWithoutRole as $personWithoutRole)
                                                                                        <option value="{{ $personWithoutRole->id }}">
                                                                                            {{ $personWithoutRole->person_name }} {{ $personWithoutRole->person_surname }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xl-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                                                                                <button type="button" class="btn btn-primary btn-sm mb-2 move-btn"
                                                                                    onclick="moveItems('available-people-{{ $calendar_event_person_role->id }}', 'selected-people-{{ $calendar_event_person_role->id }}')">
                                                                                    Dodaj <i class="ri-arrow-right-line"></i>
                                                                                </button>
                                                                                <button type="button" class="btn btn-light btn-sm mt-2 move-btn"
                                                                                    onclick="moveItems('selected-people-{{ $calendar_event_person_role->id }}', 'available-people-{{ $calendar_event_person_role->id }}')">
                                                                                    <i class="ri-arrow-left-line"></i> Odstrani
                                                                                </button>
                                                                            </div> 
                                                                            <div class="col-xl-5 mb-2">
                                                                                <label for="selected-people-{{ $calendar_event_person_role->id }}" class="form-label">
                                                                                    Osebe z vlogo
                                                                                </label>
                                                                                <select class="form-control listbox" size="10" id="selected-people-{{ $calendar_event_person_role->id }}" name="selected_people[]" multiple>
                                                                                    @foreach ($calendar_event->peopleByRole($calendar_event_person_role->id) as $calendar_event_person)
                                                                                        <option value="{{ $calendar_event_person->id }}">
                                                                                            {{ $calendar_event_person->person_name }} {{ $calendar_event_person->person_surname }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Prekliči</button>
                                                                        <button type="submit" class="btn btn-primary">Potrdi</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- JavaScript -->
                                                    <script>
                                                        // Funkcija za premikanje elementov med listboxi
                                                        function moveItems(sourceId, targetId) {
                                                            const source = document.getElementById(sourceId);
                                                            const target = document.getElementById(targetId);

                                                            // Premakni izbrane možnosti iz enega listboxa v drugega
                                                            Array.from(source.selectedOptions).forEach(option => { 
                                                                target.appendChild(option);
                                                            });
                                                        }

                                                        // Ko se obrazec pošlje, izberi vse elemente v desnem listboxu
                                                        document.querySelectorAll('form[id^="add-person-form-"]').forEach(form => {
                                                            form.addEventListener('submit', function () {
                                                                const selectedListbox = form.querySelector('[id^="selected-people-"]');
                                                                for (let i = 0; i < selectedListbox.options.length; i++) {
                                                                    selectedListbox.options[i].selected = true;
                                                                }
                                                            });
                                                        });
                                                    </script>

                                                    @php
                                                        // Pridobimo osebe za določeno vlogo
                                                        $peopleInRole = $calendar_event->peopleByRole($calendar_event_person_role->id);
                                                    @endphp

                                                    @if (!   ($peopleInRole->isEmpty() && $calendar_event->person_id != $person->id)   )

                                                        <!-- Vrstica z gumbom za dodajanje -->
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <span class="fw-medium fs-15">{{ $calendar_event_person_role->calendar_event_person_role_name }}</span>
                                                            @if ($calendar_event->person_id == $person->id)
                                                                <!-- Gumb za dodajanje osebe -->
                                                                <button class="btn btn-sm btn-primary3-light btn-wave" data-bs-toggle="modal" 
                                                                        data-bs-target="#modal-add-person-role-{{ $calendar_event_person_role->id }}">
                                                                    <i class="ri-add-line"></i> Uredi
                                                                </button>
                                                            @endif
                                                        </div>

                                                        @if ($peopleInRole->isEmpty())
                                                            <p class="text-muted">Ni oseb v tej vlogi.</p>
                                                        @else
                                                            <ul>
                                                                <div class="d-flex align-items-center flex-fill">
                                                                    <div class="avatar-list-stacked">
                                                                        @php
                                                                            $peopleCount = $peopleInRole->count(); // Število oseb
                                                                        @endphp

                                                                        @foreach ($peopleInRole as $key => $personInRole)
                                                                            @if ($key < 5)
                                                                                <!-- Modal za urejanje osebe -->
                                                                                <div class="modal modal-lg fade" id="modal-add-person-role-{{ $calendar_event_person_role->id }}-{{ $personInRole->id }}" tabindex="-1" aria-labelledby="modal-add-person-role-label-{{ $calendar_event_person_role->id }}-{{ $personInRole->id }}" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h6 class="modal-title" id="modal-add-person-role-label-{{ $calendar_event_person_role->id }}-{{ $personInRole->id }}">
                                                                                                    <span class="avatar avatar-lg avatar-rounded" 
                                                                                                        data-bs-toggle="modal" 
                                                                                                        data-bs-target="#modal-add-person-role-{{ $calendar_event_person_role->id }}-{{ $personInRole->id }}" 
                                                                                                        title="{{ $personInRole->person_name }} {{ $personInRole->person_surname }}">
                                                                                                        <img src="/storage/users/{{$personInRole->user->user_profile_image}}" alt="">
                                                                                                    </span>

                                                                                                    {{ $personInRole->person_name }} {{ $personInRole->person_surname }}
                                                                                                </h6>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <form method="POST" action="{{ route('calendar_event.remove_role') }}">
                                                                                                @csrf
                                                                                                <input type="hidden" name="calendar_event_id" value="{{ $calendar_event->id }}">
                                                                                                <input type="hidden" name="person_id" value="{{ $personInRole->id }}">
                                                                                                
                                                                                                <div class="modal-body">
                                                                                                    <label for="toMail-{{ $calendar_event_person_role->id }}" class="form-label">
                                                                                                    Vloge na dogodku:
                                                                                                    </label>
                                                                                                    <div class="list-group">
                                                                                                        @foreach ($personInRole->rolesForEvent($calendar_event->id) as $role)
                                                                                                            <div class="list-group-item d-flex justify-content-between">
                                                                                                                <span>{{ $role->calendar_event_person_role_name }}</span>
                                                                                                                <!-- Dodan skriti vnos za role_id v ločenem obrazcu -->
                                                                                                                <form method="POST" action="{{ route('calendar_event.remove_role') }}">
                                                                                                                    @csrf
                                                                                                                    <input type="hidden" name="calendar_event_id" value="{{ $calendar_event->id }}">
                                                                                                                    <input type="hidden" name="person_id" value="{{ $personInRole->id }}">
                                                                                                                    <input type="hidden" name="calendar_event_person_role_id" value="{{ $role->id }}">
                                                                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                                                                        Odstrani
                                                                                                                    </button>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Prekliči</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- End Modal za urejanje osebe -->

                                                                                <!-- Avatar z naslovom (title) -->
                                                                                <span class="avatar avatar-lg avatar-rounded" 
                                                                                    @if ($calendar_event->person_id == $person->id)
                                                                                        data-bs-toggle="modal" 
                                                                                        data-bs-target="#modal-add-person-role-{{ $calendar_event_person_role->id }}-{{ $personInRole->id }}"
                                                                                    @endif
                                                                                    title="{{ $personInRole->person_name }} {{ $personInRole->person_surname }}">
                                                                                    <img src="/storage/users/{{$personInRole->user->user_profile_image}}" alt="">
                                                                                </span>
                                                                            @endif
                                                                        @endforeach



                                                                        <!-- Če je več kot 5 oseb, prikažemo dodatno ikono -->
                                                                        @if ($peopleCount > 5)
                                                                            <a class="avatar avatar-lg bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                                                +{{ $peopleCount - 5 }}
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        @endif

                                                    @endif
                                                @endforeach

                                                
                                            </li>
                                            
                                        </ul>
                                    </div>


                                    @if ($calendar_event->person_id == $person->id)
                                        <div class="tab-pane p-0 border-0" id="edit-event-tab-pane" role="tabpanel"
                                        aria-labelledby="edit-event-tab" tabindex="0">
                                            <ul class="list-group list-group-flush border rounded-3">
                                                <li class="list-group-item p-3">
                                                <form method="POST" action="{{ action('App\Http\Controllers\School\SchoolCalendarEventsController@update', $calendar_event->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Start:: row-2 -->
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card custom-card">
                                                                <div class="card-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                                            <label for="input-label" class="form-label">Naslov dogodka</label>
                                                                            <input type="text" class="form-control" id="input" name="calendar_event_title" value="{{  $calendar_event->calendar_event_title }}">
                                                                            @error('calendar_event_title')
                                                                                <small class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                                            <label for="input-label" class="form-label">Kratek opis</label>
                                                                            <textarea class="form-control" id="text-area" name="calendar_event_description_short" rows="3">{{  $calendar_event->calendar_event_description_short }}</textarea>
                                                                        </div>
                                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                                            <label for="input-label" class="form-label">Opis</label>
                                                                            <textarea class="form-control" id="description-ckeditor" name="calendar_event_description" rows="5">{{  $calendar_event->calendar_event_description }}</textarea>
                                                                        </div>
                                                                        
                                                                        <!-- Začetek dogodka -->
                                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                                            <label for="input-label" class="form-label">Začetek dogodka</label>
                                                                            <div class="row align-items-center mt-2">
                                                                                <div class="col-md-4">
                                                                                    <label for="input-date" class="form-label">Datum:</label>
                                                                                    
                                                                                    <!-- Obrazec za vnos datuma -->
                                                                                    <input type="date" name="calendar_start_date" class="form-control" id="input-date" 
                                                                                        value="{{ old('calendar_start_date', date('Y-m-d', strtotime($calendar_event->calendar_event_start_time))) }}">
                                                                                    @error('calendar_start_date')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="input-time" class="form-label">Ura:</label>
                                                                                    <input type="time" name="calendar_start_time" class="form-control" id="input-time" 
                                                                                        value="{{ old('calendar_start_time', date('H:i', strtotime($calendar_event->calendar_event_start_time))) }}">
                                                                                    @error('calendar_start_time')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Konec dogodka -->
                                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                                            <label for="input-label" class="form-label">Konec dogodka</label>
                                                                            <div class="row align-items-center mt-2">
                                                                                <div class="col-md-4">
                                                                                    <label for="input-date" class="form-label">Datum:</label>
                                                                                    
                                                                                    <!-- Obrazec za vnos datuma -->
                                                                                    <input type="date" name="calendar_end_date" class="form-control" id="input-date" 
                                                                                        value="{{ old('calendar_end_date', date('Y-m-d', strtotime($calendar_event->calendar_event_end_time))) }}">
                                                                                    @error('calendar_end_date')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="input-time" class="form-label">Ura:</label>
                                                                                    <input type="time" name="calendar_end_time" class="form-control" id="input-time" 
                                                                                        value="{{ old('calendar_end_time', date('H:i', strtotime($calendar_event->calendar_event_end_time))) }}">
                                                                                    @error('calendar_end_time')
                                                                                        <small class="text-danger">{{ $message }}</small>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <br>
                                                                    <div class="btn-list">
                                                                        <button type="submit" class="btn btn-success">Shrani spremembe</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End:: row-2 -->

                                                    </form>
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="tab-pane" id="report-tab-pane" role="tabpanel" aria-labelledby="report-tab" tabindex="0">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <!-- Potrditveno polje in besedilo -->
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" id="toggle-report-form" class="form-check-input me-2" 
                                                    {{ $calendar_event_report ? 'checked' : '' }}>
                                                <label for="toggle-report-form" class="fw-medium fs-15 mb-0">Poročilo o službeni poti</label>
                                            </div>
                                            
                                            <!-- Ikona PDF -->
                                            @if($calendar_event_report)
                                                <a href="/school/calendars/events/reports/{{$calendar_event_report->id}}/pdf_event_travel_report" 
                                                class="btn btn-icon btn-sm btn-primary3-light btn-wave" 
                                                target="_blank" title="Prenesi PDF">
                                                    <i class="ri-file-pdf-line fs-18"></i> <!-- RemixIcon PDF ikona -->
                                                </a>
                                            @endif
                                        </div>  
                                        @if ($calendar_event->person_id == $person->id)
                                            <!-- Skrit ali odprt obrazec za poročilo -->
                                            <div id="report-form-container" class="mt-3" style="{{ $calendar_event_report ? '' : 'display: none;' }}">
                                                <form method="POST" action="{{ action('App\Http\Controllers\School\SchoolCalendarEventReportsController@update', $calendar_event->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT') <!-- Pravilno nastavimo HTTP metodo na PUT -->

                                                    <!-- Datum in čas odhoda -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                        <label for="input-label" class="form-label">Datum in čas odhoda</label>
                                                        <div class="row align-items-center mt-2">
                                                            <div class="col-md-4">
                                                                <input type="date" name="calendar_event_report_start_time_date" class="form-control"
                                                                    value="{{ old('calendar_event_report_start_time_date', isset($calendar_event_report)
                                                                        ? \Carbon\Carbon::parse($calendar_event_report->calendar_event_report_start_time)->format('Y-m-d')
                                                                        : \Carbon\Carbon::parse($calendar_event->calendar_event_start_time)->format('Y-m-d')) }}">
                                                                @error('calendar_event_report_start_time_date')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="time" name="calendar_event_report_start_time_time" class="form-control"
                                                                    value="{{ old('calendar_event_report_start_time_time', isset($calendar_event_report)
                                                                        ? \Carbon\Carbon::parse($calendar_event_report->calendar_event_report_start_time)->format('H:i')
                                                                        : \Carbon\Carbon::parse($calendar_event->calendar_event_start_time)->format('H:i')) }}">
                                                                @error('calendar_event_report_start_time_time')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Datum in čas prihoda -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                        <label for="input-label" class="form-label">Datum in čas prihoda</label>
                                                        <div class="row align-items-center mt-2">
                                                            <div class="col-md-4">
                                                                <input type="date" name="calendar_event_report_end_time_date" class="form-control"
                                                                    value="{{ old('calendar_event_report_end_time_date', isset($calendar_event_report)
                                                                        ? \Carbon\Carbon::parse($calendar_event_report->calendar_event_report_end_time)->format('Y-m-d')
                                                                        : \Carbon\Carbon::parse($calendar_event->calendar_event_end_time)->format('Y-m-d')) }}">
                                                                @error('calendar_event_report_end_time_date')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="time" name="calendar_event_report_end_time_time" class="form-control"
                                                                    value="{{ old('calendar_event_report_end_time_time', isset($calendar_event_report)
                                                                        ? \Carbon\Carbon::parse($calendar_event_report->calendar_event_report_end_time)->format('H:i')
                                                                        : \Carbon\Carbon::parse($calendar_event->calendar_event_end_time)->format('H:i')) }}">
                                                                @error('calendar_event_report_end_time_time')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Relacija službene poti -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                        <label class="form-label">Relacija službene poti:</label>
                                                        <input type="text" class="form-control" name="calendar_event_report_relation"
                                                            value="{{ old('calendar_event_report_relation', isset($calendar_event_report)
                                                                ? $calendar_event_report->calendar_event_report_relation
                                                                : 'Velenje - ' . $calendar_event->calendar_event_location . ' - Velenje') }}">
                                                        @error('calendar_event_report_relation')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <!-- Vozilo -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                        <label class="form-label">Vozilo:</label>

                                                        <select class="form-control mb-3" id="official-vehicle-select" name="calendar_event_report_transport_official"
                                                            {{ optional($calendar_event_report)->is_personal_vehicle ? 'disabled' : '' }}>
                                                            <option value="">Izberite službeno vozilo</option>
                                                            @foreach($vehicles as $vehicle)
                                                                <option value="{{ $vehicle->app_vehicle_registration }}"
                                                                    {{ old('calendar_event_report_transport_official', optional($calendar_event_report)->transport_official) == $vehicle->app_vehicle_registration ? 'selected' : '' }}>
                                                                    {{ $vehicle->app_vehicle_registration }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" type="checkbox" id="personal-vehicle-checkbox"
                                                                name="calendar_event_report_is_personal_vehicle"
                                                                {{ old('calendar_event_report_is_personal_vehicle', optional($calendar_event_report)->is_personal_vehicle) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="personal-vehicle-checkbox">Uporaba osebnega vozila</label>
                                                        </div>

                                                        <div id="personal-vehicle-container"
                                                            style="{{ old('calendar_event_report_is_personal_vehicle', optional($calendar_event_report)->is_personal_vehicle) ? '' : 'display: none;' }}">
                                                            <label class="form-label">Registrska številka osebnega vozila:</label>
                                                            <input type="text" class="form-control" id="personal-vehicle-registration"
                                                                name="calendar_event_report_transport_personal"
                                                                value="{{ old('calendar_event_report_transport_personal', optional($calendar_event_report)->transport_personal) }}">
                                                        </div>
                                                    </div>

                                                    <!-- Voznik -->
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                        <label class="form-label">Voznik:</label>
                                                        <select class="form-control mb-3" id="driver-select" name="calendar_event_report_driver_id" required>
                                                            <option value="">Izberite voznika</option>
                                                            @foreach($calendar_event->calendarEventPeople->unique('person_id') as $calendar_event_person)
                                                                <option value="{{ $calendar_event_person->person_id }}"
                                                                    {{ old('calendar_event_report_driver_id', optional($calendar_event_report)->calendar_event_report_driver_id) == $calendar_event_person->person_id ? 'selected' : '' }}>
                                                                    {{ $calendar_event_person->person->person_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Poročilo -->
                                                    <div class="mb-3">
                                                        <label class="form-label">Poročilo</label>
                                                        <textarea class="form-control" name="calendar_event_report_description" rows="4" required>{{ old('calendar_event_report_description', optional($calendar_event_report)->calendar_event_report_description) }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Pripravil:</label>
                                                        {{ $calendar_event->person->person_name }}
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Shrani poročilo</button>
                                                </form>

                                            </div>

                                            <script>
                                                document.getElementById('toggle-report-form').addEventListener('change', function() {
                                                    var formContainer = document.getElementById('report-form-container');
                                                    if (this.checked) {
                                                        formContainer.style.display = 'block';
                                                    } else {
                                                        formContainer.style.display = 'none';
                                                    }
                                                });
                                            </script>
                                        @endif
                                    </div>
                                    @if ($projects->count() >0)
                                        <div class="tab-pane" id="project-tab-pane" role="tabpanel" aria-labelledby="project-tab" tabindex="0">
                                            <form method="POST" action="{{ action('App\Http\Controllers\School\ProjectCalendarEventsController@update', $calendar_event->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT') <!-- Pravilno nastavimo HTTP metodo na PUT -->

                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        @foreach($projects as $project)
                                                            <div class="form-check mb-1">
                                                                <input 
                                                                    class="form-check-input" 
                                                                    type="checkbox" 
                                                                    name="project_ids[]" 
                                                                    value="{{ $project->id }}"
                                                                    id="project-{{ $project->id }}"
                                                                    @if(in_array($project->id, $selectedProjects)) checked @endif
                                                                >
                                                                <label class="form-check-label" for="project-{{ $project->id }}">
                                                                    {{ $project->project_name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>


                                                <button type="submit" class="btn btn-primary">Shrani spremembe</button>
                                            </form>
                                        </div>
                                    @endif
                                    <div class="tab-pane p-0 border-0" id="gallery-tab-pane" role="tabpanel"
                                        aria-labelledby="gallery-tab" tabindex="0">
                                        <div class="form-check mb-3">
                                            @if($calendar_event_report)
                                                <table class="table">
                                                    <tr>
                                                        <td>Poročilo o službeni poti</td>
                                                        <td class="text-center">
                                                            <a href="/school/calendars/events/reports/{{$calendar_event_report->id}}/pdf_event_travel_report" 
                                                            class="btn btn-icon btn-sm btn-primary3-light btn-wave" 
                                                            target="_blank" title="Prenesi PDF">
                                                                <i class="ri-file-pdf-line fs-18"></i> <!-- RemixIcon PDF ikona -->
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            @else
                                                <p>Ni dokumentov pri dogodku.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane p-0 border-0" id="friends-tab-pane" role="tabpanel"
                                        aria-labelledby="friends-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <a href="javascript:void(0);" class="mb-0 fw-semibold">Della Jasmine</a>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">dellajasmine117@gmail.com</p>
                                                                <span class="badge bg-info-transparent">Product Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Danny Raj</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">dannyraj658@gmail.com</p>
                                                                <span class="badge bg-success-transparent">UI Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Catalina Keira</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">catalinakeira023@gmail.com</p>
                                                                <span class="badge bg-info-transparent">Product Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/11.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Priceton Gray</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">pricetongray451@gmail.com</p>
                                                                <span class="badge bg-warning-transparent">Team Manager</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Sarah Ruth</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">sarahruth45@gmail.com</p>
                                                                <span class="badge bg-info-transparent">Product Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Mahira Hose</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">mahirahose9456@gmail.com</p>
                                                                <span class="badge bg-info-transparent">Product Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/1.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Victoria Gracie</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">victoriagracie@gmail.com</p>
                                                                <span class="badge bg-info-transparent">Product Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Amith Gray</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">amithgray132@gmail.com</p>
                                                                <span class="badge bg-info-transparent">Product Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            <span class="avatar avatar-xl avatar-rounded flex-shrink-0">
                                                                <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="">
                                                            </span>
                                                            <div class="text-truncate">
                                                                <p class="mb-0 fw-semibold">Isha Bella</p>
                                                                <p class="w-75 text-truncate fs-12 op-7 mb-1 text-muted">ishabella255@gmail.com</p>
                                                                <span class="badge bg-info-transparent">Product Designer</span>
                                                            </div>
                                                            <div class="dropdown ms-auto">
                                                                <a aria-label="anchor" class="btn btn-secondary-light btn-icon btn-sm btn-wave" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                                                                    <i class="ri-more-2-fill"></i>
                                                                </a> 
                                                                <ul class="dropdown-menu dropdown-menu-end" role="menu"> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Message</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Block</a></li> 
                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Remove</a></li> 
                                                                </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center p-3">
                                                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                            <button class="btn btn-sm btn-primary-light btn-wave me-0">View Profile</button>
                                                            <button class="btn btn-sm btn-light btn-wave me-0">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="text-center">
                                                    <button class="btn btn-primary-light btn-wave">Show All</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-1 -->


    

@endsection

@section('scripts')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Gumb, ki je sprožil modalno okno
        var eventId = button.data('event-id'); // Dobimo ID dogodka iz atributa data-event-id
        var form = $('#deleteEventForm'); // Najdemo obrazec za brisanje

        // Posodobimo action URL obrazca z ID-jem dogodka
        form.attr('action', '/school/calendars/events/' + eventId + '/delete');
    });
</script>

<script>
        ClassicEditor.create(document.querySelector('#description-ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection