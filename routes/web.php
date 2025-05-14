<?php

use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PersonsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Admin\AdminOrganizationsController;
use App\Http\Controllers\Admin\AdminOrganizationUsersController;


use App\Http\Controllers\School\SchoolsController;
use App\Http\Controllers\School\SchoolOrganizationsController;
use App\Http\Controllers\School\SchoolOrganizationEducationalProgramsController;
use App\Http\Controllers\School\SchoolOrganizationPersonsController;
use App\Http\Controllers\School\SchoolOrganizationYearsController;

use App\Http\Controllers\School\SchoolAreasController;
use App\Http\Controllers\School\SchoolAreaLevelsController;
use App\Http\Controllers\School\SchoolAreaLevelKnows;


use App\Http\Controllers\SchoolAdmin\SchoolAdminController;
use App\Http\Controllers\SchoolAdmin\SchoolGroupsController;
use App\Http\Controllers\SchoolAdmin\SchoolOrganizationPeopleController;



use App\Http\Controllers\App\AppAreasController;
use App\Http\Controllers\App\AppHelpsController;
use App\Http\Controllers\App\AppHelpStepsController;
use App\Http\Controllers\App\AppAreaRolesController;
use App\Http\Controllers\App\AppPermissionsController;
use App\Http\Controllers\App\AppSideBarsController;
use App\Http\Controllers\App\AppOrganizationsController;
use App\Http\Controllers\App\AppUsersController;
use App\Http\Controllers\App\AppPositionsController;
use App\Http\Controllers\App\AppPositionAppAreasController;
use App\Http\Controllers\App\AppEducationalProgramsController;
use App\Http\Controllers\App\AppYearsController;
use App\Http\Controllers\App\AppAisController;
use App\Http\Controllers\App\AppAiExamplesController;
use App\Http\Controllers\App\AppController;
use App\Http\Controllers\App\PDFController;

use App\Http\Controllers\OrganizationAdmin\OrganizationController;
use App\Http\Controllers\OrganizationAdmin\OrganizationCompaniesController;
use App\Http\Controllers\OrganizationAdmin\OrganizationCompanyUsersController;
use App\Http\Controllers\OrganizationAdmin\OrganizationHelpsController;
use App\Http\Controllers\OrganizationAdmin\OrganizationPositionsController;
use App\Http\Controllers\OrganizationAdmin\OrganizationCompanySchoolsController;
use App\Http\Controllers\OrganizationAdmin\OrganizationCompanyPeopleController;



use App\Http\Controllers\Quality\QualityTagsController;




use App\Http\Controllers\User\UserQuestionnairesController;

use App\Http\Controllers\Quality\QualityQuestionnairesCategoriesController;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;


use App\Http\Controllers\Storage\EntityController;
use App\Http\Controllers\Storage\TagController;
use App\Http\Controllers\Storage\SchoolYearController;
use App\Http\Controllers\Storage\User_EntityController;
use App\Http\Controllers\Storage\FileController;


use App\Models\Storage\Entity;
use App\Models\Storage\Tag;
use App\Models\Storage\SchoolYear;
use App\Models\Storage\User;
use App\Models\Storage\User_Entity;


require base_path('routes/app.php');

require base_path('routes/survey.php');
require base_path('routes/school_quality.php');

require base_path('routes/school.php');
require base_path('routes/school_admin.php');

require base_path('routes/user.php');  

require base_path('routes/kiosk.php');  
    




/*
|--------------------------------------------------------------------------
| Web Mails
|--------------------------------------------------------------------------
|
|
*/
Route::get('/send-email', function () {
    Mail::to('muha.simon@gmail.com')->send(new TestEmail());
    return 'E-pošta je bila poslana!';
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
|
*/
// User - App - Notification
Route::resource('/user/notifications', App\Http\Controllers\User\UserAppNotificationsController::class);

// User - App - Notification
Route::resource('/user/emails', App\Http\Controllers\User\UserEmailsController::class);

/*
|--------------------------------------------------------------------------
| App
|--------------------------------------------------------------------------
|
*/
//PDF
Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);



Route::get('/subscribe', ['uses' => 'App\Http\Controllers\App\EmailSubscriptionsController@showform']);
Route::post('/subscribe', ['uses' => 'App\Http\Controllers\App\EmailSubscriptionsController@store']);



/*
|--------------------------------------------------------------------------
| OrganizationAdmin
|--------------------------------------------------------------------------
|
*/
//Organization - Helps

Route::resource('/organization_admin/helps', App\Http\Controllers\OrganizationAdmin\OrganizationHelpsController::class);

//Organization - Positions

Route::resource('organization_admin/positions', OrganizationPositionsController::class);

//Organization - Companies - Schools



Route::delete('/organization_admin/companies/schools/remove_admin_from_school/{school_organization_id}/{school_admin_id}', [OrganizationCompanySchoolsController::class, 'remove_admin_from_school']);

Route::post('/organization_admin/companies/schools/store_admin_to_school', [OrganizationCompanySchoolsController::class, 'store_admin_to_school']);
Route::get('/organization_admin/companies/schools/add_admin_to_school/{school_organization_id}', [OrganizationCompanySchoolsController::class, 'add_admin_to_school']);

Route::post('/organization_admin/companies/schools/store_school_add_to_company', [OrganizationCompanySchoolsController::class, 'store_school_add_to_company']);
Route::get('/organization_admin/companies/schools/create_school_add_to_company/{app_organization_id}', [OrganizationCompanySchoolsController::class, 'create_school_add_to_company']);

//Organization - Companies - People
Route::post('/organization_admin/companies/users/add_position_to_person', ['uses' => 'App\Http\Controllers\OrganizationAdmin\OrganizationCompanyPeopleController@add_position_to_person']);
Route::get('/organization_admin/companies/users/reset_password/{id}', [OrganizationCompanyUsersController::class, 'reset_password']);
Route::delete  ('/organization_admin/companies/people/remove_position_from_person/{person_id}/{app_position_id}', ['uses' => 'App\Http\Controllers\OrganizationAdmin\OrganizationCompanyPeopleController@remove_position_from_person']);
Route::resource('/organization_admin/companies/people', OrganizationCompanyPeopleController::class);

//Organization - Companies - Users
Route::get('organization_admin/companies/users/{person_id}/pdf_user_login', [OrganizationCompanyUsersController::class, 'pdf_user_login']);
Route::get('organization_admin/companies/users/{person_id}/mail_user_login', [OrganizationCompanyUsersController::class, 'mail_user_login']);
Route::get('organization_admin/companies/users/testMail', [OrganizationCompanyUsersController::class, 'testMail']);

Route::delete('organization_admin/companies/remove_admin_from_company/{id}', [OrganizationCompaniesController::class, 'remove_admin_from_company']);
Route::get('organization_admin/companies/remove_admin_from_company/{id}', [OrganizationCompaniesController::class, 'remove_admin_from_company']);
Route::post('organization_admin/companies/store_person_to_app_position', [OrganizationCompaniesController::class, 'store_person_to_app_position']);
Route::post('organization_admin/companies/store_user_add_to_company', [OrganizationCompaniesController::class, 'store_user_add_to_company']);
Route::post('organization_admin/companies/store_user_add_to_subcompany', [OrganizationCompaniesController::class, 'store_user_add_to_subcompany']);
Route::get('organization_admin/companies/create_user_add_to_company/{app_organization_id}', [OrganizationCompaniesController::class, 'create_user_add_to_company']);
Route::post('aorganization_admin/companies/store_admin_add_to_company', [OrganizationCompaniesController::class, 'store_admin_add_to_company']);
Route::get('organization_admin/companies/create_admin_add_to_company/{app_organization_id}', [OrganizationCompaniesController::class, 'create_admin_add_to_company']);
Route::resource('/organization_admin/companies/users', OrganizationCompanyUsersController::class);


//Organization - Companies
Route::delete('/organization_admin/companies/remove_position_from_organization/{person_id}/{app_position_id}', [OrganizationCompaniesController::class, 'remove_position_from_organization']);

Route::get('organization_admin/companies/create_subcompany/{organization_id}', [OrganizationCompaniesController::class, 'create_subcompany']);
Route::resource('/organization_admin/companies', OrganizationCompaniesController::class);


//Organization


Route::get('organization_admin/home', [OrganizationController::class, 'home']);

Route::resource('/organization_admin', OrganizationController::class);






//School Admin - School Organization Years
Route::post('/school_admin/app/positions/store_person_to_possition', [App\Http\Controllers\SchoolAdmin\SchoolOrganizationYearsController::class, 'store_person_to_possition']);

Route::resource('/school_admin/school/organization/years', App\Http\Controllers\SchoolAdmin\SchoolOrganizationYearsController::class);

//School Admin - App_positions
Route::post('/school_admin/app/positions/store_person_to_possition', [App\Http\Controllers\SchoolAdmin\AppPositionsController::class, 'store_person_to_possition']);

//School Admin - Educational Programs
Route::resource('/school_admin/school/educational_programs', App\Http\Controllers\SchoolAdmin\SchoolOrganizationProgramsController::class);


Route::resource('/school_admin/app/positions', App\Http\Controllers\SchoolAdmin\AppPositionsController::class);

//School Admin - People
Route::get('/school_admin/school/people/change_person_active_school_year/{person_id}/{school_organizational_year_id}', [SchoolOrganizationPeopleController::class, 'change_person_active_school_year']);

Route::resource('/school_admin/school/people', SchoolOrganizationPeopleController::class);

//School Admin - Users
Route::get('/school_admin/school/users/{person_id}/pdf_user_login', [App\Http\Controllers\SchoolAdmin\SchoolOrganizationUsersController::class, 'pdf_user_login']);
Route::get('/school_admin/school/users/{user_id}/mail_user_login', [App\Http\Controllers\SchoolAdmin\SchoolOrganizationUsersController::class, 'mail_user_login']);

//School Admin - Groups
Route::resource('/school_admin/groups', SchoolGroupsController::class);


//School Admin - School

Route::delete('/school_admin/school/remove_position_from_person/{school_year_person_position_id}', [App\Http\Controllers\SchoolAdmin\SchoolOrganizationsController::class, 'remove_position_from_person']);



Route::post('/school_admin/school/store_person_to_school', [App\Http\Controllers\SchoolAdmin\SchoolOrganizationsController::class, 'store_person_to_school']);


Route::post('/school_admin/school/store_app_position_to_person', [App\Http\Controllers\SchoolAdmin\SchoolOrganizationsController::class, 'store_app_position_to_person']);

Route::post('/school_admin/school/add_school_year_to_school', ['uses' => 'App\Http\Controllers\SchoolAdmin\SchoolOrganizationsController@add_school_year_to_school']);
Route::get('/school_admin/school/add_person_to_school/{school_organization_id}', [App\Http\Controllers\SchoolAdmin\SchoolOrganizationsController::class, 'add_person_to_school']);

Route::resource('/school_admin/school', App\Http\Controllers\SchoolAdmin\SchoolOrganizationsController::class);

//School Admin
Route::get('/school_admin/home', [SchoolAdminController::class, 'home'])->name('homeAdmin.index');;
Route::resource('/school_admin', SchoolAdminController::class);

/*
|--------------------------------------------------------------------------
| School Areas 
|--------------------------------------------------------------------------
|
*/
// Helps
Route::resource('/school_areas/helps', App\Http\Controllers\SchoolAreas\SchoolAreaHelpsController::class);


// School Areas - Levels - Guide


// School Areas - Levels - Dos - Evidence

// School Areas - Levels - Dos

// School Areas - Levels - Knows

// School Areas - Levels
Route::get('/school_areas/areas/levels/create/{school_area_id}', [App\Http\Controllers\SchoolAreas\SchoolAreaLevelsController::class, 'create'])->name('school_area_level.create');

Route::resource('/school_areas/areas/levels', App\Http\Controllers\SchoolAreas\SchoolAreaLevelsController::class);


// School Areas 
Route::get('school_areas/home', [App\Http\Controllers\SchoolAreas\SchoolAreasController::class, 'home']);
Route::resource('/school_areas/areas', App\Http\Controllers\SchoolAreas\SchoolAreasController::class);

/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
|
*/


// Posts
Route::resource('/posts', App\Http\Controllers\Posts\PostsController::class);

/*
|--------------------------------------------------------------------------
| Schools - new
|--------------------------------------------------------------------------
|
*/

// School - Posts 
Route::resource('/school/posts/categories', App\Http\Controllers\School\SchoolPostCategoriesController::class);
Route::resource('/school/posts', App\Http\Controllers\School\SchoolPostsController::class);


// School - School
Route::resource('/school/school', App\Http\Controllers\School\SchoolOrganizationsController::class);

// School - Quality - Systems

// School - Quality - Campaigns
Route::get('/school/school/people/change_person_active_school_year/{person_id}/{school_organizational_year_id}', [App\Http\Controllers\School\SchoolOrganizationPeopleController::class, 'change_person_active_school_year']);

// School - Quality - Campaigns
Route::resource('/school/quality/campaigns', App\Http\Controllers\School\QualityCampaignsController::class);

// School - App - Areas
Route::resource('/school/app/areas', App\Http\Controllers\School\AppAreasController::class);

// School - App - Suggestions
Route::resource('/school/app/suggestions', App\Http\Controllers\School\AppSuggestionsController::class);


// School - App - Helps
Route::post('/store-faq', [App\Http\Controllers\School\AppHelpsController::class, 'storeFaq'])->name('faq.store');
Route::get('/school/app/helps/faq', [App\Http\Controllers\School\AppHelpsController::class, 'faq'])->name('school.app.helps.faq');
Route::resource('/school/app/helps', App\Http\Controllers\School\AppHelpsController::class);

// School - App - Notification
Route::resource('/school/notifications', App\Http\Controllers\School\SchoolAppNotificationsController::class);

// School - Calendar - Event - Reports
Route::resource('/school/calendars/events/reports', App\Http\Controllers\School\SchoolCalendarEventReportsController::class);


// School - Calendar - Events
Route::get('/school/calendars/events/reports/{id}/pdf_event_travel_report', [App\Http\Controllers\School\SchoolCalendarEventReportsController::class, 'pdf_event_travel_report']);

Route::get('/school/calendars/events/{id}/create_child_event', [App\Http\Controllers\School\SchoolCalendarEventsController::class, 'create_child_event']);


Route::delete('/school/calendars/events/{id}/delete', [App\Http\Controllers\School\SchoolCalendarEventsController::class, 'destroy'])->name('calendar_events.destroy');

Route::get('/school/calendars/school/week', [App\Http\Controllers\School\SchoolCalendarsController::class, 'school_index_week']);
Route::get('/school/calendars/school/day', [App\Http\Controllers\School\SchoolCalendarsController::class, 'school_index_day']);

Route::get('/school/calendars/personal/week', [App\Http\Controllers\School\SchoolCalendarsController::class, 'personal_index_week']);
Route::get('/school/calendars/personal/day', [App\Http\Controllers\School\SchoolCalendarsController::class, 'personal_index_day']);

Route::resource('/school/calendars/events', App\Http\Controllers\School\SchoolCalendarEventsController::class);
Route::post('/calendar_event/add_person', [App\Http\Controllers\School\SchoolCalendarEventsController::class, 'addPersonToRole'])->name('calendar_event.add_person');
Route::post('/calendar_event/remove_role', [App\Http\Controllers\School\SchoolCalendarEventsController::class, 'removeRole'])->name('calendar_event.remove_role');

// School - Calendar
Route::resource('/school/calendars', App\Http\Controllers\School\SchoolCalendarsController::class); 


// School - Area -Levels
Route::resource('/school/areas/levels', App\Http\Controllers\School\SchoolAreaLevelsController::class);

// School - Areas
Route::resource('/school/areas', App\Http\Controllers\School\SchoolAreasController::class);

Route::get('/school/home', [SchoolsController::class, 'home'])->name('home.index');
Route::resource('/school', SchoolsController::class);

/*
|--------------------------------------------------------------------------
| Schools
|--------------------------------------------------------------------------
|
*/
//Schools - Areas - Levels - Guide

//Schools - Areas - Levels - Do - Evidence

//Schools - Areas - Levels - Do

//Schools - Areas - Levels - Know


//Schools - Areas - Levels
Route::get('schools/areas/levels/create_level_add_to_area/{school_area_id}', ['uses' => 'App\Http\Controllers\School\SchoolAreaLevelsController@create_level_add_to_area']);
Route::resource('/schools/areas/levels', SchoolAreaLevelsController::class);

//Schools - Areas - Sedaj je novo področje
//Route::resource('/schools/areas', SchoolAreasController::class);



//Schools - Positions



//Schools - Year

//Schools - Schools - Year
Route::post('school/organizations/years/add_school_year_to_organization', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationYearsController@add_school_year_to_organization']);


Route::get('/schools/organizations/years/{organization}', 'App\Http\Controllers\School\SchoolOrganizationYearsController@index');
Route::resource('/schools/organizations/years', SchoolOrganizationYearsController::class);

//Schools - Organizations - People
Route::get('/schools/organizations/persons/create/{id}', [SchoolOrganizationPersonsController::class, 'create'])->name('schools.organizations.person.create');
Route::get('/schools/organizations/persons/index/{id}', [SchoolOrganizationPersonsController::class, 'index'])->name('schools.organizations.person.index');

Route::get('/school/organizations/persons/change_person_active_organization/{school_organization_person_id}', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationPersonsController@change_person_active_organization']);
Route::post('/schools/organizations/persons/add_role_to_person_in_organization', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationPersonsController@add_role_to_person_in_organization']);
Route::resource('/schools/organizations/persons', SchoolOrganizationPersonsController::class);
 
//Schools - Organization Educational Program Classes

Route::post('school/organizations/educationalprograms/classes/add_class_to_organization_educational_program', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationEducationalProgramClassesController@add_class_to_organization_educational_program']);


//Schools - Organization Educational Programs
Route::resource('/schools/organizations/educationalprograms', SchoolOrganizationEducationalProgramsController::class);

//Schools - Educational Programs

//Schools - Organizations
Route::post('school/organizations/add_person_to_organization', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationsController@add_person_to_organization']);
Route::post('school/organizations/add_person_to_suborganization', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationsController@add_person_to_suborganization']);
Route::post('school/organizations/add_educational_program_to_organization', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationsController@add_educational_program_to_organization']);

Route::get('school/organizations/create_suborganization/{school_organization_id}', ['uses' => 'App\Http\Controllers\School\SchoolOrganizationsController@create_suborganization']);
Route::resource('/schools/organizations', SchoolOrganizationsController::class);




//Schools
Route::resource('/schools', SchoolsController::class);



//Admin - Roles

 
Route::post('admin/roles/store_permission_to_role', ['uses' => 'App\Http\Controllers\Admin\AdminRolesController@store_permission_to_role']);
Route::get('admin/roles/delete_permission_from_role/{permission_id}/{role_id}', ['uses' => 'App\Http\Controllers\Admin\AdminRolesController@delete_permission_from_role']);
Route::resource('/admin/roles', AdminRolesController::class);

/*
Route::post('/users/{userId}/assignRole', [AdminRolesController::class, 'assignRole'])->name('assignRole');
Route::post('/users/{userId}/removeRole', [AdminRolesController::class, 'removeRole'])->name('removeRole');
*/






Route::resource('/admin', AdminController::class);


//Survey


//Quality

//Quality - Tags
Route::post('/quality/questions/add-category-to-question', [App\Http\Controllers\Quality\QualityQuestionsController::class, 'add_category_to_question'])
    ->name('quality.add_category_to_question');
Route::resource('quality/questions', App\Http\Controllers\Quality\QualityQuestionsController::class);


//Quality - Tags
Route::resource('quality/tags', QualityTagsController::class);

Route::resource('quality/personroles', App\Http\Controllers\Quality\QualityPersonRolesController::class);

//Quality - Systems

//Quality - Standards
Route::resource('quality/standards', App\Http\Controllers\Quality\QualityStandardsController::class);
Route::get('quality/standards/{id}/destroy', ['uses' => 'App\Http\Controllers\Quality\QualityStandardsController@destroy']);


//Quality - Indicators



//Quality - Questions

//Quality - Questions - Categories
Route::get('quality/questions/categories/create_subcategory/{id}', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionCategoriesController@create_subcategory']);
Route::resource('quality/questions/categories', App\Http\Controllers\Quality\QualityQuestionCategoriesController::class);


//Quality - Questions - Types
Route::resource('quality/questions/types', App\Http\Controllers\Quality\QualityQuestionTypesController::class);
//Route::post('quality/questions/add_option_to_type', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionTypesController@add_option_to_type']);
Route::post('quality/questions/update_option', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionTypesController@update_option']);









//Quality - Questionnaries
//Quality - Questionnaries - Categories
Route::get('quality/questionnaires/create_questionnaire_in_category/{category_id}', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionnairesController@create_questionnaire_in_category']);
Route::get('quality/questionnaires/categories/create_subcategory/{id}', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionnaireCategoriesController@create_subcategory']);
Route::resource('quality/questionnaires/categories', App\Http\Controllers\Quality\QualityQuestionnaireCategoriesController::class);


Route::post('quality/questionnaires/add_category_to_questionnaire', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionnairesController@add_category_to_questionnaire']);

Route::get('quality/questionnaires/delete_question_from_questionnaire/{quality_question_id}/{quality_questionnaire_id}', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionnairesController@delete_question_from_questionnaire']);

Route::resource('quality/questionnaires', App\Http\Controllers\Quality\QualityQuestionnairesController::class);
Route::post('quality/questionnaires/store_question_to_questionnaire', ['uses' => 'App\Http\Controllers\Quality\QualityQuestionnairesController@store_question_to_questionnaire']);

 

//Quality - Campaign
Route::resource('quality/campaigns', App\Http\Controllers\Quality\QualityCampaignsController::class);
Route::post('quality/campaigns/store_questionnaire_to_campaign', ['uses' => 'App\Http\Controllers\Quality\QualityCampaignsController@store_questionnaire_to_campaign']);
Route::post('quality/campaigns/store_target_group_to_campaign', ['uses' => 'App\Http\Controllers\Quality\QualityCampaignsController@store_target_group_to_campaign']);
Route::get('quality/campaigns/delete_questionnaire_from_campaign/{quality_campaign_id}/{quality_questionnaire_id}', ['uses' => 'App\Http\Controllers\Quality\QualityCampaignsController@delete_questionnaire_from_campaign']);
Route::get('quality/campaigns/delete_target_group_from_campaign/{quality_campaign_id}/{quality_target_group_id}', ['uses' => 'App\Http\Controllers\Quality\QualityCampaignsController@delete_target_group_from_campaign']);


//Quality - Answers
Route::put('quality/answers/{quality_campaign_id}/update_from_campaign', ['uses' => 'App\Http\Controllers\Quality\QualityAnswersController@update_from_campaign']);
Route::get('quality/answers/edit_from_campaign/{quality_campaign_id}/{quality_target_group_id}', ['uses' => 'App\Http\Controllers\Quality\QualityAnswersController@edit_from_campaign']);
Route::resource('quality/answers', App\Http\Controllers\Quality\QualityAnswersController::class);


//Quality - Person rules


//Quality - Target group
Route::get('quality/targetgroups/delete_person_role_from_targetgroup/{quality_target_group}/{quality_target_group_personrole}', ['uses' => 'App\Http\Controllers\Quality\QualityTargetGroupsController@delete_person_role_from_targetgroup']);
Route::post('quality/targetgroups/add_class_to_target_group', ['uses' => 'App\Http\Controllers\Quality\QualityTargetGroupsController@add_class_to_target_group']);
Route::post('quality/targetgroups/add_person_role_to_target_group', ['uses' => 'App\Http\Controllers\Quality\QualityTargetGroupsController@add_person_role_to_target_group']);

Route::resource('quality/targetgroups', App\Http\Controllers\Quality\QualityTargetGroupsController::class);

//Quality - Reports
Route::resource('quality/reports', App\Http\Controllers\Quality\QualityReportsController::class);

//Settings

Route::get('/settings', function () {
    return view('settings.index');
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


Route::get('/home/emqq', [App\Http\Controllers\HomeController::class, 'emqq']);
Route::get('/home/admin', [App\Http\Controllers\HomeController::class, 'admin']);
Route::get('/home/qualitysystems', [App\Http\Controllers\HomeController::class, 'schoolq']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/expertgroup/schoolareas', [App\Http\Controllers\HomeController::class, 'schoolareas']);
Route::get('/home/organization', [App\Http\Controllers\HomeController::class, 'organization']);




//user - questionnaire
Route::post('user_questionnaire_create', [UserQuestionnairesController::class, 'user_questionnaire_create'])->name('user_questionnaire_create');

Route::get('users/questionnaires/{id}/intro', [UserQuestionnairesController::class, 'show_intro'])->name('user_questionnaire_intro');
Route::get('users/questionnaires/{id}/intro_questionnaire', [UserQuestionnairesController::class, 'intro_questionnaire'])->name('user_questionnaire_intro_questionnaire');
Route::post('users/questionnaires/{id}/start', [UserQuestionnairesController::class, 'start_questionnaire'])->name('user_questionnaire_start');
Route::get('users/questionnaires/step/{step}', [UserQuestionnairesController::class, 'show_step'])->name('user_questionnaire_step');
Route::post('users/questionnaires/step/{step}', [UserQuestionnairesController::class, 'store_step'])->name('user_questionnaire_store_step');
Route::get('users/questionnaires/show_nps', [UserQuestionnairesController::class, 'show_nps'])->name('user_questionnaire_show_nps');
Route::post('users/questionnaires/show_nps/{id}', [UserQuestionnairesController::class, 'store_nps'])->name('user_questionnaire_store_nps');
Route::get('users/questionnaires/thankyou', [UserQuestionnairesController::class, 'show_thankyou'])->name('user_questionnaire_thankyou');

//User - Questionnaires questions
Route::post('/user/questionnaires/user_questionnaire_store', [UserQuestionnairesController::class, 'user_questionnaire_store'])->name('user.questionnaire.store');
Route::post('/users/questionnaires/uesr_questionnaire_create', 'App\Http\Controllers\User\UserQuestionnairesController@uesr_questionnaire_create')->name('uesr_questionnaire_create');

Route::resource('users/questionnaires', UserQuestionnairesController::class);

//Users
Route::put('update_user_home_image/{id}', [UsersController::class, 'update_user_home_image']);
Route::get('/users/edit_user_home_image/{id}', [UsersController::class, 'edit_user_home_image'])->name('edit_user_home_image');

Route::put('update_user_profile_image/{id}', [UsersController::class, 'update_user_profile_image']);
Route::resource('/users', UsersController::class);
Route::get('/users/edit_user_profile_image/{id}', [UsersController::class, 'edit_user_profile_image'])->name('edit_user_profile_image');





Route::post('/change-password', [App\Http\Controllers\UsersController::class, 'updatePassword'])->name('update-password');
Route::put('update/{id}', [UsersController::class, 'update']);

//Persons
Route::get('/persons/edit_images/{id}', [PersonsController::class, 'edit_images'])->name('edit_images');
Route::resource('persons', PersonsController::class);


//notification
Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);


//storage
Route::prefix('/adminStorage')->/*middleware(['auth'])->*/group(function () {
    Route::get('/dashboard', function () {
        return view('storage.admin_dashboard', [
            'entities' => Entity::all(),
            'tags' => Tag::all(),
            'users' => User::all(),
        ]);
    })->name('storage.admin_dashboard');

    Route::post('/entities', [EntityController::class, 'store'])->name('admin.entities.store');
    Route::post('/tags', [TagController::class, 'store'])->name('admin.tags.store');
    Route::post('/user-entity', [User_EntityController::class, 'store'])->name('admin.user_entity.store');
});

// Obrazec za dodajanje datoteke
Route::get('/file/create', [FileController::class, 'create'])->name('storage.create');

// Shranjevanje datoteke
Route::post('/file', [FileController::class, 'store'])->name('storage.store');

// Seznam vseh datotek (če želiš)
Route::get('users/file', [FileController::class, 'index'])->name('users/files.index');

Route::get('/file/{file}/download', [FileController::class, 'download'])->name('storage.download');

Route::get('/users/files', [FileController::class, 'index']) ->name('users.files.index');

Route::resource('entities', EntityController::class);


