@extends('layouts.app_quality')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-cog fa-lg icon-menu"> </i>
                Nastavitve
            </h4>
        </div>
        <div class="bd-highlight">
            |
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="vl1">
            <div class="card"> 

                <div class="row">
                    <div class="col-md12 col-sm-12">
                            <div class="img-edit">
                                <img style= "width:100%" src="/storage/settings/settings_600x360.jpg">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="col-md-10">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="card-columns">
                        <div class="card bg-light border-success">
                            <a href="/quality/questions/types" title="Preberi več">
                                <img class="card-img-top" src="/storage/quality/targetgroups/target_group_image_600x360.jpg" alt="Ikone">
                            </a>
                            <p class="card-text">
                                <div class='row'>
                                    <div class="col-md-9">
                                        <h4> 
                                            <a href="/quality/targetgroups" title="Tipi vprašanj" style="color: #000000"><i class="fa fa-bullseye   fa-lg icon-menu"> </i> Ciljne skupine</a>
                                        </h4>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="card bg-light border-success">
                            <a href="/quality/personroles" title="Preberi več">
                                <img class="card-img-top" src="/storage/quality/personroles/personroles_600x360.jpg" alt="Ikone">
                            </a>
                            <p class="card-text">
                                <div class='row'>
                                    <div class="col-md-9">
                                        <h4> 
                                            <a href="/quality/personroles" title="Prikaži vloge" style="color: #000000"><i class="fa fa-users  fa-lg icon-menu"> </i> Vloge oseb </a>
                                        </h4>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="card bg-light border-success">
                            <a href="/quality/questions/types" title="Preberi več">
                                <img class="card-img-top" src="/storage/quality/questions/types/questiontypes_600 x 360.jpg" alt="Ikone">
                            </a>
                            <p class="card-text">
                                <div class='row'>
                                    <div class="col-md-9">
                                        <h4> 
                                            <a href="/quality/questions/types" title="Tipi vprašanj" style="color: #000000"><i class="fa fa-file-text-o   fa-lg icon-menu"> </i> Tipi vprašanj </a>
                                        </h4>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </p>
                        </div>
                            
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection
