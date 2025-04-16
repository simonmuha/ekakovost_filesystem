@extends('layouts.PDF')
@section ('content')
    <address>
        <p></p>
    </address> 
    <main>
        <h3 style="text-align: center;">POROČILO O SLUŽBENI POTI</h3>
        <p>
            <strong>Datum potovanja:</strong> {{ \Carbon\Carbon::parse($calendar_event_report_start_time)->format('d.m.Y') }}<br>
            <strong>Čas odhoda:</strong> {{ \Carbon\Carbon::parse($calendar_event_report_start_time)->format('H:i') }}
        </p>
        <p>
            <strong>Datum prihoda:</strong> {{ \Carbon\Carbon::parse($calendar_event_report_end_time)->format('d.m.Y') }}<br>
            <strong>Čas prihoda:</strong> {{ \Carbon\Carbon::parse($calendar_event_report_end_time)->format('H:i') }}
        </p>
        <p>
            <strong>Relacija potovanja:</strong> {{ $calendar_event_report_relation }}
        </p>


        <p>
            <strong>Vozilo:</strong> 
            @if ($calendar_event_report_is_personal_vehicle)
                {{ $calendar_event_report_transport_personal }}
            @else
                {{ $calendar_event_report_transport_official }} (službeno vozilo)
            @endif
        </p>
        <p>
            <strong>Voznik:</strong> {{ $driver_person_name }} {{ $driver_person_surname }}
        </p>
        <p>
            <strong>Namen potovanja:</strong> {{ $calendar_event_title }}
        </p>
        <p>
            <strong>Poročilo:</strong> 
        </p>
        <p>
            {{ $calendar_event_report_description }}
        </p>
        <p>
            <strong>Zapisal:</strong> {{ $event_owner_name }} {{ $event_owner_surname }}
        </p>
        <div class="header">
            <h3></h3>
        </div>
    </main>
@endsection