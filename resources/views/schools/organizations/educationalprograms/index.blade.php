
@extends('layouts.app_quality')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-book fa-lg icon-menu"> </i>
                Izobraževalni programi na šoli {{$school_organization->school_organization_name}}
            </h4>
        </div>
        <div class="bd-highlight"> 
            <a href="/schools/organizations/educationalprograms/create" title="Dodaj šoli izobraževalni program"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
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
                            <img style= "width:100%" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
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
        @if (count($school_organization_educationalprograms) > 0)
            Šolsko leto: {{  $school_organization->current_year ($school_organization->id)->year->school_year_name }}
            <table style="width: 100%;">
                <colgroup>
                    <col style="width: 5%;">
                    <col style="width: 40%;">
                    <col style="width: 55%;">
                </colgroup>
                <tr>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Izobraževalni program
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;"></th>
                </tr>
                @foreach ($school_organization_educationalprograms as $school_organization_educationalprogram)
                    <tr style="border-bottom: 1pt solid black;"">
                        <td>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/schools/organizations/educationalprograms/{{$school_organization_educationalprogram->id}}" title="Prikaži">{{$school_organization_educationalprogram->educationalprogram->school_educational_program_name}}</a>

                                    
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <a href="/schools/educationalprograms/{{$school_organization_educationalprogram->id}}/edit" title="Uredi"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Ni aktivnih izobraževalnih programov.
        @endif
    </div>
</div>
@endsection
