
@extends('layouts.app_quality')

@section('content')


<div class="row"> 
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-users fa-lg icon-menu"> </i>
                Seznam zaposlenih
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
    <div class="col-md-2">
        <div class="vl1">
            <div class="card"> 
                <div class="row">
                    <div class="col-md12 col-sm-12">
                        <div class="img-edit">
                            <img style="width: 100%;" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
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
        @if (count($school_organization_persons) > 0)
            Šolsko leto: {{  $school_organization->current_year ($school_organization->id)->year->school_year_name }}
            <table style="width: 100%;">
                <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 40%;">
                    <col style="width: 40%;">
                </colgroup>
                <tr>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Zaposleni
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Vloge
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;"></th>
                </tr>
                @foreach ($school_organization_persons as $school_organization_person)
                    <tr style="border-bottom: 1pt solid black;"">
                        <td>
                            <a href="/schools/organizations/persons/{{$school_organization_person->id}}" title="Prikaži">{{$school_organization_person->person->person_name}} {{$school_organization_person->person->person_surname}}</a>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach ($school_organization_person->person->user->roles as $role)
                                        <span class="badge badge-secondary">{{ $role->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <a href="/schools/educationalprograms/{{$school_organization_person->id}}/edit" title="Uredi"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Organizacija nima zaposlenih.
        @endif
    </div>
</div>
@endsection
