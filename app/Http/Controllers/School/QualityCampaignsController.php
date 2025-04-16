<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\School\SchoolYear;
use App\Models\School\SchoolOrganizationYear;

use App\Models\Quality\QualityCampaign;

class QualityCampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    { 
        $this->middleware('auth');
    }
    public function index() 
    {
        //
        $user = Auth::user();
        $person = $user->active_person; 
        $user_school_active = $user->active_organization->school;
        $school_areas = $user_school_active->school_areas;
        $school_year = $person->school_organization_year_current;

        //return ($school_year->year);

        $school_year_start = Carbon::parse($school_year->year->school_year_start);
        $school_year_end = Carbon::parse($school_year->year->school_year_end);

        $last_year_start = $school_year_start->subYear(); // Zmanjšamo za eno leto
        $last_year_end = $school_year_end->subYear(); // Zmanjšamo za eno leto
        
        // Poiščemo lansko šolsko leto v bazi
        $last_school_year = SchoolYear::where('school_year_start', '=', $last_year_start)
                                        ->where('school_year_end', '=', $last_year_end)
                                        ->first();
        
        // Če želite preveriti, ali je lansko leto najdeno:
        if ($last_school_year) {
            $last_school_year = SchoolOrganizationYear::where('school_year_id', '=', $last_school_year->id)
                                        ->where('school_organization_id', '=', $school_year->school_organization_id)
                                        ->first();      
        }
        $quality_campaigns = QualityCampaign::where('school_organization_year_id', '=', $school_year->id)
        ->get();

        $quality_campaigns_last_year = QualityCampaign::where('school_organization_year_id', '=', $last_school_year->id)
        ->get();

        //return ($quality_campaigns_last_year);
        return view('school.quality.campaigns.index')
        ->with('quality_campaigns', $quality_campaigns)
        ->with('quality_campaigns_last_year', $quality_campaigns_last_year)
        ->with('last_school_year', $last_school_year)
        ->with('school_year', $school_year);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $quality_campaign = QualityCampaign::find($id);

        $quality_campaign_target_groups = $quality_campaign->targetgroups;
        $quality_campaign_target_group_person_roles = collect();
        foreach ($quality_campaign_target_groups as $quality_campaign_target_group) {
            $quality_campaign_target_group_person_roles = $quality_campaign_target_group_person_roles->merge($quality_campaign_target_group->personroles);
        }
        $quality_campaign_target_group_person_roles = $quality_campaign_target_group_person_roles->unique ('id');

        $quality_campaign_classes = $quality_campaign_target_groups->flatMap(function ($target_group) {
            return $target_group->classes;
        })->unique('id');
        //return($quality_campaign_target_group_person_roles->first()->appIconRemixIcon);

        $totalQuestions = $quality_campaign->questionnaires->sum(function ($questionnaire) {
            return $questionnaire->questions->count();
        });
        $totalAnswers = $quality_campaign->user_questionnaires->sum(function ($user_questionnaire) {
            return $user_questionnaire->user_questionnaire_answers->count();
        });
        
       

        return view('school.quality.campaigns.show')
        ->with('totalAnswers', $totalAnswers)
        ->with('totalQuestions', $totalQuestions)
        ->with('quality_campaign_target_groups', $quality_campaign_target_groups)
            ->with('quality_campaign_target_group_person_roles', $quality_campaign_target_group_person_roles)
            ->with('quality_campaign_classes', $quality_campaign_classes)
            ->with('quality_campaign', $quality_campaign);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
