@extends('layouts.school')
@section ('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 




{!! Form::open(['action' => 'App\Http\Controllers\School\SchoolCalendarEventsController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="d-flex align-items-center justify-content-between bd-highlight" >
            <div class="bd-highlight">
                <h4>Dodaj dogodek v koledar</h4>
            </div>
            <div class="bd-highlight">
                <a href="{{ url()->previous() }}" title="Nazaj">
                    <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                    | 
                    <a href="/schools/areas" title="Področja"><i class="fa fa-book fa-lg icon-menu"> </i></a>
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </a>
            </div>
        </div>
        <hr>
    </div>
    <br>
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
            <div class="row">
                <div class="col-md-12">
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('calendar_event_title','Naslov dogodka')}}
                            </div>
                            <div class="col-md-9">
                                {{Form::text('calendar_event_title','',['class' =>'form-control', 'placeholder'=>'Ime'])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('calendar_event_description_short', 'Kratek opis') }}
                            </div>
                            <div class="col-md-9">
                                {{Form::textarea('calendar_event_description_short', '', ['id' => 'description_short-ckeditor', 'class' => 'form-control', 'placeholder' => 'Kratek opis dogodka','rows' => 5])}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('calendar_event_description', 'Opis') }}
                            </div>
                            <div class="col-md-9">
                                {{Form::textarea('calendar_event_description', '', ['id' => 'description-ckeditor', 'class' => 'form-control', 'placeholder' => 'Opis dogodka','rows' => 5])}}
                            </div>
                        </div>
                    </div>
                    <div class='form-group'> 
                        <div class="row"> 
                            <div class="col-md-3"> 
                                {{Form::label('calendar_start_date','Začetek dogodka')}} 
                            </div> 
                            <div class="col-md-3"> 
                                <input type="text" class="form-control" name="calendar_start_date" id="date-start">
                            </div> 
                            <div class="col-md-3"> 
                                <input type="text" class="form-control" name="calendar_start_time" id="time-start">
                            </div> 
                        </div>  
                    </div>
                    <div class='form-group'> 
                        <div class="row"> 
                            <div class="col-md-3"> 
                                {{Form::label('calendar_start_end','Konec dogodka')}} 
                            </div> 
                            <div class="col-md-3"> 
                                <input type="text" class="form-control" name="calendar_end_date" id="date-end">
                            </div> 
                            <div class="col-md-3"> 
                                <input type="text" class="form-control" name="calendar_end_time" id="time-end">
                            </div> 
                        </div>  
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('calendar_event_type_id','Tip dogodka')}}
                            </div>
                            <div class="col-md-9">
                                {!! Form::select('calendar_event_type_id', $calendar_event_types, '', ['class' => 'form-control']) !!}
                            </div>

                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('calendar_event_ownership_id','Tip dogodka')}}
                            </div>
                            <div class="col-md-9">
                                {!! Form::select('calendar_event_ownership_id', $calendar_event_ownerships, '', ['class' => 'form-control']) !!}
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