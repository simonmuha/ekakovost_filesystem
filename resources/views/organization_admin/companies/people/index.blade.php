@extends('layouts.organization_admin')
@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-building-o  fa-lg icon-menu"> </i>
                Uporabniki
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
    @if (count($app_organization_people) > 0)
    <table style="width: 100%;">
        <colgroup>
            <col style="width: 20%;">
            <col style="width: 60%;">
            <col style="width: 20%;">
        </colgroup>
        <thead>
            <tr>
                <th style="text-align: center; border-bottom:1pt solid black;">
                    Ime
                </th>
                <th style="text-align: center; border-bottom:1pt solid black;">
                    Delovna mesta
                </th>
                <th style="text-align: center; border-bottom:1pt solid black;">
                    Opombe
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($app_organization_people as $index => $app_organization_person)
                <tr style="border-bottom: 1pt solid black; background-color: {{ $index % 2 == 0 ? '#EDEDED' : '#ffffff' }};">
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="/organization_admin/companies/people/{{$app_organization_person->id}}" title="Prikaži">
                                    {{ $app_organization_person->person_name }} {{ $app_organization_person->person_surname }}
                                </a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            @if (count($app_organization_person->positions) > 0)
                                @foreach ($app_organization_person->positions as $person_position)
                                    {{ $person_position->app_position_name }}
                                    @if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </td>
                    <td class="text-center">
                        Opombe
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Ni uporabnikov aplikacije.
@endif

@endsection
