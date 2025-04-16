@extends('layouts.user_questionnaire')

@section('content')
<div class="container">
<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>{{ $user_questionnaire->campaign->quality_campaign_name }}</h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
            </a>
        </div>
    </div>
    <hr>
</div>
    <p>{!! $user_questionnaire->campaign->quality_campaign_description !!}</p>
    <div class="text-right">
        <a href="{{ route('user_questionnaire_intro_questionnaire', ['id' => $user_questionnaire->id]) }}" class="btn btn-primary">Začni</a>
    </div>
</div>
@endsection