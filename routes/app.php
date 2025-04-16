<?php

// routes/app.php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| App
|--------------------------------------------------------------------------
|
*/


// School Admin - Positions - Categories
Route::post('/app_position_categories', [App\Http\Controllers\App\AppPositionCategoriesController::class, 'store'])
    ->name('app_position_categories.store');
Route::put('app/positions/categories/{id}', [App\Http\Controllers\App\AppPositionCategoriesController::class, 'update'])->name('app_position_categories.update');
Route::resource('app/positions/categories', App\Http\Controllers\App\AppPositionCategoriesController::class);



//App - Positions - AppArea
Route::delete('/delete_permission_from_position_area/{school_position_app_area_id}/{app_permission_id}', [App\Http\Controllers\App\AppPositionAppAreasController::class, 'delete_app_permission_from_position_app_area'])
    ->name('delete_permission_from_position_area');
Route::post('app/positions/areas/store_app_permission_to_position_app_area', ['uses' => 'App\Http\Controllers\App\AppPositionAppAreasController@store_app_permission_to_position_app_area']);
Route::resource('/app/positions/areas', App\Http\Controllers\App\AppPositionAppAreasController::class);


//App - Positions
Route::delete('app/positions/remove_subposition/{app_position_subposition_id}', [App\Http\Controllers\App\AppPositionsController::class, 'remove_subposition']);
Route::post('app/positions/store_app_subposition_to_position', ['uses' => 'App\Http\Controllers\App\AppPositionsController@store_app_subposition_to_position']);
Route::post('app/positions/store_app_area_to_position', ['uses' => 'App\Http\Controllers\App\AppPositionsController@store_app_area_to_position']);
Route::resource('app/positions', App\Http\Controllers\App\AppPositionsController::class);  



//App - Roles - Person
Route::get('/app/roles/persons/change_person_app_role/{app_role_person_id}', ['uses' => 'App\Http\Controllers\App\AppRolePersonsController@change_person_app_role']);

//App - Permissions
Route::resource('/app/permissions', App\Http\Controllers\App\AppPermissionsController::class);

//App - Ai - Examples
Route::get('app/ais/examples/create_example_add_to_type/{app_ai_type_id}', ['uses' => 'App\Http\Controllers\App\AppAiExamplesController@create_example_add_to_type']);
Route::resource('/app/ais/examples', App\Http\Controllers\App\AppAiExamplesController::class);

//App - Ai
Route::resource('/app/ais', App\Http\Controllers\App\AppAisController::class);


//App - Roles

//App - Sidebars
Route::get('/app/sidebars/delete_sidebar_from_area/{app_sidebar_id}', ['uses' => 'App\Http\Controllers\App\AppSideBarsController@delete_sidebar_from_area']);
Route::resource('/app/sidebars', App\Http\Controllers\App\AppSideBarsController::class);

//App - Areas  Roles
Route::resource('/app/areas/roles', App\Http\Controllers\App\AppAreaRolesController::class);

//App - Areas
//App - Areas - People
Route::get('/app/areas/persons/change_person_app_area/{person_id}/{app_area_id}', ['uses' => 'App\Http\Controllers\App\AppAreaPeopleController@change_person_app_area']);


Route::get('app/areas/create_subarea/{app_area_parent_id}', ['uses' => 'App\Http\Controllers\App\AppAreasController@create_subarea']);
//Route::resource('/app/areas', AppAreasController::class);


//App - Areas  Roles
Route::resource('/app/areas', App\Http\Controllers\App\AppAreasController::class);

//App - Helps  Steps
Route::get('app/helps/steps/create_step_add_to_app_help/{app_help_id}', ['uses' => 'App\Http\Controllers\App\AppHelpStepsController@create_step_add_to_app_help']);

Route::resource('/app/helps/steps', App\Http\Controllers\App\AppHelpStepsController::class);

//App - Helps
Route::get('app/helps/create_help_add_to_app_area/{app_area_id}', ['uses' => 'App\Http\Controllers\App\AppHelpsController@create_help_add_to_app_area']);

Route::resource('/app/helps', App\Http\Controllers\App\AppHelpsController::class);

//App - Educational Programs
Route::resource('/app/educationalprograms', App\Http\Controllers\App\AppEducationalProgramsController::class);

//App - Year
Route::resource('/app/years', App\Http\Controllers\App\AppYearsController::class);

//App


//App - Organizations - Users
Route::delete('app/organizations/remove_position_from_organization/{person_id}/{app_position_id}', [App\Http\Controllers\App\AppOrganizationsController::class, 'remove_position_from_organization']);
Route::delete('app/organizations/remove_admin_from_organization/{app_area_person_id}/{person_id}', [App\Http\Controllers\App\AppOrganizationsController::class, 'remove_admin_from_organization']);
Route::get('app/organizations/remove_admin_from_organization/{id}', [App\Http\Controllers\App\AppOrganizationsController::class, 'remove_admin_from_organization']);
Route::post('admin/organizations/users/store_user_add_to_organization', [App\Http\Controllers\App\AppOrganizationsController::class, 'store_user_add_to_organization']);

Route::get('app/organizations/users/{person_id}/pdf_user_login', [App\Http\Controllers\App\AppUsersController::class, 'pdf_user_login']);
Route::get('app/organizations/users/{user_id}/mail_user_login', [App\Http\Controllers\App\AppUsersController::class, 'mail_user_login']);

Route::get('app/organizations/users/create_user_add_to_organization/{app_organization_id}', [App\Http\Controllers\App\AppOrganizationsController::class, 'create_user_add_to_organization']);

Route::post('admin/organizations/users/store_admin_add_to_organization', [App\Http\Controllers\App\AppOrganizationsController::class, 'store_admin_add_to_organization']);
Route::get('app/organizations/users/create_admin_add_to_organization/{app_organization_id}', [App\Http\Controllers\App\AppOrganizationsController::class, 'create_admin_add_to_organization']);

//Route::get('/app/organizations/users/showcustom/{admin_organization_id}/{user_id}', [AppOrganizationUsersController::class, 'showCustom']);
//Route::resource('/app/organizations/users', AppOrganizationUsersController::class);

//App - Organizations
Route::post('app/organizations/create_user_add_to_organization', ['uses' => 'App\Http\Controllers\App\AppOrganizationsController@create_user_add_to_organization']);
Route::post('app/organizations/add_user_to_organization', ['uses' => 'App\Http\Controllers\App\AppOrganizationsController@add_user_to_organization']);
Route::get('app/organizations/create_suborganization/{organization_id}', ['uses' => 'App\Http\Controllers\App\AppOrganizationsController@create_suborganization']);
Route::resource('/app/organizations', App\Http\Controllers\App\AppOrganizationsController::class);

//App - Users

Route::get('/app/users/reset_password/{id}', [App\Http\Controllers\App\AppUsersController::class, 'reset_password'])->name('users.reset_password');

Route::delete('/app/users/remove_position_from_person/{person_id}/{app_position_id}', ['uses' => 'App\Http\Controllers\App\AppUsersController@remove_position_from_person']);
Route::post('app/users/add_position_to_person', ['uses' => 'App\Http\Controllers\App\AppUsersController@add_position_to_person']);

Route::post('app/users/add_role_to_user_in_organization', ['uses' => 'App\Http\Controllers\App\AppUsersController@add_role_to_user_in_organization']);
Route::post('app/users/add_role_to_user', ['uses' => 'App\Http\Controllers\App\AppUsersController@add_role_to_user']);
//Route::post('/app/users', [AdminUsersController::class, 'store'])->name('admin_users_store');
Route::resource('/app/users', App\Http\Controllers\App\AppUsersController::class);

//App
Route::resource('/app', App\Http\Controllers\App\AppController::class);

