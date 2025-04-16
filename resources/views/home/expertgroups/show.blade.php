@extends('layouts.app_qaq')

@section('content')

<style> 

  .vl {
  border-left: 2px solid green;
}

</style>


<div class="row">
    <div class="col-md-2">
        <div class="row">
            <div class="col-md12 col-sm-12">
                <div class="card qaq-card" style="border: none;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md12 col-sm-12">
                                Ustvarjajte in upravljajte vprašanja ter sestavljajte vprašalnike za ocenjevanje kakovosti izobraževalnega procesa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
            </div>
        </div>
    <br>
    </div>
    <div class="col-md-10">
        <div class="vl">
            <div class="card-columns">
                <div class="card qaq-card">
                    <div class="card-header qaq-card-header">
                        <div class="card-icon">
                        </div>
                        <h3 class="card-title">Zadnje aktivnosti</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            Zadnja vprašanja: 
                            @if($quality_questions_last->count())
                                    @foreach($quality_questions_last as $quality_question)
                                        <a href="/quality/questions/{{ $quality_question->id }}">{{ $quality_question->quality_question_name }}</a>
                                    @endforeach
                            @else
                                <p>Ni vprašanj za prikaz.</p>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><a href="/quality/campaigns/1">Več rezultatov</a></small>
                    </div>
                </div>
                <div class="card qaq-card">
                    <div class="card-header qaq-card-header">
                        <div class="card-icon">
                        </div>
                        <h3 class="card-title">Vprašanja</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            Število vprašanj: {{ $quality_questions->count() }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><a href="/quality/campaigns/1">Več rezultatov</a></small>
                    </div>
                </div>
                <div class="card qaq-card">
                    <div class="card-header qaq-card-header">
                        <div class="card-icon">
                        </div>
                        <h3 class="card-title">Vprašalniki</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            Število vprašalnikov: {{ $quality_questionnaires->count() }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><a href="/quality/campaigns/1">Več rezultatov</a></small>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>



@endsection
