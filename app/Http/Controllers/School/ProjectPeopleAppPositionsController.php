<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Projects\Project;
use App\Models\App\AppPositionCategory;
use App\Models\App\AppPosition;
use App\Models\App\AppPositionCategoryPivot;

class ProjectPeopleAppPositionsController extends Controller
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
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Display the specified project's people and their app positions.
     *
     * This method retrieves the project by its ID, fetches related people,
     * and the app position categories specific to projects. It ensures the
     * 'Projects' category exists, retrieves all subcategories with positions,
     * and gathers the current authenticated user and their organization details.
     * Finally, it returns a view with necessary data, including project,
     * school people, and project people.
     *
     * @param int $project_id The ID of the project to display.
     * @return \Illuminate\Http\Response The view with project people and positions.
     */

/******  d180059b-1b58-4473-ab5f-b0fa71b33a1e  *******/
    public function index($project_id)
    {
        //
        //return(1);
        $project = Project::find($project_id);
        $project_people = $project->people;
        $app_position_category = AppPositionCategory::where('app_position_category_name', 'Projects')->first();
        if (!$app_position_category) {
            // Če ni najdeno, se vrni na prejšnjo stran z napako
            return redirect()->back()->with('error', 'Ni najdenih kategorij delovnih mest za projekte.');
        }

        $app_position_subcategories = $app_position_category->subcategories()->with('positions')->get();
        $user = Auth::user();
        $active_status = $user->active_status;
        $person = $active_status->person;
        $app_organization =$person->organization;
        $school_organization = $app_organization->school;
        $school_people = $school_organization->active_year->people;
        
        //$school_people = Person::all();
        //return ($app_position_subcategories);

        return view('school.projects.people.app_positions.index')
            ->with('app_position_subcategories', $app_position_subcategories)
            ->with('project', $project)
            ->with('school_people', $school_people)
            ->with('project_people', $project_people); 
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
