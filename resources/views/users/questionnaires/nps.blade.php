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
<div class="row">
</div>

<p>{!! $quality_questionnaire_nps->quality_questionnaire_intro !!}</p>

{!! Form::open(['route' => ['user_questionnaire_store_nps', $user_questionnaire->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<input name="user_questionnaire_id" type="hidden" value="{{ $user_questionnaire->id }}">
@csrf

@foreach ($quality_questions as $quality_question)
    <div class="question">
        <br>
        <label for="question{{ $quality_question->id }}"><b>{{ $quality_question->quality_question_name }}</b></label>
        <p><small>{{ $quality_question->quality_question_description }}</small></p>

        @foreach ($quality_question->type->options as $option)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question{{ $quality_question->id }}" id="option{{ $option->id }}" value="{{ $option->quality_question_type_option_value }}" required>
            <label class="form-check-label" for="option{{ $option->id }}">
                {{ $option->quality_question_type_option_name }}
            </label>
        </div>
        @endforeach
    </div>
@endforeach
<hr>
<div class="d-flex justify-content-end">
    {{ Form::submit('Pošlji', ['class' => 'btn btn-primary']) }}
</div>
{!! Form::close() !!}
    
@endsection