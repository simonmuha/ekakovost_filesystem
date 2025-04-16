
@extends('layouts.organization_admin')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-info-circle fa-lg icon-menu"> </i>
                Pomoči
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="/app/helps/create" title="Dodaj novo pomoč"><i class="fa fa-plus fa-lg icon-menu"> </i></a>
            |
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    <div class="col-md-12">
        @if (count($app_helps) > 0)
            <table style="width: 100%;">
                <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 40%;">
                    <col style="width: 40%;">
                </colgroup>
                <tr>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Področje
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Ime
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;"></th>
                </tr>
                @foreach ($app_helps as $app_help)
                    <tr style="border-bottom: 1pt solid black;"">
                        <td>
                            <a href="/app/areas/{{$app_help->app_area->id}}" title="Prikaži">{{$app_help->app_area->app_area_name}}</a>
                        </td>
                        <td style="wtext-align: ">
                            <a href="/app/helps/{{$app_help->id}}" title="Prikaži">{{$app_help->app_help_name}}</a>
                            
                        </td>
                        <td style="text-align: center;">
                            <a href="/app/helps/{{$app_help->id}}" title="Prikaži"><i class="fa fa-info fa-lg icon-menu"> </i></a>
                            <a href="/app/helps/{{$app_help->id}}/edit" title="Uredi"><i class="fa fa-pencil-square-o fa-lg icon-menu"> </i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Za to področje aplikacije še ni pripravljenih pomoči.
        @endif
    </div>
</div>
@endsection
