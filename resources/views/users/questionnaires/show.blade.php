@extends('layouts.user_questionnaire')
@section ('content')


<!-- Main -->

<div class="row">
    <div class="d-flex align-items-center justify-content-between bd-highlight" >
        <div class="bd-highlight">
            <h4>Vprašalnik</h4>
        </div>
        <div class="bd-highlight">
            <a href="{{ url()->previous() }}" title="Nazaj">
            </a>
        </div>
    </div>
    <hr>
</div>
{!! Form::open(['action' => 'App\Http\Controllers\User\UserQuestionnairesController@user_questionnaire_store', 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
<input name="quality_campaign_id" type="hidden" value="{{$user_questionnaire->quality_campaign_id}}"> 
<input name="quality_person_role_id" type="hidden" value="{{$user_questionnaire->quality_person_role_id}}"> 
    @csrf

    @foreach ($quality_campaign_questions as $question)
    <div class="question">
        <br>
        <label for="question{{ $question->id }}">{{ $question->quality_question_name }}</label>
        <p>{{ $question->quality_question_description }}</p>

        @foreach ($question->type->options as $option)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question{{ $question->id }}" id="option{{ $option->id }}" value="{{ $option->quality_question_type_option_value }}" required>
            <label class="form-check-label" for="option{{ $option->id }}">
                {{ $option->quality_question_type_option_name }}
            </label>
        </div>
        @endforeach
    </div>
    @endforeach
    <hr>
{{Form::submit('Pošlji', ['class' =>'btn btn-primary' ])}}
{!! Form::close() !!}


@endsection