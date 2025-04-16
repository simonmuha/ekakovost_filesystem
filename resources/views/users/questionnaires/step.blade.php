@extends('layouts.user_questionnaire')

@section('content')
<div class="container">
    <h2>{{ $quality_category->quality_question_category_name }}</h2>
    <hr>
    <form action="{{ route('user_questionnaire_store_step', ['step' => $step]) }}" method="POST">
        @csrf
        @foreach ($quality_questions as $question)
        <div class="question">
            <label for="question{{ $question->id }}"><b>{{ $question->quality_question_name }}</b></label>
            <p><small>{{ $question->quality_question_description }}</small> </p>

            @foreach ($question->type->options as $option)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question{{ $question->id }}" id="option{{ $option->id }}" value="{{ $option->quality_question_type_option_value }}" required>
                <label class="form-check-label" for="option{{ $option->id }}">
                    {{ $option->quality_question_type_option_name }}
                </label>
            </div>
            @endforeach
        </div>
        <br>
        @endforeach
        <hr>
        <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Naprej</button>
        </div>
    </form>
</div>
@endsection
