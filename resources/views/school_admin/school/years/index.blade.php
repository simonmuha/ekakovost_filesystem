 
@extends('layouts.school_admin')

@section('content')

<!-- Add school year to organization -->
<div class="modal fade" id="AddSchoolYearToSchoolnModal" tabindex="-1" role="dialog" aria-labelledby="AddSchoolYearToSchoolnModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\SchoolAdmin\SchoolOrganizationsController@add_school_year_to_school', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="school_organization_id" type="hidden" value="{{$school_organization->id}}"> 
        
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
                <i class="fa fa-calendar-o  fa-lg icon-menu"> </i>
                Šolska leta
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="#" data-target="#AddSchoolYearToSchoolnModal" title="Dodaj izobraževalni program k šoli" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    
    <div class="col-md-12">
        @if (count($school_organization_years) > 0)
            <table style="width: 100%;">
                <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 40%;">
                    <col style="width: 40%;">
                </colgroup>
                <tr>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Šolsko leto
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Trajanje
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;"></th>
                </tr>
                @foreach ($school_organization_years as $school_organization_year)
                    <tr style="border-bottom: 1pt solid black; border-bottom: 1pt solid black; ">
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/school_admin/school/organization/years/{{$school_organization_year->year->id}}" title="Prikaži">{{$school_organization_year->year->school_year_name}}</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ \Carbon\Carbon::parse($school_organization_year->year->school_year_start)->format('d. m. Y') }} - {{ \Carbon\Carbon::parse($school_organization_year->year->school_year_end)->format('d. m. Y') }}
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            @if ($school_organization_year->school_organization_year_current == $school_organization->school_organization_year_id_current)
                            <button class="btn btn-success">
                                Aktivno šolsko leto
                            </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Ni delovnih mest.
        @endif
    </div>
</div>
@endsection
