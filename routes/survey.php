<?php

// routes/survey.php
use Illuminate\Support\Facades\Route;


Route::resource('/quality_survey/questionnaires/categories', App\Http\Controllers\QualitySurvey\QualitySurveyQuestionnaireCategoriesController::class);

Route::delete('quality_survey/questionnaires/delete_question_from_questionnaire/{quality_question_id}/{quality_questionnaire_id}', 
    [App\Http\Controllers\QualitySurvey\QualitySurveyQuestionnairesController::class, 'delete_question_from_questionnaire'])
    ->name('quality.questionnaires.delete_question');


Route::post('quality_survey/questionnaires/store_question_to_questionnaire', ['uses' => 'App\Http\Controllers\QualitySurvey\QualitySurveyQuestionnairesController@store_question_to_questionnaire']);
Route::get('quality_survey/questionnaires/create_questionnaire_in_category/{category_id}', ['uses' => 'App\Http\Controllers\QualitySurvey\QualitySurveyQuestionnairesController@create_questionnaire_in_category']);
Route::resource('/quality_survey/questionnaires', App\Http\Controllers\QualitySurvey\QualitySurveyQuestionnairesController::class);

Route::resource('/quality_survey/personroles', App\Http\Controllers\QualitySurvey\QualitySurveyPersonRolesController::class);
Route::resource('/quality_survey/tags', App\Http\Controllers\QualitySurvey\QualitySurveyTagsController::class);
Route::resource('/quality_survey/questions/types', App\Http\Controllers\QualitySurvey\QualitySurveyQuestionTypesController::class);
Route::resource('/quality_survey/app/helps', App\Http\Controllers\QualitySurvey\QualitySurveyAppHelpsController::class);


Route::get('/quality_survey/questions/check_question_options', [App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController::class, 'check_question_options']);


Route::resource('/quality_survey/questions/categories', App\Http\Controllers\QualitySurvey\QualitySurveyQuestionCategoriesController::class);
Route::resource('/quality_survey/questions', App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController::class);

Route::get('quality_survey/home', [App\Http\Controllers\QualitySurvey\QualitySurveyController::class, 'home']);
Route::get('quality_survey', [App\Http\Controllers\QualitySurvey\QualitySurveyController::class, 'home']);

Route::post('quality_survey/questions/update_subquestion', ['uses' => 'App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController@update_subquestion']);
Route::post('quality_survey/questions/add_option', ['uses' => 'App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController@add_option']);
Route::get('/quality_survey/questions/add_option_other/{id}', [App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController::class, 'add_option_other'])
    ->name('quality_survey.add_option_other');

Route::post('quality_survey/questions/update_option', ['uses' => 'App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController@update_option']);

Route::post('quality_survey/questions/add_subquestion_to_question', ['uses' => 'App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController@add_subquestion_to_question']);

Route::resource('/quality_survey/questions', App\Http\Controllers\QualitySurvey\QualitySurveyQuestionsController::class)
    ->names([
        'index' => 'survey.questions.index',
        'show' => 'survey.questions.show',
        'create' => 'survey.questions.create',
        'store' => 'survey.questions.store',
        'edit' => 'survey.questions.edit',
        'update' => 'survey.questions.update',
        'destroy' => 'survey.questions.destroy',
    ]);