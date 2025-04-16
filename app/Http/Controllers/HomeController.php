<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\User;
use App\Models\Quality\QualitySystem;
use App\Models\Quality\QualityCampaign;
use Illuminate\Support\Carbon;
use App\Models\Quality\QualityAnswer;
use App\Models\Quality\QualityQuestion;
use App\Models\Quality\QualityStatus;
use App\Models\School\SchoolOrganizationYear;

use App\Models\Quality\QualityQuestionnaire;

use Illuminate\Support\Facades\Auth;

use App\Models\App\AppAreaPerson;
use App\Models\App\AppUserActiveStatus;
use App\Models\App\AppArea;
use App\Models\App\AppPosition;
use App\Models\App\AppPositionPerson;
use App\Models\App\AppAreaAppPosition;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //return (111);
        $user = Auth::user();
        $user_active_status = AppUserActiveStatus::where('user_id',$user->id)
            ->first();
        //return ($user_active_status);    
        if (!$user_active_status || $user_active_status->app_area_id == null) {
            //return ($user);
            // Pridobite povezane people za prijavljenega uporabnika
            $peopleIds = $user->people->pluck('id');

            // Pridobite app_position_ids povezane s temi people preko AppPositionPerson modela
            $appPositionIds = AppPositionPerson::whereIn('person_id', $peopleIds)
                ->pluck('app_position_id');

            // Pridobite app_area_ids povezane s temi app_positions preko AppAreaAppPosition modela
            $appAreaIds = AppAreaAppPosition::whereIn('app_position_id', $appPositionIds)
                ->pluck('app_area_id');

            // Pridobite prvo app_area z app_area_parent_id = null
            $firstAppArea = AppArea::whereIn('id', $appAreaIds)
                ->whereNull('app_area_parent_id')
                ->first();

            if ($firstAppArea) {
                if (!$user_active_status) {
                    //return (1);
                    $user_active_status = new AppUserActiveStatus;
                    $user_active_status->user_id = $user->id;
                    $user_active_status->person_id = $user->user_person_id;
                }
                $user_active_status->app_area_id = $firstAppArea->id;
                $user_active_status->save();
            } else {
                return redirect ('/users/'. $user->id)
                    ->with('error', 'Uporabnik nima aktivnega področja.');
            }
        }  
        //return ($user_active_status->app_area->app_area_home);
        return redirect ('/'. $user_active_status->app_area->app_area_home);

        //od tu naprej je star način preverjanja aktivnega področja aplikacije
        //return (Auth::user()->user_person_id);
        $user = Auth::user();
        $user_app_organization_active = $user->active_organization;
        
        if (!$user_app_organization_active) {
            $peopleIds = $user->people->pluck('id')->toArray();
            $user_app_organization_active = AppAreaPerson::where('person_id', $peopleIds) 
                ->first();
            if (!$user_app_organization_active) {
                return redirect ('/users/'. $user->id)
                    ->with('error', 'Nimate dovoljenja. (ni določena aktivna organizacija)');
            }
            //return($user_app_organization_active);
            $user_app_organization_active->app_area_person_active = true;
            $user_app_organization_active->save();

        }
        //return ($user_app_organization_active);
        



        //od tu naprej je staro
        $personIds = $user->people->pluck('id')->toArray();

        // Poiščite prvi aktiven zapis v tabeli app_area_people
        $app_area_person = AppAreaPerson::whereIn('person_id', $personIds)
            ->where('app_area_person_active', true)
            ->first();
        //return ($app_area_person);
            
        //return ($app_area_person);

        if (!$app_area_person) {
            // Zapis ni najden
            $app_area_person = AppAreaPerson::whereIn('person_id', $personIds)
                ->where('app_area_person_active', false)
                ->first();
            if (!$app_area_person) {
                return redirect ('/users/'. $user->id)
                    ->with('error', 'Nimate dovoljenja.');
            } 

        }
        
        if ($app_area_person->app_area->app_area_home != "home") {
            //return ($app_area_person->app_area->app_area_home);
            return redirect ('/'. $app_area_person->app_area->app_area_home);
        } else {
            return redirect ('/users/'. $user->id)
                ->with('error', 'Nimate dovoljenja.');
        } 

           
    }
    public function emqq()
    {
        //return (1);
        $quality_questionnaires = QualityQuestionnaire::all()->sortByDesc('id');
        $quality_questions = QualityQuestion::where('quality_question_parent_id', null)
            ->get();
        $quality_questions_last = QualityQuestion::where('quality_question_parent_id', null)
            ->orderBy('created_at', 'desc')->take(5)->get();
        return view('home.expertgroups.show')
            ->with ('quality_questions_last',$quality_questions_last)
            ->with ('quality_questions',$quality_questions)
            ->with ('quality_questionnaires',$quality_questionnaires);
    }

    public function schoolareas() 
    {
        return ('Staro področje - prenovljeno');
        return view('home.expertgroups.schoolareas.show');
    }
    
    public function admin()
    {
        //return (1);
        return view('app.home'); 
    }
    
    public function schoolq()
    {
        //return (1);
        return view('home.schoolq.show');
    }
    public function organization()
    {
        //return (1);
        return redirect ('/organization_admin');
    }

    public function schools()
    {
        return (23);

    if (auth(  )->user()->if_appadmin()) {
        return redirect ('/admin');
    }
    //*************** Osnovne poizvedbe ***********************
    $id = auth()->user()->id;
    $user = User::find ($id); 
    if (!isset($user)){
        return redirect ('/home')
            ->with('error', 'Napaka. Oseba ne obstaja');
    }
    $person = Person::find ($user->user_person_id);
    $personOrganization = Auth::user()->person->person_organizations()->where('active', true)->first();
    $school_organizatin_year = SchoolOrganizationYear::where('school_organization_id', $personOrganization->school_organization_id)
        ->where('school_organization_year_current', true)    
        ->first();

    $person_organization = Auth::user()->person->person_organizations()->where('active', true)->first();

    $quality_systems = QualitySystem::All();

    //Naključnih 5 vprašanj iz kampanje
    $quality_campaign = QualityCampaign::first();
    $quality_campaign_questionnaire_first = $quality_campaign->questionnaires->first();

    $quality_campaign_questionnaire_questions_random = $quality_campaign_questionnaire_first->questions()->inRandomOrder()->limit(5)->get();
    
    //return ($quality_campaign);
    //return ($quality_campaign_questionnaire_questions_random);
    $quality_campaign_questionnaire_answers = collect();
    foreach ($quality_campaign_questionnaire_questions_random as $quality_campaign_questionnaire_question) {
        foreach ($quality_campaign_questionnaire_question->subquestions as $quality_campaign_questionnaire_question_subquestion) {
            $answers = QualityAnswer::where('quality_question_id', $quality_campaign_questionnaire_question_subquestion->id)
                ->where('quality_campaign_id',$quality_campaign->id)
                ->get();
            $quality_campaign_questionnaire_answers = $quality_campaign_questionnaire_answers->concat($answers);
        }
    }
    $quality_campaign_questionnaire_answers = $quality_campaign_questionnaire_answers->groupBy('quality_question_parent_id');
    //return ($quality_campaign_questionnaire_answers);

    //******* Aktivne kampanje ************
    $now = Carbon::now();
    $quality_status_aktivno = QualityStatus::where('quality_status_name','Aktivno')
        ->first();
    $active_quality_campaigns = QualityCampaign::where('quality_status_id', $quality_status_aktivno->id)
        ->where('school_organization_year_id', $person_organization->school_organization_year_id)
        ->get();


    //************** Kampanje v šolskem letu ********************
    $date_now = Carbon::now();
    // Določitev trenutnega šolskega leta
    if ($date_now->month >= 9) {
        // Če smo septembra ali kasneje, smo v tekočem šolskem letu
        $startOfSchoolYear = Carbon::create($date_now->year, 9, 1);
        $endOfSchoolYear = Carbon::create($date_now->year + 1, 8, 31);
    } else {
        // Če smo avgusta ali prej, smo še v prejšnjem šolskem letu
        $startOfSchoolYear = Carbon::create($date_now->year - 1, 9, 1);
        $endOfSchoolYear = Carbon::create($date_now->year, 8, 31);
    }

    $school_year_campaigns = QualityCampaign::where('school_organization_year_id', $person_organization->school_organization_year_id)
        ->get();
    $random_school_year_campaign_answers = collect();
    $random_school_year_campaigns = $school_year_campaigns->shuffle();
    foreach ($random_school_year_campaigns as $random_school_year_campaign) {
        $random_school_year_campaign_answers = $random_school_year_campaign->answers;
        if ($random_school_year_campaign_answers->isNotEmpty()) {
            // Našli ste odgovor, tukaj lahko izvedete potrebne operacije
            break; // Prenehanje zanke
        }
    }
    $sorted_answers = $random_school_year_campaign_answers->sortBy('quality_question_id');
$statistics = [];

// Preverjanje, ali obstajajo odgovori, preden nadaljujemo
if ($sorted_answers->isNotEmpty()) {
foreach ($sorted_answers as $answer) {
    $question_id = $answer->quality_question_id;
    $question = QualityQuestion::find($question_id);
    
    // Preverjanje, ali je vprašanje najdeno
    if ($question) {
        $person_role = $question->personrole->quality_person_role_name;

        if (!isset($statistics[$question_id])) {
            $statistics[$question_id] = [
                'question_name' => $question->quality_question_name,
                'person_role_fontawsome' => $question->personrole->quality_person_role_fontawesome,
                'person_role_color' => $question->personrole->quality_person_role_color,
                'person_role' => $person_role,
                'total_answers' => 0,
                'total_value' => 0,
                'min_value' => $question->type->quality_question_type_value_min,
                'max_value' => $question->type->quality_question_type_value_max,
            ];
        }

        $statistics[$question_id]['total_answers']++;
        $statistics[$question_id]['total_value'] += $answer->quality_answer_value;
    }
}

// Izračun povprečne vrednosti, vendar preveri, ali število odgovorov ni 0
foreach ($statistics as &$statistic) {
    if ($statistic['total_answers'] > 0) {
        $statistic['average_value'] = $statistic['total_value'] / $statistic['total_answers'];
    } else {
        $statistic['average_value'] = 0;
    }
}
}

//return($statistics);

    //return($active_quality_campaigns);
    $school_year_campaign = QualityCampaign::where('school_organization_year_id', $person_organization->school_organization_year_id)
        ->latest()
        ->first();
    //return($active_quality_campaigns);
    
    return view('home.school.show')
        ->with ('person_organization',$person_organization)
        ->with ('statistics',$statistics)
        ->with ('quality_campaign_questionnaire_answers',$quality_campaign_questionnaire_answers)
        ->with ('school_organizatin_year',$school_organizatin_year)
        ->with ('random_school_year_campaign_answers',$random_school_year_campaign_answers)
        ->with ('school_year_campaigns',$school_year_campaigns)
        ->with ('school_year_campaign',$school_year_campaign)
        ->with ('active_quality_campaigns',$active_quality_campaigns)
        ->with ('quality_systems',$quality_systems)
        ->with ('quality_campaign',$quality_campaign)
        ->with ('user',$user)
        ->with ('person',$person);
   

    }
}
