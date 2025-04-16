<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Projects\Project;
use App\Models\Projects\ProjectTaskStatus;
use App\Models\Projects\ProjectTask;


use App\Models\App\AppPosition;
use App\Models\App\AppMediaType;

use App\Models\Person;

class ProjectsController extends Controller
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
        $person = $user->active_status->person;
        $school_year = $person->school_organization_year_current;
        $school_organization = $person->school;
        $active_year = $school_year->year;

        $projects = Project::where('project_school_organization_id',$school_organization->id)
            ->get();

        //return($school_organization);
        return view('school.projects.index')
            ->with('person', $person)
            ->with('projects', $projects);
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
        $user = Auth::user();
        $active_status = $user->active_status;
        $person = $active_status->person;


        $project = Project::find($id);
        $project_people = $project->people->unique('id');

        //return ($project_people);
        $school_people = Person::all();
        $app_positions = AppPosition::all();

        $mediaTypes = AppMediaType::withCount([
            'projectAppMedia as media_count' => function ($query) use ($id) {
                $query->where('project_id', $id);
            }
        ])->get();

        $task_statuses = ProjectTaskStatus::all();
        $project_tasks = ProjectTask::where('project_id', $project->id)->get();
        $project_events = $project->calendarEvents()
            ->wherePivot('active', true)
            ->where('calendar_event_end_time', '<', Carbon::now())
            ->orderBy('calendar_event_end_time', 'desc')
            ->limit(5)
            ->get();
        //return ($calendarEvents);
        //$project_people = [];
        $project = Project::with('posts')->find($id);
        return view('school.projects.show')
        ->with('project_posts', $project_posts)
        ->with('project_events', $project_events)
        ->with('task_statuses', $task_statuses)
        ->with('project_tasks', $project_tasks)
        ->with('mediaTypes', $mediaTypes)
        ->with('app_positions', $app_positions)
        ->with('person', $person)
        ->with('school_people', $school_people)
        ->with('project_people', $project_people)
        ->with('project', $project);
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
