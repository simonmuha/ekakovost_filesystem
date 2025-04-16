
@extends('layouts.organization_admin')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-info-circle fa-lg icon-menu"> </i>
                Delovna mesta
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-12">
        V izdelavi
    </div>
</div>
@endsection
