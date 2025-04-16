 
@extends('layouts.school_admin')

@section('content')




 <!-- Main -->
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>
                <i class="fa fa-book  fa-lg icon-menu"> </i>
                Izobraževalni programi
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
        @if (count($school_educational_programs) > 0)
            <table style="width: 100%;">
                <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 40%;">
                    <col style="width: 40%;">
                </colgroup>
                <tr>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Izobraževalni program
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;">
                        Trajanje
                        <br>
                    </th>
                    <th style="text-align: center; border-bottom:1pt solid black;"></th>
                </tr>
                @foreach ($school_educational_programs as $school_educational_program)
                    <tr style="border-bottom: 1pt solid black; border-bottom: 1pt solid black; ">
                        <td ">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/school_admin/school/organization/years/{{$school_educational_program->id}}" title="Prikaži">{{$school_educational_program->school_educational_program_name}}</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-12">
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
