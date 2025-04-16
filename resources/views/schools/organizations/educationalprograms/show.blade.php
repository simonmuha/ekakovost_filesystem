@extends('layouts.app_quality')
@section ('content')

<!-- Add Class to Organization Educational Program -->
<div class="modal fade" id="AddClassToOrganizationEducationalProgramModal" tabindex="-1" role="dialog" aria-labelledby="AddClassToOrganizationEducationalProgramModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\School\SchoolOrganizationEducationalProgramClassesController@add_class_to_organization_educational_program', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="school_organization_educational_program_id" type="hidden" value="{{$school_organization_educational_program->id}}"> 
        
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodaj oddelek k izobraževalnemu programu v organizaciji</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            Izobraževalni program:
                        </div>
                        <div class="col-md-9"> 
                            {{$school_organization_educational_program->educationalprogram->school_educational_program_name}}
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            Letnik:
                        </div>
                        <div class="col-md-9"> 
                            <select type="text" name="class_year" class="form-control" required="required"> 
                                <option value="">Izberite letnik</option> 
                                @for ($i = 0; $i < $school_organization_educational_program->educationalprogram->type->school_educational_program_type_years ; $i++)
                                    <option value="{{$i+1}}">{{$i+1}}</option>
                                @endfor
                            </select> 
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            Oddelek:
                        </div>
                        <div class="col-md-9"> 
                            {{ Form::text('class_name', '', ['class' =>'form-control', 'placeholder'=>'oddelek', 'maxlength' => 5]) }}
                            @error('class_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                {{Form::submit('Dodaj oddelek', ['class' =>'btn btn-primary' ])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>


<!-- Main -->

<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>{{$school_organization_educational_program->educationalprogram->school_educational_program_name}} ({{$school_organization_educational_program->year->year->school_year_name}})</h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
                <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                <a href="/schools/organizations/educationalprograms/{{$school_organization_educational_program->id}}/edit" title="Uredi"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                | 
                <a href="/schools/organizations/educationalprograms" title="Izobraževalni programi"><i class="fa fa-university fa-lg icon-menu"> </i></a>
                <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
            </a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
<div class="col-md-3">
        Šola:
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                {{$school_organization_educational_program->organization->school_organization_name}}
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-3">
        Vrsta programa:
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                {{$school_organization_educational_program->educationalprogram->type->school_educational_program_type_name}} (SOK {{$school_organization_educational_program->educationalprogram->type->school_educational_program_type_SOK}})
            </div>
        </div>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        Število let izobraževanja:
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                {{$school_organization_educational_program->educationalprogram->type->school_educational_program_type_years}}
            </div>
        </div>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-md-3 text-center">
        Oddelki:
    </div>
    <div class="col-md-7">
    @if($organization_educational_program_classes->isEmpty())
        <p>Ta izobraževalni program nima oddelkov.</p>
    @else
        <div>
            @foreach($organization_educational_program_classes as $organization_educational_program_class)
                <button type="button" class="btn btn-primary">{{$organization_educational_program_class->class_year}}. {{$organization_educational_program_class->class_name}}</button>
            @endforeach
        </div>
    @endif
        
    </div>
    <div class="col-md-2">
        <a href="#" data-target="#AddClassToOrganizationEducationalProgramModal" title="Dodaj oddelek v program" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
    </div>
</div>
<hr>


@endsection