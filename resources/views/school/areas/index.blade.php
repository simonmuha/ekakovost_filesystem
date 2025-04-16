@extends('layouts.school')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card school-card">
            <div class="card-header school-card-header">
                <h4>
                    <i class="fa fa-book  fa-lg icon-menu"> </i>
                    Področja šole
                </h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        @if (count($school_areas) > 0)
            @foreach($school_areas as $school_area)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card school-card h-100">
                            <div class="card-header school-card-header">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <h4>
                                        <a href="/school/areas/{{ $school_area->school_area->id }}" class="school-link">{{ $school_area->school_area->school_area_name }}</a> 
                                    </h4>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="rounded-image" src="/storage/school_areas/{{$school_area->school_area->school_area_image}}" >
                                    </div>
                                    <div class="col-md-10">
                                        {!! $school_area->school_area->school_area_description_short !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 text-start">
                                        <div class="row">
                                            @if ($school_area->school_area->levels->count() > 0)
                                                @foreach ($school_area->school_area->levels->sortBy('school_area_level_number') as $school_area_level)
                                                    <div class="col-md-3 d-flex align-items-stretch"> <!-- d-flex in align-items-stretch za enako višino kartic -->
                                                        <div class="card school-card w-100 h-100 
                                                            {{ $school_area_level->school_area_level_number > $school_area->school_area_level ? 'card-disabled' : '' }}">
                                                            <div class="card-header school-card-header">
                                                                <div class="d-flex justify-content-between align-items-center w-100">
                                                                    <h5>
                                                                        @if ($school_area_level->school_area_level_number > $school_area->school_area_level)
                                                                            {{ $school_area_level->school_area_level_name }}
                                                                        @else
                                                                            <a href="/school/areas/{{ $school_area_level->id }}" class="school-link">
                                                                                {{ $school_area_level->school_area_level_name }}
                                                                            </a> 
                                                                        @endif
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        {!! Str::limit($school_area_level->school_area_level_description, 60, '...') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                Stopnja: {{ $school_area_level->school_area_level_number }} 
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                Področje še nima stopenj.
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                {{ $school_area->school_area_level }} /  {{ count($school_area->school_area->levels) }}
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        @else
            Ni nobenih področij.
        @endif
    </div>
</div>
@endsection
