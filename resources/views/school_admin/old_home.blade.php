@extends('layouts.school_admin')

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
                    <div class="row">
                        <div class="col-md-4">
                            <img style="width: 100%;" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
                        </div>
                        <div class="col-md-8">
                        <h4>
                            <a href="/school_admin/companies/" title="Prikaži organizacijo" style="color: #000000">
                                {{ $school_organization->school_organization_name_short }}
                            </a>
                        </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                <a href="/organization_admin/companies/" title="Preberi več">
                                </a>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $school_organization->school_organization_name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card admin-card">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h4>                    
                            <a href="/admin/users" title="Prikaži uporabnike" style="color: #000000"><i class="fa fa-users  fa-lg icon-menu"> </i> Uporabniki aplikacije</a>
                        </h4>

                        <div>
                            <a href="{{ url()->previous() }}" title="Nazaj">
                                <a href="/app/" title="Uredi"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/admin/roles" title="Preberi več">
                                <img class="card-img-top" src="/storage/admin/users/admin_users_image_600x360.jpg" alt="Ikone">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card admin-card">
                <div class="card-header admin-card-header">
                    <div class="row">
                        <div class="col-md-12">
                        <h4>
                            Šolsko leto
                        </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                <a href="/organization_admin/companies/" title="Preberi več">
                                </a>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            Aktivno šolsko leto: <b>{{ $school_organization->active_year->Year->school_year_name }}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
