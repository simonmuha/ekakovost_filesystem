<?php

// routes/school.php
use Illuminate\Support\Facades\Route;


Route::get('/school/school/{school_id}/about', [App\Http\Controllers\School\SchoolsController::class, 'about'])->name('school.about');
Route::get('/school/school/{school_id}/social_medias', [App\Http\Controllers\School\SchoolsController::class, 'social_medias'])->name('school.social_medias');
Route::get('/school/school/{school_id}/files', [App\Http\Controllers\School\SchoolsController::class, 'files'])->name('school.files');


Route::get('/school/projects/{project}/calendars/events', [App\Http\Controllers\School\ProjectCalendarEventsController::class, 'index'])
    ->name('project.calendar_events.index');

Route::resource('/school/projects/calendars/events', App\Http\Controllers\School\ProjectCalendarEventsController::class);

Route::post('/school-project-tasks', [App\Http\Controllers\School\ProjectTasksController::class, 'store'])->name('project-tasks.store');

Route::get('/school/projects/{project_id}/people/app_positions', 
    [App\Http\Controllers\School\ProjectPeopleAppPositionsController::class, 'index']
    )->name('school.projects.people.app_positions.index');

Route::resource('/school/projects', App\Http\Controllers\School\ProjectsController::class);


Route::get('/school/quality/systems/{systemCode}', [App\Http\Controllers\School\QualitySystemsController::class, 'showSystem']);

