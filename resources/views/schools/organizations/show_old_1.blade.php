@extends('layouts.app_admin')
@section ('content')
<style>
    .tab {
        overflow: hidden;
    }

    .tab button {
        background-color: #f2f2f2;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px 20px;
        transition: 0.3s;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    .tabcontent {
        display: none;
        padding: 20px;
        border: 1px solid #ccc;
    }
</style>


<!-- Add Person to Organization -->
<div class="modal fade" id="AddPersonToOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="AddEducationalProgramToOrganizationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\School\SchoolOrganizationsController@add_person_to_organization', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
        @if ($school_organization_year_current != null)
            <input name="school_organization_year_id" type="hidden" value="{{$school_organization_year_current->id}}">
        @else
            <input name="school_organization_year_id" type="hidden" value="null">
        @endif
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodajte osebo k organizaciji</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                @if ($school_organization_year_current != null)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_year_current','Šolsko leto')}}
                            </div>
                            <div class="col-md-9"> 

                                {{$school_organization_year_current ->year->school_year_name}}
                            </div>
                        </div>
                    </div> 
                @else
                    <small>Šola nima določenega aktivnega leta</small>
                @endif

                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('person_name','Ime:')}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('person_name','',['class' =>'form-control', 'placeholder'=>'Ime'])}}
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('person_surname','Priimek:')}}
                        </div>
                        <div class="col-md-9">
                            {{Form::text('person_surname','',['class' =>'form-control', 'placeholder'=>'Priimek'])}}
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('email','E-naslov:')}}
                        </div>
                        <div class="col-md-9">
                            {{ Form::text('email', '', ['class' =>'form-control', 'placeholder'=>'Vnesi e-naslov', 'type'=>'email']) }}
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                {{Form::submit('Dodaj osebo', ['class' =>'btn btn-primary' ])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>


  <!-- Add person to sub organization -->
<div class="modal fade" id="AddPersonToSubOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="AddPersonToSubOrganizationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\School\SchoolOrganizationsController@add_person_to_suborganization', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
        @if($school_parent_organization_persons_current_year) 
            <input name="school_organization_year_id" type="hidden" value="{{$school_organization_year_current->school_year_id}}"> 
        @endif
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodaj zaposlenega k organizaciji</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('person_id','Šolsko leto:')}}
                        </div>
                        <div class="col-md-9"> 
                            <select type="text" name="person_id" class="form-control" required="required"> 
                                <option value="">Izberite zaposlenega</option> 
                                @if($school_parent_organization_persons_current_year) 
                                    @foreach($school_parent_organization_persons_current_year as $school_parent_organization_person_current_year) 
                                        <?php $item_find = 0; ?>
                                        @foreach($school_organization_persons_current_year as $school_organization_person_current_year) 
                                            @if ($school_organization_person_current_year->person->id == $school_parent_organization_person_current_year->person->id) <?php $item_find = 1; ?> @endif 
                                        @endforeach 
                                        @if ($item_find == 0) <option value="{{$school_parent_organization_person_current_year->person->id}}">{{$school_parent_organization_person_current_year->person->person_name}} {{$school_parent_organization_person_current_year->person->person_surname}}</option>  @endif
                                    @endforeach 
                                @endif 
                            </select> 
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                {{Form::submit('Dodaj zaposlenega', ['class' =>'btn btn-primary' ])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>



<!-- Add Educational program to Organization -->
<div class="modal fade" id="AddEducationalProgramToOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="AddEducationalProgramToOrganizationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\School\SchoolOrganizationsController@add_educational_program_to_organization', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
        @if ($school_organization_year_current != null)
            <input name="school_organization_year_id" type="hidden" value="{{$school_organization_year_current->id}}">
        @else
            <input name="school_organization_year_id" type="hidden" value="null">
        @endif
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodaj izobraževalni program k organizaciji</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                @if ($school_organization_year_current != null)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                {{Form::label('school_year_current','Šolsko leto')}}
                            </div>
                            <div class="col-md-9"> 

                                {{$school_organization_year_current ->year->school_year_name}}
                            </div>
                        </div>
                    </div> 
                @else
                    <small>Šola nima določenega aktivnega leta</small>
                @endif

                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('school_educational_program_id','Izobraževalni program')}}
                        </div>
                        <div class="col-md-9"> 
                            <select type="text" name="school_educational_program_id" class="form-control" required="required"> 
                                <option value="">Izberite izobraževalni program</option> 
                                @if($school_educational_programs) 
                                    @foreach($school_educational_programs as $school_educational_program) 
                                        <?php $educational_program = 1; ?>
                                        @foreach($school_organization->educationalprograms as $school_organization_educational_program) 
                                            @if ($school_educational_program->id == $school_organization_educational_program->id) <?php $educational_program = 0; ?> @endif 
                                        @endforeach 
                                        @if ($educational_program == 1) <option value="{{$school_educational_program->id}}">{{$school_educational_program->school_educational_program_name}}</option>  @endif
                                    @endforeach 
                                @endif 
                            </select> 
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                {{Form::submit('Dodaj izobraževalni program', ['class' =>'btn btn-primary' ])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>

 <!-- Add school year to organization -->
<div class="modal fade" id="AddSchoolYearToOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="AddSchoolYearToOrganizationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\School\SchoolOrganizationYearsController@add_school_year_to_organization', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
        <input name="school_organization_year_current" type="hidden" value="{{$school_organization_year_current}}"> 
        
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodaj šolsko leto k organizaciji</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('school_year_id','Šolsko leto:')}}
                        </div>
                        <div class="col-md-9"> 
                            <select type="text" name="school_year_id" class="form-control" required="required"> 
                                <option value="">Izberite šolsko leto</option> 
                                @if($school_years) 
                                    @foreach($school_years as $school_year) 
                                        <?php $item_find = 0; ?>
                                        @foreach($school_organization->years as $school_organization_year) 
                                            @if ($school_year->id == $school_organization_year->id) <?php $item_find = 1; ?> @endif 
                                        @endforeach 
                                        @if ($item_find == 0) <option value="{{$school_year->id}}">{{$school_year->school_year_name}}</option>  @endif
                                    @endforeach 
                                @endif 
                            </select> 
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                {{Form::submit('Dodaj šolsko leto', ['class' =>'btn btn-primary' ])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>





<!-- Main -->
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <div class="row">
                    <div class="col-md-2">
                        <img style="width: 100%;" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
                    </div>
                    <div class="col-md-10">
                        {{$school_organization->school_organization_name}}
                        @if($school_organization->parent) 
                            (<a href="/schools/organizations/{{$school_organization->parent->id}}" title="Prikaži">{{$school_organization->parent->school_organization_name}}</a>)
                        @endif

                    </div>
                </div>
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
                <i class="fa fa-arrow-circle-left fa-lg icon-menu"></i>
            </a>
            <a href="/schools/organizations/{{$school_organization->id}}/edit" title="Uredi">
                <i class="fa fa-pencil-square-o fa-lg icon-menu"></i>
            </a>
            | 
            <a href="/schools/organizations" title="Šole">
                <i class="fa fa-university fa-lg icon-menu"></i>
            </a>
            <a href="{{ route('home') }}" title="Domov">
                <i class="fa fa-home fa-lg icon-menu"></i>
            </a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-2 text-center">
        
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
    @if($school_organization->school_organization_parent_id == null)
        <div class="row">
            <div class="col-md-9 d-flex justify-content-center">
                @if (count($school_organization->suborganizations) > 0)
                    <div class="row">
                        @foreach ($school_organization->suborganizations as $school_organization_suborganization)
                        <div class="col-md-2">
                            <a href="/schools/organizations/{{$school_organization_suborganization->id}}">
                                <img style= "width:100%" src="/storage/schools/organizations/{{$school_organization_suborganization->school_organization_image}}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-md-3 text-end">

                <a href="/school/organizations/create_suborganization/{{$school_organization->id}}" class="btn btn-secondary">
                    Dodajte enoto
                </a>
            </div>
        </div>
        <hr>
    @endif

    <div class="row">
        <div class="col-md-12">
            @if ($school_organization_year_current)
                
                Aktivno šolsko leto: <a href="/schools/organizations/years/{{$school_organization->id}}"><B>{{ $school_organization_year_current->year->school_year_name}}</B></a>
            @else
                Šola nima določenega šolskega leta. <a href="#" data-target="#AddSchoolYearToOrganizationModal" title="Organizaciji dodaj šolsko leto" data-toggle="modal"> Dodaj šolsko leto. </a>
            @endif
        </div>
    </div>
</div>


<hr>
<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Tab1')">
        <h5>
            <i class="fa fa-book fa-lg icon-menu"> </i> 
            Izobraževalni programi 
            @if ($school_organization_year_current != null)
                ({{$school_organization_year_current ->year->school_year_name}})
            @endif
        </h5>
    </button>
    <button class="tablinks" onclick="openTab(event, 'Tab2')">
        <h5>
            <i class="fa fa-users fa-lg icon-menu"> </i> 
            Zaposleni
            @if ($school_organization_year_current != null)
                ({{$school_organization_year_current ->year->school_year_name}})
            @endif
        </h5>
    </button>
</div>

<div id="Tab1" class="tabcontent">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">

                </div>
                <div class="bd-highlight">
                    @if ($school_organization_year_current != null)
                        <a href="#" data-target="#AddEducationalProgramToOrganizationModal" title="Dodaj izobraževalni program k organizaciji" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
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

<div id="Tab2" class="tabcontent">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-between bd-highlight" >
                <div class="bd-highlight">
                    <h5>
                        
                        
                    </h5>
                </div>
                <div class="bd-highlight">
                    @if ($school_organization_year_current != null)
                        @if($school_organization->school_organization_parent_id == null)
                            <a href="{{ route('schools.organizations.person.create', ['id' => $school_organization->id]) }}"><i class="fa fa-plus fa-lg icon-menu"></i></a> 
                            <a href="{{ route('schools.organizations.person.index', ['id' => $school_organization->id]) }}" title="Vsi zaposleni v organizaciji"><i class="fa fa-users fa-lg icon-menu"></i></a>
                        @else
                            <a href="#" data-target="#AddPersonToSubOrganizationModal" title="Dodaj zaposlenega k organizaciji" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
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



<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>











@endsection