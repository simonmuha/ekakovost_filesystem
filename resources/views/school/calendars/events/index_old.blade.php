@extends('layouts.school')
@section ('content')

@php
    use Carbon\Carbon;
@endphp

<!-- Main -->
<div class="row">
    <div class="col-md-12">
        <div class="card school-card">
            <div class="card-header school-card-header">
                <h4>
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4><i class="fa fa-calendar fa-lg icon-menu"></i> Koledar dogodkov</h4>
                            </div>
                            <div class="bd-highlight">
                                <a href="/school/calendars/events/create" title="Dodaj dogodek"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
                            </div>
                        </div>
                    </div>
                </h4>
            </div>
        </div>
    </div>
</div>
<br>

@if (count($eventsByDateAndTime) > 0)
    @foreach($eventsByDateAndTime as $date => $eventsByTime)
        @php
            $formattedDate = Carbon::parse($date)->translatedFormat('l, d. m.');
        @endphp
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card school-card h-100">
                    <div class="card-header school-card-header">
                        <div class="d-flex align-items-center">
                                {{ $formattedDate }}
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($eventsByTime as $time => $events)
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>{{ Carbon::parse($time)->format('H:i') }}</h5>
                                </div>
                                <div class="col-md-10">
                                    @foreach($events as $event)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="/school/calendars/events/{{ $event->id }}" class="schoolareas-link">
                                                    {{ $event->calendar_event_title }}
                                                </a>
                                            </div>
                                            <div class="col-md-1">
                                                @if ($person->id == $event->person_id)
                                                    <a href="/school/calendars/events/{{$event->id}}/edit" title="Uredi">
                                                        <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p>Trenutno ni prihajajočih dogodkov.</p>
@endif



@endsection