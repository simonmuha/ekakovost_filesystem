@extends('layouts.school_admin')
@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-book  fa-lg icon-menu"> </i>
                Izbrana področja šole
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="/school_admin/school/create" title="Dodaj novo organizacijo"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
            |
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-12">
        @if (count($school_areas) > 0)
            <div class="card-columns">
                @foreach ($school_areas as $school_area)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card admin-card h-100">
                                <img class="card-img-top" src="/storage/schools/areas/{{$school_area->school_area_home_image}}" alt="Card image cap">
                                <div class="card-header admin-card-header">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <h5>
                                            {{ $school_area->school_area_name }}
                                        </h5>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!! $school_area->school_area_description_short !!}
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            Ni aktivnih področij šole.
        @endif
        <div class="row">
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">
                    <h4>
                        <i class="fa fa-book  fa-lg icon-menu"> </i>
                        Vsa področja 
                    </h4>
                </div>
                <div class="bd-highlight">
                    <a href="/school_admin/school/create" title="Dodaj novo organizacijo"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
                    |
                    <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
                </div>
            </div>
            <hr>
        </div>
        
        @if (count($school_areas_not_assigned) > 0)
            <div class="card-columns">
                @foreach ($school_areas_not_assigned as $school_area_not_assigned)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card admin-card h-100">
                            <img class="card-img-top" src="/storage/schools/areas/{{$school_area->school_area_home_image}}" alt="Card image cap">
                                <div class="card-header admin-card-header">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <h5>
                                            {{ $school_area_not_assigned->school_area_name }}
                                        </h5>
                                        <div>
                                            <a href="/school_admin/school/areas/add_school_area_to_school/{{ $user_school_active->id }}/{{ $school_area_not_assigned->id }}" "> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!! $school_area_not_assigned->school_area_description_short !!}
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            Ni aktivnih področij šole.
        @endif

    </div>
</div>
@endsection
