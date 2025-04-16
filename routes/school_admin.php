<?php

// routes/school_admin.php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SchoolAmin - Admin
|--------------------------------------------------------------------------
|
*/
Route::get('/school_admin/projects/{project_id}/people/create', 
    [App\Http\Controllers\SchoolAdmin\ProjectPeopleAppPositionsController::class, 'create']
)->name('projects.people.create');

Route::get('/school_admin/projects/{project_id}/people/app_positions', 
    [App\Http\Controllers\SchoolAdmin\ProjectPeopleAppPositionsController::class, 'index']
)->name('projects.people.app_positions.index');

Route::post('/school_admin-project-app_medias', [App\Http\Controllers\SchoolAdmin\ProjectAppMediasController::class, 'store'])->name('project-app_medias.store');
Route::get('/school_admin/projects/{project_id}/medias', 
    [App\Http\Controllers\SchoolAdmin\ProjectAppMediasController::class, 'index']
)->name('school_admin.projects.app_medias.index');

Route::post('/project-people-app-positions', [App\Http\Controllers\SchoolAdmin\ProjectPeopleAppPositionsController::class, 'store'])->name('project-people-app-positions.store');
//School Admin - Groups
Route::resource('/school_admin/projects/people/app_positions', App\Http\Controllers\SchoolAdmin\ProjectPeopleAppPositionsController::class);


//School Admin - Groups
Route::resource('/school/groups', App\Http\Controllers\School\SchoolGroupsController::class);

//School Admin - Helps
Route::resource('/school_admin/helps', App\Http\Controllers\SchoolAdmin\AppHelpsController::class);

//School Admin - Mails
Route::resource('/school_admin/app/email/schedules', App\Http\Controllers\SchoolAdmin\AppEmailSchedulesController ::class);

//School Admin - School - Areas
Route::get('/school_admin/school/areas/add_school_area_to_school/{school_organization_id}/{school_area_id}', [App\Http\Controllers\SchoolAdmin\SchoolAreasController::class, 'add_school_area_to_school']);
Route::resource('/school_admin/school/areas', App\Http\Controllers\SchoolAdmin\SchoolAreasController::class);
Route::resource('/school_admin/projects', App\Http\Controllers\SchoolAdmin\ProjectsController::class);

