
@extends('layouts.school_master')

@section('title', 'Nadzorna plošča - eKakovost')

@push('meta')
    <meta name="description" content="Dostopajte do orodij za spremljanje kakovosti, analizirajte podatke in upravljajte vprašalnike.">
    <meta property="og:title" content="Nadzorna plošča učitelja - eKakovost">
    <meta property="og:description" content="Pregled in analiza podatkov za izboljšanje kakovosti poučevanja.">
@endpush

@section('styles') 

<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.0.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.0.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.0.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.0.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.0.3/main.min.js"></script>

<style>
    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5); /* Črno ozadje z 50 % prosojnosti */
        padding: 10px;
        border-radius: 5px; /* Zaobljeni robovi */
    }
    .carousel-caption h5,
    .carousel-caption p {
        color: #fff; /* Bela barva besedila za boljši kontrast */
    }



}
</style>

@endsection

@section('content')
    @if(1==2)
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <a href="/home"><li class="breadcrumb-item"><a href="/home">{{$person->organization->app_organization_name_short}}</a></li></a></li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0"></h1>
            </div>
            <div class="btn-list">
                
            </div>
        </div>
        <!-- Page Header Close -->
         @else
         <div>
        <br>
     </div>
        @endif
    <!-- Start:: row-1 -->   

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xxl-3 col-xl-6">
        <div class="card custom-card overflow-hidden main-content-card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="text-muted d-block mb-1"><a href="/school/calendars/school/week">Tedenski dogodki</a></span>
                        <h4 class="fw-medium mb-0">{{ $school_events->count() }}</h4>
                    </div>
                    <div class="lh-1">
                        <span class="avatar avatar-md avatar-rounded bg-primary">
                            <i class="ti-calendar-event fs-5"></i>
                        </span>
                    </div>
                </div>
                <a href="/school/calendars/school/week">
                    <div class="text-muted fs-13">Poglej tedenske dogodke <span class="text-success"><i class="ti ti-arrow-right  fs-16"></i></span></div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6">
        <div class="card custom-card overflow-hidden main-content-card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="d-block text-muted mb-1">Kampanje</span>
                        <h4 class="fw-medium mb-0">0</h4>
                    </div>
                    <div class="lh-1">
                        <span class="avatar avatar-md avatar-rounded bg-primary1">
                            <i class="ti ti-recycle fs-5"></i>
                        </span>
                    </div>
                </div>
                    <a href="/school/quality/campaigns">
                        <div class="text-muted fs-13">Poglej vse kampanje <span class="text-success"></span></div>
                    </a>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6">
        <div class="card custom-card overflow-hidden main-content-card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="text-muted d-block mb-1">Prispevki</span>
                        <h4 class="fw-medium mb-0">{{ $posts->count() }}</h4>
                    </div>
                    <div class="lh-1">
                        <span class="avatar avatar-md avatar-rounded bg-primary2">
                            <i class="ti ti-file-text fs-5"></i>
                        </span>
                    </div>
                </div>
                <a href="/school/posts">
                    <div class="text-muted fs-13">Poglejte vse prispevke <span class="text-success"><i class="ti ti-arrow-right fs-16"></i></span></div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6">
        <div class="card custom-card overflow-hidden main-content-card 
            @if ($school_nps_percentage_change >= 0) bg-success-transparent @else bg-danger-transparent @endif">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-2">
                    <div>
                        <span class="d-block text-muted mb-1">Net Promoter Score (NPS)</span>
                        <h4 class="fw-medium mb-0">{{ number_format($school_nps, 0) }}</h4>
                    </div>
                    <div class="lh-1">
                        <span class="avatar avatar-md avatar-rounded @if ($school_nps_percentage_change >= 0) bg-success @else bg-danger @endif">
                            <i class="ti ti-star fs-5"></i>
                        </span>
                    </div>
                </div>
                <div class="text-muted fs-13">Sprememba: 
                    <span class=" 
                        @if ($school_nps_percentage_change >= 0) text-success @else text-danger @endif">
                        {{ number_format($school_nps_percentage_change, 2) }} %
                        <i class="ti ti-arrow-narrow-@if ($school_nps_percentage_change >= 0) up @else down @endif fs-16"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End:: row-1 -->

    <div class="row">
        <div class="col-xxl-9">  
            <div class="card custom-card">
                <div class="card-body">
                    <div id="calendar-week-view"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3">

            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($posts as $index => $post)
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $index }}" 
                            class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($posts as $index => $post)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                            <img src="/storage/posts/{{ $post->post_cover_image_400x400 }}" class="d-block w-100" alt="{{ $post->post_title }}">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="/school/posts/{{ $post->id }}">
                                    <h5>{{ $post->post_title }}</h5>
                                    <p class="op-7">{{ Str::limit($post->post_summary, 50) }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Prejšnji</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Naslednji</span>
                </button>
            </div>
            <br>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Kategorije  
                        </div>
                        <a href="/school/posts/categories" class="btn btn-light btn-wave btn-sm text-muted waves-effect waves-light">Vse<i class="ti ti-arrow-narrow-right ms-1"></i></a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($post_categories as $category)
                                <li class="list-group-item">
                                    <a href="/school/posts/categories/{{ $category->id }}">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <i class="{{ $category->post_category_icon }} fs-14 p-1 rounded-2 d-inline-block align-middle lh-1 bg-primary-transparent text-{{ $category->post_category_color }}"></i>
                                                </div>
                                                <div>
                                                    
                                                    <span class="fw-medium ms-2">
                                                            {{ $category->post_category_name }}
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                            <div>
                                                <span class="badge bg-{{ $category->post_category_color }}">{{ $category->posts->count() }}</span>
                                            </div>
                                        </div>    
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: row-1 -->
    <!-- Start:: row-Calendar -->
     @if (1==2)
     <br>

        <div class="row">
            <div class="col-xxl-8">
                <div class="card custom-card">
                    <div class="card-body">
                        <div id="calendar-week-view"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="card custom-card">
                    <div class="card-body">
                        <div id="calendar-list-view"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    <!-- End:: row-Calendar -->



                    

@endsection

@section('scripts')
	
        <!-- Apex Charts JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- HRM Dashboard --> 
        @vite('resources/assets/js/hrm-dashboard.js')

        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales/sl.js"></script>

    <!-- FullCalendar CSS in JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales/sl.js"></script>
        <script src="{{ asset('build/assets/libs/moment/moment.js') }}"></script>

        <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Nastavi višino koledarjev
        const calendarHeight = 600; // Nastavite želeno višino za oba koledarja

        // Tedenski pogled koledarja
        const calendarWeekEl = document.getElementById('calendar-week-view');
        if (calendarWeekEl) {
            const calendarWeek = new FullCalendar.Calendar(calendarWeekEl, {
                initialView: 'timeGridWeek',
                locale: 'sl',
                firstDay: 1,
                editable: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek'
                },
                buttonText: {
                    today: 'Danes',
                    week: 'Teden' 
                },
                noEventsText: 'Ni dogodkov za prikaz',
                height: calendarHeight,
                events: {!! json_encode($all_events->map(function($event) {
                    return [
                        'title' => $event->calendar_event_title,
                        'start' => $event->calendar_event_start_time,
                        'end' => $event->calendar_event_end_time,
                        'url' => url("/school/calendars/events/{$event->id}"),
                        'className' => $event->childEvents()->count() > 0 
                            ? $event->type->calendar_event_parent_className 
                            : $event->type->calendar_event_className,
                        'background-color' =>  '#00000000', // Rumena za starše, modra za ostale
                        'textColor' => '#000000',
                        'allDay' => $event->calendar_event_all_day ? true : false,
                    ];
                })) !!} 
            });
            calendarWeek.render();
        }

        // Seznam tedenskih dogodkov z gumbom "Dodaj dogodek"
        const calendarListEl = document.getElementById('calendar-list-view');
        if (calendarListEl) {
            const calendarList = new FullCalendar.Calendar(calendarListEl, {
                initialView: 'listWeek',
                locale: 'sl',
                firstDay: 1,
                editable: false,
                headerToolbar: {
                    left: '',
                    center: 'title',
                    right: 'customAddEventButton'
                },
                customButtons: {
                    customAddEventButton: {
                        text: 'Dodaj dogodek',
                        click: function() {
                            window.location.href = '/school/calendars/events/create';
                        }
                    }
                },
                buttonText: {
                    list: 'Seznam tedna'
                },
                noEventsText: 'Ni dogodkov za prikaz',
                height: calendarHeight,
                events: {!! json_encode($weekly_events->map(function($event) {
                    return [
                        'title' => $event->calendar_event_title,
                        'start' => $event->calendar_event_start_time,
                        'end' => $event->calendar_event_end_time,
                        'url' => url("/school/calendars/events/{$event->id}"),
                        'className' => $event->type->calendar_event_className,
                        'textColor' => '#000000',
                        

                    ];
                })) !!}
            });
            calendarList.render();
        }
    });
</script>


@endsection
