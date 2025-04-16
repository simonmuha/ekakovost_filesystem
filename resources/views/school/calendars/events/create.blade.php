@extends('layouts.school_master')
@section('styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection

@section ('content')


<form method="POST" action="{{ action('App\Http\Controllers\School\SchoolCalendarEventsController@store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($parent_event))
        <input type="hidden" name="calendar_event_parent_id" value="{{ $parent_event->id }}">
    @else
        <input type="hidden" name="calendar_event_parent_id" value="">
    @endif
<!-- Page Header -->
    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="/school/calendars">Koledar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dogodki</li>
                </ol>
            </nav>
            @if(isset($parent_event))
                <h1 class="page-title fw-medium fs-18 mb-0">Dodaj poddogodek k dogodku {{ $parent_event->calendar_event_title }}</h1>
            @else
                <h1 class="page-title fw-medium fs-18 mb-0">Dodaj dogodek</h1>
            @endif
            
        </div>
        <div class="btn-list">
            
        </div>
    </div>
    <!-- Page Header Close -->

    <!-- Start:: row-2 -->
    <div class="row">
        <div class="col-xl-9">
        <div class="card custom-card">
    <div class="card-header justify-content-between">
        <div class="card-title">Splošno</div>
        <div class="prism-toggle"></div>
    </div>
    <div class="card-body">
        <div class="row gy-4">
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Naslov</label>
                <input type="text" class="form-control" id="input" name="calendar_event_title" 
                    value="{{ old('calendar_event_title', isset($parent_event) ? 'Poddogodek - ' . $parent_event->calendar_event_title : '') }}">


                @error('calendar_event_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Kratek opis</label>
                <textarea class="form-control" id="text-area" name="calendar_event_description_short" rows="3">
                    {{ old('calendar_event_description_short') }}
                </textarea>
            </div>

            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Opis</label>
                <textarea class="form-control" id="description-ckeditor" name="calendar_event_description" rows="5">
                    {{ old('calendar_event_description') }}
                </textarea>
            </div>

            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Začetek dogodka</label>
                <div class="row align-items-center mt-2">
                    <div class="col-md-4">
                        <label for="input-date" class="form-label">Datum:</label>
                        <input type="date" name="calendar_start_date" class="form-control" id="input-date"
    value="{{ old('calendar_start_date', isset($parent_event) && optional($parent_event)->calendar_event_start_time ? \Carbon\Carbon::parse($parent_event->calendar_event_start_time)->format('Y-m-d') : '') }}">

                        @error('calendar_start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="input-time" class="form-label">Ura:</label>
                        <input type="time" name="calendar_start_time" class="form-control" id="input-time"
    value="{{ old('calendar_start_time', isset($parent_event) && optional($parent_event)->calendar_event_start_time ? \Carbon\Carbon::parse($parent_event->calendar_event_start_time)->format('H:i') : '') }}">

                        @error('calendar_start_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Konec dogodka</label>
                <div class="row align-items-center mt-2">
                    <div class="col-md-4">
                        <label for="input-date" class="form-label">Datum:</label>
                        <input type="date" name="calendar_end_date" class="form-control" id="input-date"
    value="{{ old('calendar_end_date', isset($parent_event) && optional($parent_event)->calendar_event_end_time ? \Carbon\Carbon::parse($parent_event->calendar_event_end_time)->format('Y-m-d') : '') }}">

                        @error('calendar_end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="input-time" class="form-label">Ura:</label>
                        <input type="time" name="calendar_end_time" class="form-control" id="input-time"
    value="{{ old('calendar_end_time', isset($parent_event) && optional($parent_event)->calendar_event_end_time ? \Carbon\Carbon::parse($parent_event->calendar_event_end_time)->format('H:i') : '') }}">

                        @error('calendar_end_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Kraj</label>
                <input type="text" class="form-control" id="input" name="calendar_event_location"
    value="{{ old('calendar_event_location', isset($parent_event) ? optional($parent_event)->calendar_event_location : '') }}">

                @error('calendar_event_location')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Vidnost dogodka</label>
                <div class="form-check">
                    <div class="row">
                        @foreach($calendar_event_ownerships as $index => $ownership)
                            <div class="col-md-3">
                                <input class="form-check-input" type="radio" name="calendar_event_ownership_id"
                                    id="calendar_event_ownership{{ $ownership->id }}"
                                    value="{{ $ownership->id }}"
                                    {{ (old('calendar_event_ownership_id', optional($parent_event)->calendar_event_ownership_id ?? ($selected_ownership_id ?? null)) == $ownership->id || $index === 0) ? 'checked' : '' }}>
                                <label class="form-check-label" for="calendar_event_ownership{{ $ownership->id }}">
                                    {{ $ownership->calendar_event_ownership_name_slo }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @if(isset($parent_event))
                <input type="hidden" name="calendar_event_parent_id" value="{{ $parent_event->id }}">
            @else
                <input type="hidden" name="calendar_event_parent_id" value="">
            @endif

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Shrani</button>
    </form>
    </div>
</div>

        </div>
        @if(isset($parent_event))
            <div class="col-xl-3">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            {{ $parent_event->calendar_event_title }}
                        </div>
                        <div class="prism-toggle">
                            <span class="badge bg-secondary">{{$parent_event->type->calendar_event_type_name_slo}}</span>
                        </div>

                        <div class="d-sm-flex align-items-center mb-3">
                            <div class="d-flex align-items-center flex-fill">
                                <span class="avatar avatar-sm avatar-rounded me-3">
                                    <img src="/storage/users/{{$parent_event->person->user->user_profile_image}}" alt="">
                                </span>
                                <div>
                                    <p class="mb-0 fw-medium">{{ $parent_event->person->person_name }} {{ $parent_event->person->person_surname }}</p>
                                    
                                    <div class="fs-12 text-muted fw-normal"><i class="ri-calendar-fill me-2 align-middle lh-1 text-primary1"></i>
                                        {{ \Carbon\Carbon::parse($parent_event->updated_at)->format('j. n. Y') }}

                                    </div>
                                </div>
                            </div>
                            <div class="btn-list mt-sm-0 mt-2">
                            </div>
                        </div>
                        <div>
                            @php
                                $start = \Carbon\Carbon::parse($parent_event->calendar_event_start_time);
                                $end = \Carbon\Carbon::parse($parent_event->calendar_event_end_time);
                                $startFormatted = $start->format('d. M Y | H:i');
                                $endFormatted = $end->format('d. M Y | H:i');
                                $startDateOnly = $start->format('d. M Y');
                                $endDateOnly = $end->format('d. M Y');
                                // Pretvorba datumskih vrednosti
                            @endphp
                            <div class="fs-12 text-muted fw-normal">

                                Trajanje: 
                                @if ($parent_event->calendar_event_whole_day && $start->isSameDay($end))
                                    <!-- Celodnevni dogodek en dan -->
                                    {{ $startDateOnly }}
                                @elseif ($parent_event->calendar_event_whole_day && !$start->isSameDay($end))
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

                    <hr>
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                @if ($parent_event->calendar_event_description_short !== null)
                                    <label for="input-label" class="form-label">{{ $parent_event->calendar_event_description_short }}</label>
                                @else
                                    <label for="input-label" class="form-label">Dogodek nima kratkega opisa</label>
                                @endif
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        @endif
        
    </div>
    <!-- End:: row-2 -->



    <div class="row">
        <div class="col-md-2">
            <div class="card border-0">
                <div class="row">
                    <div class="col-md-12 text-center">
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-10">
            
            <br>
            
            
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        ClassicEditor.create( document.querySelector( '#description-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script>
        const choices = new Choices('#choices-single-default', {
            searchPlaceholderValue: 'Iskanje', // Prevod za iskalno vrstico
            shouldSort: false, // Nastavite po potrebi
        });
    </script>

@endsection