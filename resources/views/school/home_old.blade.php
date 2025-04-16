@extends('layouts.school_master')

@section('content')
<style> 

  .vl {
  border-left: 2px solid green;
}

</style>
@php
    use Carbon\Carbon;
@endphp

<!-- Main -->
<div class="row">
    <div class="col-md-12">
        <div class="card-columns">
            <div class="card school-card">
                <div class="card-header school-card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <img  class="rounded-image" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
                        </div>
                        <div class="col-md-8">
                        <h4>
                            <a href="/school/{{ $school_organization->id }}" title="Prikaži organizacijo" style="color: #000000">
                                {{ $school_organization->school_organization_name_short }}
                            </a>
                        </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{ $school_organization->school_organization_name }}
                        </div>
                    </div>
                    <hr>
                    @if (count($school_areas) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                Aktivna področja šole:
                            </div>
                        </div>
                        @foreach($school_areas as $index => $school_area)
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/school/areas/{{ $school_area->id }}">
                                        <div class="btn btn-info btn-block">    
                                            {{ $school_area->school_area_name }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    @else
                        <p>Trenutno ni nobenih aktivnih področij šole.</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card school-card">
                <div class="card-header school-card-header">
                    <div class="row">
                        <div class="col-md-12">
                        <h4>
                            <a href="/school/areas/" title="Prikaži aktivna področja šole" style="color: #000000">
                                Področja šole
                            </a>
                        </h4>
                        </div>
                    </div>
                </div> 
                <div class="card-body">
                    @if (count($school_areas) > 0)
                        @foreach($school_areas as $index => $school_area)
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="rounded-image" src="/storage/school_areas/{{$school_area->school_area_image}}">
                                </div>
                                <div class="col-md-9">
                                    <a href="/school/areas/{{ $school_area->id }}" class="schoolareas-link">
                                        {{ $school_area->school_area_name }}
                                    </a>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    @else
                        <p>Trenutno ni nobenih področij šole na voljo.</p>
                    @endif
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card school-card">
                <div class="card-header school-card-header">
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4>
                                    <a href="/school/calendars/events/" title="Prikaži aktivna področja šole" style="color: #000000">
                                        Napovednik
                                    </a>
                                </h4>
                            </div>
                            <div class="bd-highlight">
                                <a href="/school/calendars/events/create" title="Dodaj dogodek"><i class="fa fa-plus fa-lg school-icon"> </i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if ($school_events->count() > 0)
                            @foreach($school_events as $date => $events)
                                @php
                                    $formattedDate = Carbon::parse($date)->translatedFormat('l, d. m.');
                                @endphp

                                <div class="row">
                                    <div class="col-md-12">
                                            {{ $formattedDate }}
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        
                                        @foreach($events as $event)
                                            @php
                                                $eventTime = Carbon::parse($event->calendar_event_start_time)->format('H:i');
                                                $eventTitle = $event->calendar_event_title;
                                            @endphp
                                            <div class="row align-items-center">
                                                <div class="col-md-3 d-flex justify-content-center">
                                                    {{ $eventTime }}
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    |
                                                </div>
                                                <div class="col-md-7">
                                                    <a href="/school/calendars/events/{{ $event->id }}" class="schoolareas-link">
                                                        {{ $eventTitle }}
                                                    </a>
                                                    
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>

                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        @else
                            <p>Trenutno ni prihajajočih dogodkov.</p>
                        @endif
                    </div>
                </div>


                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card school-card">
                <div class="card-header school-card-header">
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4>
                                    <a href="/school/calendars/events/" title="Prikaži aktivna področja šole" style="color: #000000">
                                    <i class="fa fa-ticket fa-lg school-icon">  </i> Konference
                                    </a>
                                </h4>
                            </div>
                            <div class="bd-highlight">
                                <a href="/school/calendars/events/create" title="Dodaj konferenco"><i class="fa fa-plus fa-lg school-icon"> </i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if ($school_conferences->count() > 0)
                            @foreach($school_conferences as $date => $events)
                                @php
                                    $formattedDate = Carbon::parse($date)->translatedFormat('l, d. m.');
                                @endphp

                                <div class="row">
                                    <div class="col-md-12">
                                            {{ $formattedDate }}
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        
                                        @foreach($events as $event)
                                            @php
                                                $eventTime = Carbon::parse($event->calendar_event_start_time)->format('H:i');
                                                $eventTitle = $event->calendar_event_title;
                                            @endphp
                                            <div class="row align-items-center">
                                                <div class="col-md-3 d-flex justify-content-center">
                                                    {{ $eventTime }}
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    |
                                                </div>
                                                <div class="col-md-7">
                                                    <a href="/school/calendars/events/{{ $event->id }}" class="schoolareas-link">
                                                        {{ $eventTitle }}
                                                    </a>
                                                    
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>

                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        @else
                            <p>Trenutno ni konferenc.</p>
                        @endif
                    </div>
                </div>


                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card school-card">
                <div class="card-header school-card-header">
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4>
                                    <a href="/school/quality/campaigns" title="Prikaži kampanje" style="color: #000000">
                                        Kampanje
                                    </a>
                                </h4>
                            </div>
                            <div class="bd-highlight">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if ($quality_campaigns->count() > 0)
                            @foreach($quality_campaigns as $quality_campaign)

                                <div class="row">
                                    <div class="col-md-12">
                                        {{ $quality_campaign->quality_campaign_name }}
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        @else
                            <p>Trenutno ni prihajajočih dogodkov.</p>
                        @endif
                    </div>
                </div>


                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
