@extends('layouts.app_quality')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-university fa-lg icon-menu"> </i>
                Nadzorna plošča šola
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
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-columns">
                    <div class="card bg-light border-success"> 
                        <a href="/schools/organizations/persons" title="Preberi več">
                            <img class="card-img-top" src="/storage/schools/organizations/persons/school_organization_persons_image_600x360.jpg" alt="Ikone">
                        </a>
                        <p class="card-text">
                            <div class='row'>
                                <div class="col-md-12">
                                    <h4> 
                                        <a href="/schools/organizations/persons" title="Prikaži zaposlene" style="color: #000000"><i class="fa fa-users  fa-lg icon-menu"> </i> Zaposleni </a>
                                    </h4>
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="card bg-light border-success">
                        <a href="/schools/organizations/educationalprograms" title="Preberi več">
                            <img class="card-img-top" src="/storage/schools/educationalprograms/image_school_educational_program_600x360.jpg" alt="Ikone">
                        </a>
                        <p class="card-text">
                            <div class='row'>
                                <div class="col-md-12">
                                    <h4> 
                                        <a href="/schools/organizations/educationalprograms/" title="Prikaži šole" style="color: #000000"><i class="fa fa-book  fa-lg icon-menu"> </i> Izobraževalni programi</a>
                                    </h4>
                                </div>
                            </div>
                        </p>
                    </div>
                   
                    <div class="card bg-light border-success">
                        <a href="/quality/targetgroups" title="Preberi več">
                            <img class="card-img-top" src="/storage/quality/targetgroups/target_group_image_600x360.jpg" alt="Ikone">
                        </a>
                        <p class="card-text">
                            <div class='row'>
                                <div class="col-md-12">
                                    <h4> 
                                        <a href="/quality/targetgroups/" title="Prikaži šole" style="color: #000000"><i class="fa fa-bullseye  fa-lg icon-menu"> </i> Ciljne skupine </a>
                                    </h4>
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="card bg-light border-success">
                        <a href="/quality/targetgroups" title="Preberi več">
                            <img class="card-img-top" src="/storage/quality/personroles/personroles_600x360.jpg" alt="Ikone">
                        </a>
                        <p class="card-text">
                            <div class='row'>
                                <div class="col-md-12">
                                    <h4> 
                                        <a href="/quality/personroles/" title="Prikaži šole" style="color: #000000"><i class="fa fa-users fa-lg icon-menu"> </i> Vloge oseb </a>
                                    </h4>
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
                                <div class="col-md-12">
                                    <h4> 
                                        <a href="/quality/questions/types/" title="Prikaži šole" style="color: #000000"><i class="fa fa-file-text-o fa-lg icon-menu"> </i> Tipi vprašanj </a>
                                    </h4>
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="card bg-light border-success">
                        <a href="/school/roles" title="Preberi več">
                            <img class="card-img-top" src="/storage/schools/organizations/school_organizations_image_600x360.jpg" alt="Ikone">
                        </a>
                        <p class="card-text">
                            <div class='row'>
                                <div class="col-md-12">
                                    <h4> 
                                        <a href="/schools/organizations" title="Prikaži šole" style="color: #000000"><i class="fa fa-university  fa-lg icon-menu"> </i> Moje šole </a>
                                    </h4>
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
