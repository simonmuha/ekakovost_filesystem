
@extends('layouts.app_school')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-university fa-lg icon-menu"> </i>
                Šole
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="/schools/organizations/create" title="Dodaj novo šolo"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
            |
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    
    <div class="col-md-12">
        @if (count($school_organizations) > 0)
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
                        Organizacija
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;"></th>
                </tr>
                @foreach ($school_organizations as $school_organization)
                    <tr style="border-bottom: 1pt solid black;"">
                        <td>
                            <img style= "width:100%" src="/storage/schools/organizations/{{$school_organization->school_organization_image}}">
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/schools/organizations/{{$school_organization->id}}" title="Prikaži">{{$school_organization->school_organization_name}}</a>

                                    @if (count($school_organization->suborganizations) > 0)
                                        @foreach ($school_organization->suborganizations as $school_organization_suborganization)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="/schools/organizations/{{$school_organization_suborganization->id}}">
                                                        <img style= "width:100%" src="/storage/schools/organizations/{{$school_organization_suborganization->school_organization_image}}">
                                                    </a>
                                                </div>
                                                <div class="col-md-10">
                                                    <a href="/schools/organizations/{{$school_organization_suborganization->id}}" title="Prikaži">{{$school_organization_suborganization->school_organization_name}}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <a href="/school/organizations/{{$school_organization->id}}/edit" title="Uredi"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Ni aktivnih šol.
        @endif
    </div>
</div>
@endsection
