@extends('layouts.app_schoolareas')
@section ('content')


<!-- Main -->
<div class="card material-card" style="flex: 0 0 60%;"> 
    <div class="card-body">
        <div class="row"> 
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">
                    <h4><i class="fa fa-book fa-lg icon-menu"></i> {{$school_area->school_area_name}}</h4>
                </div>
                <div class="bd-highlight">
                    <a href="{{ url()->previous() }}" title="Nazaj"></a>
                    <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                    <a href="/schools/areas/{{$school_area->id}}/edit" title="Uredi vprašanje"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                    | 
                    <a href="/schools/areas" title="Področja"><i class="fa fa-book fa-lg icon-menu"> </i></a>
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row"> 
            @if ($school_area->school_area_description != null)
                <div class="col-md-12">
                    {!!$school_area->school_area_description!!}
                </div>
            @else
                <small>Ni vnešenega opisa . (<a href="/school/areas/{{$school_area->id}}/edit" title="Dodajte opis" class="material-link">Dodajte opis</a>)</small>
            @endif
            

        </div>
        @if (count($school_area->positions) > 0)
            <hr>
            <div class="row"> 
                <div class="col-md-12">
                    Področje se nanaša na naslednja delovna mesta: 
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($school_area->positions as $school_area_position)
                                <button type="button" class="btn btn-primary m-1">
                                    {{ $school_area_position->school_position_name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr>
        @if (count($school_area_levels) > 0)
            <div class="row">
                <div class="col-md-12">
                <div class="card-columns">
                        @foreach ($school_area_levels as $school_area_level)
                            <div class="card material-card">
                                <div class="card-header qaq-card-header">
                                    <div class="card-icon">
                                    </div>
                                    <h3 class="card-title"><a href="/schools/areas/levels/{{ $school_area->id }}" class="material-link">Stopnja {!!$school_area_level->school_area_level_number!!} - {!!$school_area_level->school_area_level_name!!}</a> </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        {!!$school_area_level->school_area_level_description!!}
                                    </div>
                                </div>
                                <div class="card-footer">1
                                    <small><a href="/schools/areas/levels/1">Več rezultatov</a></small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <small>Ni vnešenega nobene stopnje (<a href="/schools/areas/levels/create_level_add_to_area/{{$school_area->id}}" title="Dodajte nivo" class="material-link">Dodajte nivo</a>)</small>
        @endif
    </div>
</div>
<br>



@endsection