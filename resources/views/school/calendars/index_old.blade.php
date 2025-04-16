
@extends('layouts.school')

@section('styles')



@endsection

@section('content')
	
                    

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
                                <div class="row">
                                    <div class="col-xl-6">

                                        <a href="/school/calendars/events" title="Tedenski dogodki">
                                            <button class="btn btn-primary btn-wave"><i class="ri-add-line align-middle me-1 fw-medium d-inline-block"></i>Tedenski dogodki</button>
                                        </a>
                                    </div>
                                    <div class="col-xl-6">
                                        <a href="/school/calendars/events/create" title="Dodaj splošni dogodek">
                                            <button class="btn btn-primary btn-wave"><i class="ri-add-line align-middle me-1 fw-medium d-inline-block"></i>Nov dogodek</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul id="external-events" class="mb-0 p-3 list-unstyled column-list">
                                    <li class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event mb-1 bg-primary-transparent d-flex justify-content-between align-items-center">
                                        <div class="fc-event-main text-primary1">Splošni dogodki</div>
                                        <a href="/school/calendars/events/create" title="Dodaj splošni dogodek">
                                            <i class="ri-add-line align-middle fw-medium d-inline-block"></i>
                                        </a>
                                    </li>
                                    <li class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event mb-1 bg-primary1-transparent d-flex justify-content-between align-items-center"
                                        data-class="bg-primary1-transparent">
                                        <div class="fc-event-main text-primary1" >Sestanek</div>
                                        <a href="/dodaj" title="Dodaj sestanek">
                                        </a>
                                    </li>
                                    <li class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event mb-1 bg-primary2-transparent d-flex justify-content-between align-items-center"
                                        data-class="bg-primary1-transparent">
                                        <div class="fc-event-main text-primary1">Konferenca</div>
                                        <a href="/dodaj" title="Dodaj konferenco">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card custom-card">
                            <div class="card-header justify-content-between pb-1">
                                <div class="card-title">
                                    Današnji dogodki:
                                </div>
                                <!-- <button class="btn btn-primary-light btn-sm btn-wave">View All</button> -->
                            </div>
                            <div class="card-body p-0">
                            <div class="p-3 border-bottom" id="full-calendar-activity">
                                <ul class="list-unstyled mb-0 fullcalendar-events-activity">
                                    @if($today_events->isEmpty())
                                        <li>
                                            <p class="mb-0 text-muted">Danes ni dogodkov.</p>
                                        </li>
                                    @else
                                        @foreach($today_events as $event)
                                            <li>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <p class="mb-1 fw-medium">{{ $event->calendar_event_start_time->format('l, M d, Y') }}</p>
                                                    <span class="badge bg-light text-default mb-1">
                                                        {{ $event->calendar_event_start_time->format('g:iA') }} - {{ $event->calendar_event_end_time->format('g:iA') }}
                                                    </span>
                                                </div>
                                                <p class="mb-0 text-muted fs-12">{{ $event->description }}</p> <!-- predpostavljam, da obstaja opis dogodka -->
                                            </li>
                                        @endforeach
                                    @endif
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
        initialView: 'dayGridMonth',
        locale: 'sl',  // Nastavite jezik na slovenščino
        validRange: {
            start: '{{ $school_year->year->school_year_start }}',  // Določa začetek vidnega obdobja
            end: '{{ $school_year->year->school_year_end }}'     // Določa konec vidnega obdobja
        },
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'  // Gumbi za preklop pogledov
        },
        buttonText: {  // Prilagoditev besedila gumbov
            today:    'Danes',
            month:    'Mesec',
            week:     'Teden',
            day:      'Dan',
            list:     'Seznam'
        },
        noEventsText: 'Ni dogodkov za prikaz',
        events: [
            @foreach($events as $event)
            {
                title: '{{ $event->calendar_event_title }}',
                start: '{{ $event->calendar_event_start_time }}',
                end: '{{ $event->calendar_event_end_time }}',
                url: '/school/calendars/events/{{ $event->id }} }}',
                organizer: 'Ime organizatorja',
                className:  '{{ $event->type->calendar_event_className }}'
            },
            @endforeach
        ]
    });
    calendar.render();
});
</script>



@endsection
