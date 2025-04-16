<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card bg-light border-success">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h5>
                                    <i class="fa fa-book fa-lg icon-menu"> </i> 
                                    Izobraževalni programi 
                                    @if ($school_organization_year_current != null)
                                        ({{$school_organization_year_current ->year->school_year_name}})
                                    @endif
                                </h5>
                            </div>
                            <div class="bd-highlight">
                                @if ($school_organization_year_current != null)
                                    <a href="#" data-target="#AddEducationalProgramToOrganizationModal" title="Dodaj izobraževalni program k organizaciji" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($school_organization_year_current != null)
                    @if(count($school_organization_educational_programs_current_year) >0) 
                    <table style="width: 100%;">
                        <colgroup>
                            <col style="width: 100%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th style="text-align: center; border-bottom:1pt solid black;">
                                    Ime programa
                                </th>
                            </tr>
                        </thead>
                        @foreach($school_organization_educational_programs_current_year as $school_organization_educational_program_current_year) 
                            
                                <tbody>
                                        <tr style="border-bottom: 1pt solid black;">
                                            <td style="text-align: center;">
                                                <a href="/schools/organizations/educationalprograms/{{$school_organization_educational_program_current_year->id}}">
                                                    {{$school_organization_educational_program_current_year->educationalprogram->school_educational_program_name}}
                                                </a>
                                            </td>
                                        </tr>
                                </tbody>
                        @endforeach

                        </table>
                    @else
                        <small>Šola še nima dodanih izobraževalnih programov.</small>
                    @endif
                @else
                    <small>Šola še nima določenega aktivnega leta.</small>
                @endif
                    </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-light border-success">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h5>
                                    <i class="fa fa-users fa-lg icon-menu"> </i> 
                                    Zaposleni
                                    @if ($school_organization_year_current != null)
                                        ({{$school_organization_year_current ->year->school_year_name}})
                                    @endif
                                </h5>
                            </div>
                            <div class="bd-highlight">
                                @if ($school_organization_year_current != null)
                                    @if($school_organization->school_organization_parent_id == null)
                                        <a href="#" data-target="#AddPersonToOrganizationModal" title="Dodaj zaposlenega k organizaciji" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                    @else
                                        <a href="#" data-target="#AddPersonToSubOrganizationModal" title="Dodaj zaposlenega k organizaciji" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($school_organization_year_current != null)
                    @if(count($school_organization_persons_current_year) >0) 
                    <table style="width: 100%;">
                        <colgroup>
                            <col style="width: 100%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th style="text-align: center; border-bottom:1pt solid black;">
                                    Zaposleni
                                </th>
                            </tr>
                        </thead>
                        @foreach($school_organization_persons_current_year as $school_organization_person_current_year) 
                                <tbody>
                                        <tr style="border-bottom: 1pt solid black;">
                                            <td style="text-align: center;">
                                                <a href="/schools/organizations/persons/{{$school_organization_person_current_year->id}}">
                                                    {{$school_organization_person_current_year->person->person_name}} {{$school_organization_person_current_year->person->person_surname}}
                                                </a>
                                            </td>
                                        </tr>
                                </tbody>
                        @endforeach

                        </table>
                    @else
                        <small>Šola še nima dodanih zaposlenih.</small>
                    @endif
                @else
                    <small>Šola še nima določenega aktivnega leta.</small>
                @endif
                    </div>
        </div>
    </div>
</div>