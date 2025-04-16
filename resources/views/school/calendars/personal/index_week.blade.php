 
@extends('layouts.school_master')

@section('styles')
 


@endsection

@section('content')
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="/home">{{$person->organization->app_organization_name_short}}</a></li>
                                    <li class="breadcrumb-item"><a href="/school/calendars">Koledar</a></li>
                                    <li class="breadcrumb-item"><a href="/school/calendars/week">Moji tedenski dogodki</a></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="btn-list">
                            
                        </div>
                    </div>
                    <!-- Page Header Close -->
                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="card custom-card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3">
                        
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                            <div class="card-title">Dogodki</div>
                            <a href="/school/calendars/events/create" title="Dodaj splošni dogodek">
                                    <button class="btn btn-primary btn-wave"><i class="ri-add-line align-middle me-1 fw-medium d-inline-block"></i>Nov dogodek</button>
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <ul id="external-events" class="mb-0 p-3 list-unstyled column-list">
                                @foreach($calendar_event_types as $calendar_event_type)
                                        <li class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event mb-1 bg-{{ $calendar_event_type->calendar_event_type_background }}-transparent d-flex justify-content-between align-items-center">
                                            <div class="fc-event-main text-primary">{{ $calendar_event_type->calendar_event_type_name_slo }}</div>
                                            <a href="{{ url('/school/calendars/events/create?type=' . $calendar_event_type->id) }}" title="Dodaj {{ $calendar_event_type->calendar_event_type_name_slo }}">
                                                <i class="ri-add-line align-middle fw-medium d-inline-block"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header justify-content-between pb-1">
                                <div class="card-title">
                                    Activity :
                                </div>
                                <button class="btn btn-primary-light btn-sm btn-wave">View All</button>
                            </div>
                            <div class="card-body p-0">
                            <div class="p-3 border-bottom" id="full-calendar-activity">
                                <ul class="list-unstyled mb-0 fullcalendar-events-activity">
                                <ul>
                                @foreach($person_weekly_events->sortBy(function($event) {
                                    return \Carbon\Carbon::parse($event->calendar_event_start_time);
                                }) as $event)
                                    @php
                                        // Preveri, da se lokalizacija za slovenščino uporablja pravilno
                                        $eventDate = \Carbon\Carbon::parse($event->calendar_event_start_time);
                                        $startTime = \Carbon\Carbon::parse($event->calendar_event_start_time)->format('h:iA');
                                        $endTime = \Carbon\Carbon::parse($event->calendar_event_end_time)->format('h:iA');
                                    @endphp

                                    <li>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <!-- Izpiši dan v tednu v slovenščini -->
                                            <p class="mb-1 fw-medium">{{ $eventDate->locale('sl')->format('l, M j, Y') }}</p>
                                            <span class="badge bg-light text-default mb-1">{{ $startTime }} - {{ $endTime }}</span>
                                        </div>
                                        <p class="mb-0 text-muted fs-12">{{ $event->calendar_event_title }}</p>
                                    </li>
                                @endforeach


                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--End::row-1 -->
                    
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales/sl.js"></script>
    <!-- Moment JS -->
    <script src="{{ asset('build/assets/libs/moment/moment.js') }}"></script>

    <!-- Fullcalendar JS -->
    <script src="{{ asset('build/assets/libs/fullcalendar/index.global.min.js') }}"></script>

    <!-- FullCalendar Slovenian Locale -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/sl.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script> 

    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'listWeek',  // Privzeti pogled: seznam tedenskih dogodkov
            locale: 'sl',  // Nastavi jezik na slovenščino
            validRange: {
                start: '{{ $school_year->school_year_start }}',  // Začetek vidnega obdobja
                end: '{{ $school_year->school_year_end }}'      // Konec vidnega obdobja
            },
            headerToolbar: {
                left: 'prev,next today',  // Gumbi za premikanje in danes
                center: 'title',          // Prikaz trenutnega tedna
                right: ''                 // Odstrani gumbe za preklop pogledov
            },
            buttonText: {
                today: 'Danes',
                list: 'Seznam tedna'  // Prilagodi besedilo za seznam
            },
            noEventsText: 'Ni dogodkov za prikaz',
            allDayText: 'Cel dan',  // Spremeni "all-day" v "cel dan"
            events: [
                @foreach($school_events as $event)
                {
                    title: '{{ $event->calendar_event_title }}',
                    start: '{{ $event->calendar_event_start_time }}',
                    end: '{{ $event->calendar_event_end_time }}',
                    url: '/school/calendars/events/{{ $event->id }}',
                    organizer: 'Ime organizatorja',
                    className: 'black-title'  // Dodan razred za črno barvo naslova
                },
                @endforeach
            ]
        });
        calendar.render();
    });
</script>

<style>
    .fc-event.black-title .fc-event-title {
        color: #000000 !important; /* Črna barva za naslov dogodkov */
    }
</style>


<style>
    .fc-event.black-title .fc-event-title {
        color: #000000 !important; /* Črna barva za naslov dogodkov */
    }
</style>





@endsection
