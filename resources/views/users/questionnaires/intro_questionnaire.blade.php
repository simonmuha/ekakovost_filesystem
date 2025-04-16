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

<h4>Splošna vprašanja.</h4>
    <p>
        Preden začnete z odgovarjanjem na glavni del ankete, vas prosimo, da izpolnite nekaj demografskih vprašanj. Ta vprašanja nam bodo pomagala bolje razumeti ozadje naših udeležencev in omogočila natančnejšo analizo rezultatov. Vaši odgovori bodo obravnavani zaupno in uporabljeni izključno za statistične namene.
    </p>
</div>


{!! Form::open(['route' => ['user_questionnaire_start', $user_questionnaire->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

<input name="user_questionnaire_id" type="hidden" value="{{ $user_questionnaire->id }}">
@csrf
@if ($quality_intro_questionnaire != null)

    @foreach ($quality_intro_questionnaire->questions as $quality_intro_questionnaire_question)
        <div class="question">
            <br>
            <label for="question{{ $quality_intro_questionnaire_question->id }}">{{ $quality_intro_questionnaire_question->quality_question_name }}</label>
            <p>{{ $quality_intro_questionnaire_question->quality_question_description }}</p>

            @foreach ($quality_intro_questionnaire_question->type->options as $option)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question{{ $quality_intro_questionnaire_question->id }}" id="option{{ $option->id }}" value="{{ $option->quality_question_type_option_value }}" required>
                <label class="form-check-label" for="option{{ $option->id }}">
                    {{ $option->quality_question_type_option_name }}
                </label>
            </div>
            @endforeach
        </div>
    @endforeach
@endif
<div class="question">
    <br>
    <label for="question-gender"><b>Spol</b></label>
    <p><small>Označite vaš spol</small></p>

    <div class="form-check">
        <label class="form-check-label d-block">
            <input class="form-check-input" type="radio" name="user_gender" value="M" required>
            Moški
        </label>
        <label class="form-check-label d-block">
            <input class="form-check-input" type="radio" name="user_gender" value="F" required>
            Ženski
        </label>
    </div>

</div>
{{--
@if ($quality_campaign_classes != null)
    <div class="question">
        <br>
        <label for="question-class"><b>Oddelek</b></label>
        <p><small>Izberite oddelek</small></p>

        @foreach ($quality_campaign_classes as $quality_campaign_class)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="quality_target_group_class_id" id="option{{ $quality_campaign_class->id }}" value="{{ $quality_campaign_class->id }}" required>
            <label class="form-check-label" for="option{{ $quality_campaign_class->id }}">
                {{ $quality_campaign_class->class_year }}. {{ $quality_campaign_class->class_name }}
            </label>
        </div>
        @endforeach
    </div>
@endif
--}}
<hr>
<div class="d-flex justify-content-between">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Nazaj</a>
    {{ Form::submit('Pošlji', ['class' => 'btn btn-primary']) }}
</div>
{!! Form::close() !!}





    
    
@endsection