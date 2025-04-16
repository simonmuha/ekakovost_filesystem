@extends('layouts.school_admin')
@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-object-group  fa-lg icon-menu"> </i>
                Skupine
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="/school_admin/groups/create" title="Dodaj novo organizacijo"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
            |
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-12">
        @if (count($school_groups) > 0)
                @foreach ($school_groups as $school_group)


                @endforeach
        @else
            Ni aktivnih skupin.
        @endif
    </div>
</div>
@endsection
