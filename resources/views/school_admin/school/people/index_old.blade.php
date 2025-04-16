@extends('layouts.school_admin_master')
@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-building-o  fa-lg icon-menu"> </i>
                Uporabniki šole
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="/app/organizations/create" title="Dodaj novo organizacijo"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
            |
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    
    <div class="col-md-12">
        @if (count($school_organization_people) > 0)
            <table style="width: 100%;">
                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 40%;">
                    <col style="width: 40%;">
                    <col style="width: 20%;">
                </colgroup>
                <tr>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                            
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Ime
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        e-naslov
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">

                    </th>
                </tr>
                @foreach ($school_organization_people as $school_organization_person)
                    <tr style="border-bottom: 1pt solid black;"">
                        <td>
                            <img style= "width:100%" src="/storage/app/organizations/{{$school_organization_person->school_organization_image}}">
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/school_admin/school/people/{{$school_organization_person->id}}" title="Prikaži">{{$school_organization_person->person_name}}</a>

                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <a href="/school_admin/school/people/{{$school_organization_person->id}}" title="Prikaži">{{$school_organization_person->person_email}}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Ni aktivnih uporabnikov.
        @endif
    </div>
</div>
@endsection
