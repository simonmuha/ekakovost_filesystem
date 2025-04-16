@extends('layouts.app_school')

@section('content')

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<style> 

.card > .card-header + .list-group,
.card > .list-group + .card-footer {
  border-top: 0;
}

.card-header {
  padding: 0.5rem 1rem;
  margin-bottom: 0;
  color: var(--cui-card-cap-color, unset);
  background-color: var(--cui-card-cap-bg, rgba(0, 0, 21, 0.03));
  border-bottom: 1px solid var(--cui-card-border-color, rgba(0, 0, 21, 0.125));
}
.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header-tabs {
  margin-right: -0.5rem;
  margin-bottom: -0.5rem;
  margin-left: -0.5rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.5rem;
  margin-left: -0.5rem;
}

  .card-group > .card:not(:last-child) .card-img-top,
.card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }

  .card-group > .card:not(:first-child) .card-img-top,
.card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .vl {
  border-left: 2px solid green;
}

</style>



@if ($person != null)
    <div class="row">
        <div class="col-md12 col-sm-12">
            
            <div class="img-edit">
            </div>
        </div>
    </div>
@endif

<div class="row">
    
    <div class="col-md-12">
        <div >
        <div class="card-columns">
            
          <div class="card school-card"> 
            <div class="card-header school-card-header">
                <div class="card-icon">
                </div>
                <h3 class="card-title">{{$quality_campaign->quality_campaign_name}}</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  @foreach ($quality_campaign_questionnaire_answers as $quality_campaign_questionnaire_answer => $group)
                    @php
                        $parentQuestion = \App\Models\Quality\QualityQuestion::find($quality_campaign_questionnaire_answer);
                    @endphp
                        <small>{{$parentQuestion->quality_question_name}}</small>
                        @foreach ($group as $answer)
                            @if($answer->quality_answer_value !=null)
                            <div class="row d-flex align-items-center"> 
                              <div class="col-md-1">
                                  <i class="fa {{$answer->person_role->quality_person_role_fontawesome}} fa-lg icon-menu" title="{{$answer->person_role->quality_target_group_name}}"></i>
                              </div>
                              <div class="col-md-10">
                                  <div class="progress">
                                      <div class="progress-bar bg-{{$answer->person_role->quality_person_role_color}}" role="progressbar" style="width: {{$answer->quality_answer_value*25}}%" aria-valuenow="50" aria-valuemin="{{$answer->question->parent->type->quality_question_type_value_min}}" aria-valuemax="{{$answer->question->parent->type->quality_question_type_value_max}}">{{$answer->quality_answer_value}}</div>
                                  </div>
                              </div>
                          </div>
                            @endif
                        @endforeach
                        <div class="row">
                          <br>
                          <hr>
                        </div>
                    @endforeach
                </div>
              </div>
              <div class="card-footer">
                <small><a href="/quality/campaigns/1">Več rezultatov</a></small>
              </div>
            </div>

            <div class="card school-card"> 
              <div class="card-header school-card-header">
                <h3 class="card-title">Aktivne kampanje</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  @if (count($active_quality_campaigns) > 0)
                    @foreach ($active_quality_campaigns as $active_quality_campaign)
                      <div class="col-md-12 col-sm-12">
                        <a href="/quality/campaigns/{{$active_quality_campaign->id}}" title="{{$active_quality_campaign->quality_campaign_name}}">
                        {{$active_quality_campaign->quality_campaign_name}}
                        </a>
                      </div>
                    @endforeach
                  @else
                    Ni aktivne kampanje
                  @endif
                </div>
              </div>
            </div>
            @if ($statistics)
            <div class="card school-card"> 
            <div class="card-header school-card-header">
                  <h3 class="card-title">Zadnji rezultati</h3>
                </div>
                <div class="card-body">
                <div class="row">
                  @foreach ($statistics as $question_id => $statistic)
                      <div class="col-md-12">
                          <small>{{ $statistic['question_name'] }} ({{ $statistic['total_answers'] }} odgovorov):</small>
                          <div class="row d-flex align-items-center">
                              <div class="col-md-1">
                                  <i class="fa {{ $statistic['person_role_fontawsome'] }} fa-lg icon-menu" title="{{ $statistic['person_role'] }}"></i>
                              </div>
                              <div class="col-md-10">
                                  <div class="progress">
                                    <div class="progress-bar bg-{{ $statistic['person_role_color'] }}" role="progressbar" style="width: {{ ($statistic['average_value']) / ( $statistic['max_value']- $statistic['min_value']) * 100 }}%;" aria-valuenow="{{ $statistic['average_value'] }}" aria-valuemin="{{ $statistic['min_value'] }}" aria-valuemax="{{ $statistic['max_value'] }}"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
                </div>
              </div>
            @endif


            <div class="card school-card"> 
            <div class="card-header school-card-header">
                <h3 class="card-title">{{ $person_organization->school_organization_year->year->school_year_name }}</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  @if (count($school_year_campaigns) > 0)
                    @foreach ($school_year_campaigns as $school_year_campaign)
                      <div class="col-md-12 col-sm-12">
                        <a href="/quality/campaigns/{{$school_year_campaign->id}}" title="{{$school_year_campaign->quality_campaign_name}}">
                          {{$school_year_campaign->quality_campaign_name}}
                        </a>
                      </div>
                    @endforeach
                  @else
                    Ni kampanje v šolskem letu
                  @endif
                </div>
              </div>
            </div>

            
            <div class="card school-card"> 
              <div class="card-header school-card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">NPS</h3>
                <span>
                    <i class="fa fa-chevron-up text-success"></i> 7%
                </span>
              </div>
              <div class="card-body">

              <div class="row align-items-center">
                <div class="col-md-8 text-center"> <!-- Dodan razred text-center za poravnavo vodoravno v sredino -->
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-smile-o fa-lg icon-menu text-success" title="Promotorji"></i>
                        </div>
                        <div class="col-md-10">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 94%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">47</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-meh-o fa-lg icon-menu text-warning" title="Nevtralni"></i>
                        </div>
                        <div class="col-md-10">
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">20</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-frown-o fa-lg icon-menu" title="Kritiki"></i>
                        </div>
                        <div class="col-md-10">
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 66%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">35</div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-4 text-center align-middle"> <!-- Dodan razred align-middle za poravnavo vertikalno v sredino -->
                      <span class="{{ 7 < 0 ? 'text-danger' : '' }}" style="font-size: 150%;">14</span>
                  </div>
                </div>
                <br>
                  <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Tip grafikona je črtni grafikon
        data: {
            labels: ['januar', 'Februar', 'Marec', 'April', 'Maj', 'Junij', 'Julij'], // Oznake na osi x
            datasets: [{
                label: 'NPS', // Ime podatkovnega nabora
                data: [-3, 5, 7, 4, 10, 12, 14], // Podatki za prikaz na grafikonu
                borderColor: 'rgba(255, 99, 132, 1)', // Barva črte
                borderWidth: 1, // Debelina črte
                fill: false // Ne zapolni področja pod krivuljo
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true // Začni z oznakami na osi y pri vrednosti 0
                    }
                }]
            },
            // legend: {
            //     display: false, // Skrij legendo
            // }
        }
    });
</script>


@endsection
