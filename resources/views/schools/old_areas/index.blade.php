@extends('layouts.app_schoolareas')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-book  fa-lg icon-menu"> </i>
                Področja šole
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="/schools/areas/create" title="Dodaj novo področje"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
            |
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-deck">
            @if (count($school_areas) > 0)
                @foreach($school_areas as $school_area)
                    <div class="card schoolareas-card">
                        <div class="card-header qaq-card-header">
                            <div class="card-icon">
                            </div>
                            <h3 class="card-title"><a href="/schools/areas/{{ $school_area->id }}" class="schoolareas-link">{{ $school_area->school_area_name }}</a> </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            {!! $school_area->school_area_description_short !!}
                            </div>
                        </div>
                        <div class="card-footer">
                            <small><a href="/schools/areas/{{ $school_area->id }}">Preberi več</a></small>
                        </div>
                    </div>
                @endforeach
            @else
                Ni nobenih področij.
            @endif
        </div>
    </div>
</div>
@endsection
