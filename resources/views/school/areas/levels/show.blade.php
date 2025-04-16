@extends('layouts.school_master')
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
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row"> 
            @if ($school_area->school_area_description_short != null)
                <div class="col-md-12">
                    {!!$school_area->school_area_description_short!!}
                </div>
            @else
                <small>Ni vnešenega opisa . (<a href="/school_areas/areas/{{$school_area->id}}/edit" title="Dodajte opis" class="material-link">Dodajte opis</a>)</small>
            @endif
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card material-card">
            <div class="card-header qaq-card-header">
                <div class="card-icon">
                </div>
                <h3 class="card-title"><a href="/school_areas/areas/{{ $school_area->id }}" class="material-link">Stopnja {!!$school_area_level->school_area_level_number!!} - {!!$school_area_level->school_area_level_name!!}</a> </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        {!!$school_area_level->school_area_level_description!!}
                        <h5>Na {{$school_area_level->school_area_level_number}}. stopnji boste morali. </h5>
                        {!!$school_area_level->school_area_level_do!!}
                    </div>
                    <div class="col-md-4">
                        <img style= "width:100%" src="/storage/school_areas/levels/{{$school_area_level->school_area_level_image}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <div class="card material-card">
            <div class="card-header qaq-card-header">
                <div class="row"> 
                    <div class="d-flex align-items-center justify-content-between bd-highlight" >
                        <div class="bd-highlight">
                            <h4><a href="/school_areas/areas/{{ $school_area->id }}" class="material-link">Odsek A: Kaj morate vedeti!</a></h4>
                        </div>
                        <div class="bd-highlight">
                        </div>
                    </div>
                </div>
            </div>
            @if (count($school_area_level->knows)>0)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($school_area_level->knows as $index => $school_area_level_know)
                                    @if ($index % 2 == 0)
                                        <div class="content-box">
                                            <div class="row"> 
                                                <div class="d-flex align-items-center justify-content-between bd-highlight" >
                                                    <div class="bd-highlight">
                                                        <h5><b>{{ $school_area_level_know->school_area_level_know_title }}</b></h5>
                                                    </div>
                                                    <div class="bd-highlight">
                                                    </div>
                                                </div>
                                            </div>
                                            <i>{{ strtoupper($school_area_level_know->type->school_area_level_know_type_name) }}</i><br>
                                            {!! $school_area_level_know->school_area_level_know_description !!}
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                @foreach ($school_area_level->knows as $index => $school_area_level_know)
                                    @if ($index % 2 != 0)
                                    <div class="content-box">
                                            <div class="row"> 
                                                <div class="d-flex align-items-center justify-content-between bd-highlight" >
                                                    <div class="bd-highlight">
                                                        <h5><b>{{ $school_area_level_know->school_area_level_know_title }}</b></h5>
                                                    </div>
                                                    <div class="bd-highlight">
                                                    </div>
                                                </div>
                                            </div>
                                            <i>{{ strtoupper($school_area_level_know->type->school_area_level_know_type_name) }}</i><br>
                                            {!! $school_area_level_know->school_area_level_know_description !!}
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
            @endif
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <div class="card material-card">
            <div class="card-header qaq-card-header">
                <div class="row">
                    <div class="d-flex align-items-center justify-content-between bd-highlight" >
                        <div class="bd-highlight">
                        <h3 class="card-title"><a href="/school_areas/areas/{{ $school_area->id }}" class="material-link">Odsek B: Kaj morate narediti!</a> </h3>
                        </div>
                        <div class="bd-highlight">
                        </div>
                    </div>
                </div>
            </div>
            @if (count($school_area_level->dos)>0)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-12">
                                @foreach ($school_area_level->dos as $index => $school_area_level_do)
                                    <div class="content-box">
                                        <div class="row"> 
                                            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                                                <div class="bd-highlight">
                                                    <h5><b>{{ $school_area_level_do->school_area_level_do_title }}</b></h5>
                                                </div>
                                                <div class="bd-highlight">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <i>{{ strtoupper('Šola mora:') }}</i><br>
                                                {!! $school_area_level_do->school_area_level_do_must_description !!}
                                            </div>
                                            <div class="col-md-6">
                                                <i>{{ strtoupper('Dokazi') }}</i><br>
                                                @if(count ($school_area_level_do->evidences) >0)
                                                    @foreach ($school_area_level_do->evidences as $school_area_level_do_evidence)
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <li>{{ $school_area_level_do_evidence->school_area_level_do_evidence_name }}</li>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
            @endif
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card material-card">
            <div class="card-header qaq-card-header">
                <div class="row">
                    <div class="d-flex align-items-center justify-content-between bd-highlight" >
                        <div class="bd-highlight">
                            <h3 class="card-title"><a href="/school_areas/areas/{{ $school_area->id }}" class="material-link">Odsek C: Napotki</a> </h3>
                        </div>
                        <div class="bd-highlight">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-6">
                        @if (count($school_area_level->example_activities)>0)
                            @foreach ($school_area_level->example_activities as $school_area_level_example)
                                <div class="content-box">
                                    <div class="row"> 
                                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                                            <div class="bd-highlight">
                                                <h5><b>{{ $school_area_level_example->school_area_level_guide_title }}</b></h5>
                                            </div>
                                            <div class="bd-highlight">
                                            </div>
                                        </div>
                                    </div>
                                    <i>{{ strtoupper($school_area_level_example->type->school_area_level_guide_type_name) }}</i><br>
                                    {!! $school_area_level_example->school_area_level_guide_description !!}
                                </div>
                                <br>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6">
                    @if (count($school_area_level->example_evidences)>0)
                            @foreach ($school_area_level->example_evidences as $school_area_level_example)
                                <div class="content-box">
                                    <div class="row"> 
                                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                                            <div class="bd-highlight">
                                                <h5><b>{{ $school_area_level_example->school_area_level_guide_title }}</b></h5>
                                            </div>
                                            <div class="bd-highlight">
                                            </div>
                                        </div>
                                    </div>
                                    <i>{{ strtoupper($school_area_level_example->type->school_area_level_guide_type_name) }}</i><br>
                                    {!! $school_area_level_example->school_area_level_guide_description !!}
                                </div>
                                <br>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
@endsection