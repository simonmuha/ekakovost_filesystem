
@extends('layouts.school_admin')

@section('content')


<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-align-center fa-lg icon-menu"> </i>
                Delovna mesta
            </h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ route('home') }}" title="Domov"><i class="fa fa-home fa-lg icon-menu"> </i></a>
        </div>
    </div>
    <hr>
</div>
<div class="row">
    
    <div class="col-md-12">
        @if (count($app_positions) > 0)
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
                        Delovno mesto
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;"></th>
                </tr>
                @foreach ($app_positions as $app_position)
                    <tr style="border-bottom: 1pt solid black;"">
                        <td>
                            
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/school_admin/app/positions/{{$app_position->id}}" title="Prikaži">{{$app_position->app_position_name}}</a>

                                    @if (($app_position->subpositions && count($app_position->subpositions) > 0))
                                        @foreach ($app_position->subpositions as $app_position_subposition)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="/app/positions/{{$app_position_subposition->id}}">
                                                        
                                                    </a>
                                                </div>
                                                <div class="col-md-10">
                                                    <a href="/app/positopns/{{$app_position_subposition->id}}" title="Prikaži">{{$app_position_subposition->app_position_name}}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
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
