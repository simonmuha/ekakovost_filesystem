<!-- =======================  Blade ============================================ -->

<!-- ---------------------- Vnosni obrazci --------------------------------------------  -->
<input name="school_organization_year_person_id" type="hidden" value="{{$school_organization_year_person->id}}"> 



<!-- ---------------------- Naslov vrstica --------------------------------------------  -->
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>Profil</h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ route('home') }}" title="Domov">
                <i class="fa fa-home fa-lg icon-menu"> </i>
            </a>
        </div>
    </div>
    <hr>
</div>
<!-- ---------------------- Bootstrap - Cards - enaka višina --------------------------------------------  -->

<div class="row d-flex align-items-stretch">
    <div class="col-md-8">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Organizacijske enote
                    </h5>
                    <div>
                        <a href="/app/organizations/create_suborganization/{{$app_organization->id}}">
                            <i class="fa fa-plus fa-lg icon-menu"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Organizacijske enote
                    </h5>
                    <div>
                        <a href="/app/organizations/create_suborganization/{{$app_organization->id}}">
                            <i class="fa fa-plus fa-lg icon-menu"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap ------------------- Card  -->
<div class="row">
    <div class="col-md-12">
        <div class="card admin-card h-100">
            <div class="card-header admin-card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h5>
                        Področja
                    </h5>
                    <div>
                        <a href="#" data-target="#AddAreaToPossitionModal" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>

<!-- Kontroller ------------------- Preusmeritve  -->
return redirect('/users/'. $user->id)
    ->with('error', 'Nimate dostopa'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike


return redirect()->back()->with('error', 'Ni določene aktivne organizacije.');


<!-- Kontroller -------------  Preverjanje dovoljenj -->
$organization_admin_user = Auth::user();
$school_admin_active_person = $school_admin_user->active_person;


$school_admin_active_person_position = $school_admin_active_person->position('schooladmin');



