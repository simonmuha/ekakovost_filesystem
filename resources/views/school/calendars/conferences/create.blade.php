@extends('layouts.school')
@section ('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 




{!! Form::open(['action' => 'App\Http\Controllers\School\SchoolCalendarEventsController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
    
<div class="card school-card"> 
    <div class="card-header school-card-header">
        <h4>
            <div class="row"> 
                <div class="d-flex align-items-center justify-content-between bd-highlight" >
                    <div class="bd-highlight">
                        <h4><i class="fa {{ $calendar_event->type->calendar_event_type_fontawesome }} fa-lg icon-menu"></i> {{$calendar_event->calendar_event_title}}</h4>
                    </div>
                    <div class="bd-highlight">
                        <a href="/school/calendars/events/{{ $calendar_event->id }}/edit" title="Uredi dogodek"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                    </div>
                </div>
            </div>
        </h4>
    </div>
    <div class="card-body">
        
        <div class="row"> 
            <div class="col-md-12">
                <i>{!!$calendar_event->calendar_event_description_short!!}</i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Začetek: 
            </div>
            <div class="col-md-4">
                {{ \Carbon\Carbon::parse($calendar_event->calendar_event_start_time)->translatedFormat('l, j. n. Y H:i') }}
            </div>
            <div class="col-md-2">
                Konec: 
            </div>
            <div class="col-md-4">
                {{ \Carbon\Carbon::parse($calendar_event->calendar_event_end_time)->translatedFormat('l, j. n. Y H:i') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! $calendar_event->type->calendar_event_type_name_slo !!}
            </div>
            <div class="col-md-6 text-end">
                <i class="fa {!! $calendar_event->ownership->calendar_event_ownership_fontawsome !!} fa-lg icon-menu" 
                data-bs-toggle="tooltip" data-bs-placement="top" 
                title="{!! $calendar_event->ownership->calendar_event_ownership_description !!}">
                </i>
                {!! $calendar_event->ownership->calendar_event_ownership_name_slo !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                {!!$calendar_event->calendar_event_description!!}
            </div>
        </div>
    </div>
</div>
<br>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('calendar_event_title','Povezava do konference')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('calendar_event_title','',['class' =>'form-control', 'placeholder'=>'Povezava'])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('calendar_event_description_short', 'Program konference') }}
                            </div>
                            <div class="col-md-9">
                                {{Form::textarea('calendar_event_description_short', '', ['id' => 'description_short-ckeditor', 'class' => 'form-control', 'placeholder' => 'Program','rows' => 5])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <br>
            {{Form::submit('Shrani', ['class' =>'btn btn-primary' ])}}
            {!! Form::close() !!}
            
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 
<script>
    flatpickr('#date-start', {
        dateFormat: "Y-m-d", // Only the date
    });

    flatpickr('#time-start', {
        enableTime: true, // Only the time
        noCalendar: true, // Hide the calendar
        dateFormat: "H:i", // Only the time in 24-hour format
        time_24hr: true
    });
</script>
<script>
    flatpickr('#date-end', {
        dateFormat: "Y-m-d", // Only the date
    });

    flatpickr('#time-end', {
        enableTime: true, // Only the time
        noCalendar: true, // Hide the calendar
        dateFormat: "H:i", // Only the time in 24-hour format
        time_24hr: true
    });
</script>


    <script>

        ClassicEditor.create( document.querySelector( '#description-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        <script>
        ClassicEditor.create( document.querySelector( '#description_short-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection