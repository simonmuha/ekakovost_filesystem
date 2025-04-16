@extends('layouts.organization_admin')

@section('content')
<style> 

  .vl {
  border-left: 2px solid green;
}

</style>


<!-- Main -->
<div class="row">
    <div class="col-md-12">
        <div class="card-columns">
            <div class="card admin-card">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="row">
                            <div class="col-md-3">
                                <img style="width: 100%;" src="/storage/app/organizations/{{$app_organization->app_organization_image}}">
                            </div>
                            <div class="col-md-9">
                                <h5>
                                    <a href="/organization_admin/companies/{{$app_organization->id}}" title="Preberi več">
                                        {{ $app_organization->app_organization_name }}
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    @if (count ($app_organization->suborganizations)>0)
                    <div class="row">
                        @foreach ($app_organization->suborganizations as $index => $app_suborganization)
                            <div class="col-md-4">
                                <a href="/organization_admin/companies/{{$app_suborganization->id}}" title="Preberi več">
                                    <img style="width: 100%;" src="/storage/app/organizations/{{$app_suborganization->app_organization_image}}">
                                </a>
                            </div>
                            
                            @if (($index + 1) % 3 == 0)
                                </div>
                                <br>
                                <div class="row">
                                
                            @endif
                        @endforeach
                            </div>
                        @endif
                    
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            Število uporabnikov: {{ count($app_organization->people) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card admin-card">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h4>                    
                            <a href="/organization_admin/companies/people" title="Prikaži uporabnike" style="color: #000000"><i class="fa fa-users  fa-lg icon-menu"> </i> Uporabniki aplikacije</a>
                        </h4>

                        <div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/organization_admin/companies/people" title="Preberi več">
                                <img class="card-img-top" src="/storage/admin/users/admin_users_image_600x360.jpg" alt="Ikone">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            Število uporabnikov: {{ count($app_organization->people) }}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
