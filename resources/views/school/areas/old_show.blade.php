@extends('layouts.school')
@section ('content')


<!-- Main -->
<div class="card school-card" style="flex: 0 0 60%;"> 
<img class="card-img-top" src="/storage/schools/areas/{{$school_area->school_area_home_image}}" alt="Card image cap">
    <div class="card-body">
        <div class="row"> 
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">
                    <h4><i class="fa fa-book fa-lg icon-menu"></i> {{$school_area->school_area_name}}</h4>
                </div>
                <div class="bd-highlight">
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
                <small>Ni vnešenega opisa . (<a href="/school_areas/areas/{{$app_area->id}}/edit" title="Dodajte opis" class="school-link">Dodajte opis</a>)</small>
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
                                    {{ $school_area_position->app_position_name }}
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
                        <div class="card school-card">
                            <div class="card-header qaq-card-header">
                                <div class="card-icon">
                                </div>
                                <h3 class="card-title"><a href="/school/areas/levels/{{ $school_area_level->id }}" class="school-link">Stopnja {!!$school_area_level->school_area_level_number!!} - {!!$school_area_level->school_area_level_name!!}</a> </h3>
                            </div> 
                            <div class="card-body">
                                <div class="row">
                                    {!!$school_area_level->school_area_level_description!!}
                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <small>Ni vnešenega nobene stopnje (<a href="/school_areas/areas/levels/create_level_add_to_area/{{$school_area->id}}" title="Dodajte nivo" class="school-link">Dodajte nivo</a>)</small>
        @endif
    </div>
</div>
<br>



@endsection