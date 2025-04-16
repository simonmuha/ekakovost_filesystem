@extends('layouts.app_schoolareas')

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
                                Področja šole
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
                        <h3 class="card-title">Področja</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            Zadnja vprašanja: 
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
