@extends('layouts.school')
@section ('content')

<!-- Main -->
<div class="card school-card" style="flex: 0 0 60%;"> 
    <div class="card-header school-card-header">
        <h4>
            <div class="row"> 
                <div class="d-flex align-items-center justify-content-between bd-highlight" >
                    <div class="bd-highlight">
                        <h4><i class="fa fa-calendar fa-lg icon-menu"></i> {{$calendar_event->calendar_event_title}}</h4>
                    </div>
                    <div class="bd-highlight"> 
                        @if ($calendar_event->person_id == $person->id)
                            <a href="/school/calendars/events/{{ $calendar_event->id }}/edit" title="Uredi dogodek">
                                <i class="fa fa-pencil-square-o fa-lg icon-menu me-2"></i>
                            </a>
                            <!-- Skrit obrazec za brisanje dogodka -->
                            <form id="delete-form-{{ $calendar_event->id }}" action="{{ route('calendar_events.destroy', $calendar_event->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="#" onclick="confirmDelete(event, '{{ $calendar_event->id }}')">
                                <i class="fa fa-trash fa-lg icon-menu"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </h4>
    </div>
    <div class="card-body">
        <div class="row"> 
            <div class="col-md-12" style="text-align: right;">
                <i>{{ $calendar_event->person->person_name }} {{ $calendar_event->person->person_surname }}</i>
            </div>
        </div>
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

<script>
function confirmDelete(event, eventId) {
    event.preventDefault(); // Prepreči privzeto delovanje povezave

    Swal.fire({
        title: 'Ali res želite izbrisati ta dogodek?',
        text: "To dejanje ni mogoče razveljaviti!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Da, izbriši!',
        cancelButtonText: 'Prekliči',
        customClass: {
            popup: 'custom-swal-popup',  
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Sproži obrazec z metodo DELETE
            document.getElementById('delete-form-' + eventId).submit();
        }
    });
}
</script>


@endsection