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
                        <h4>App</h4>
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
                            <img class="card-img-top" src="/storage/app/app_image_600x360.jpg" alt="Ikone">
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card admin-card">
                <div class="card-header admin-card-header">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h4><i class="fa fa-building-o   fa-lg icon-menu"> </i> Organizacije </h4>
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
                                <img class="card-img-top" src="/storage/app/organizations/app_organizations_image_600x360.jpg" alt="Ikone">
                            </a>
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
                            <a href="/app/areas" title="Prikaži pomoči" style="color: #000000"><i class="fa fa-crosshairs    fa-lg icon-menu"> </i> Področja aplikacije </a>
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
                                <img class="card-img-top" src="/storage/app/areas/app_areas_image_600x360.jpg" alt="Ikone">
                            </a>
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
                            <a href="/admin/roles" title="Prikaži vloge uporabnikov" style="color: #000000"><i class="fa fa-handshake-o   fa-lg icon-menu"> </i> Vloge uporabnikov </a>
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
                                <img class="card-img-top" src="/storage/admin/roles/admin_roles_image_600x360.jpg" alt="Ikone">
                            </a>
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
                            <a href="/schools/educationalprograms" title="Prikaži šole" style="color: #000000"><i class="fa fa-book  fa-lg icon-menu"> </i> Izobraževalni programi</a>
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
                                <img class="card-img-top" src="/storage/schools/educationalprograms/image_school_educational_program_600x360.jpg" alt="Ikone">
                            </a>
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
                            <a href="/schools/years" title="Prikaži šolska leta" style="color: #000000"><i class="fa fa-calendar-o  fa-lg icon-menu"> </i> Šolska leta</a>
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
                                <img class="card-img-top" src="/storage/schools/years/image_school_years_600x360.jpg" alt="Ikone">
                            </a>
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
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h4>                    
                            <a href="/app/helps" title="Prikaži pomoči" style="color: #000000"><i class="fa fa-info-circle   fa-lg icon-menu"> </i> Pomoč </a>
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
                                <img class="card-img-top" src="/storage/app/helps/app_helps_image_600x360.jpg" alt="Ikone">
                            </a>
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
