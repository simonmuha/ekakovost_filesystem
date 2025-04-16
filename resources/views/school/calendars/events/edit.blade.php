@extends('layouts.school_master')

@section('styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')

{!! Form::model($calendar_event, ['action' => ['App\Http\Controllers\School\SchoolCalendarEventsController@update', $calendar_event->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

<!-- Page Header -->
<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <nav>
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="/school/calendars">Koledar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Uredi dogodek</li>
            </ol>
        </nav>
        <h1 class="page-title fw-medium fs-18 mb-0">Uredi dogodek</h1>
    </div>
    <div class="btn-list">
        <button type="submit" class="btn btn-success">Shrani spremembe</button>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-2 -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">Splošno</div>
            </div>
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

{!! Form::close() !!}

@endsection

@section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#description-ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
