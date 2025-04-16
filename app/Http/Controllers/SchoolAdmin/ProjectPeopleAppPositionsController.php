<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Projects\Project;
use App\Models\App\AppPositionCategory;
use App\Models\App\AppPosition;
use App\Models\App\AppPositionCategoryPivot;


use App\Models\Person;

use App\Models\Projects\ProjectPeopleAppPosition;

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
        //$this->middleware('check.area:schooladmin'); // Tukaj specificiraš kodo področja
        $this->middleware('check.user.area:schooladmin'); // Tukaj specificiraš kodo področja
    }
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

        return view('school_admin.projects.people.app_positions.index')
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
    public function create($projectId)
    {
        //
        //return (1);
        $project = Project::findOrFail($projectId); 
        $school_people = Person::all(); // Pridobi vse osebe, lahko dodaš filter
        $app_positions = AppPosition::all(); // Pridobi vse možne pozicije

        return view('school_admin.projects.people.create')
            ->with('project', $project)
            ->with('school_people', $school_people)
            ->with('app_positions', $app_positions);
    
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
        //return ($request);

        $project = Project::find($request->project_id);

        if (!$project) {
            return redirect()->back()->with('error', 'Projekt ni bil najden.');
        }

        $validated = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'person_id' => 'required|integer|exists:people,id',
            'position_category_pivot_id' => 'required|integer|exists:app_position_category_pivots,id',
            'project_person_app_position_start_date' => 'nullable|date|after_or_equal:' . ($project->project_start_date ?? '1900-01-01'),
            'project_person_app_position_end_date' => 'nullable|date|after_or_equal:project_person_app_position_start_date|before_or_equal:' . ($project->project_end_date ?? '9999-12-31'),
        ], [
            'project_id.required' => 'Projekt je obvezen.',
            'project_id.integer' => 'Projekt mora biti številka.',
            'project_id.exists' => 'Izbrani projekt ne obstaja.',
            'person_id.required' => 'Oseba je obvezna.',
            'person_id.integer' => 'Oseba mora biti številka.',
            'person_id.exists' => 'Izbrana oseba ne obstaja.',
            'position_category_pivot_id.required' => 'Delovno mesto je obvezno.',
            'position_category_pivot_id.integer' => 'Delovno mesto mora biti številka.',
            'position_category_pivot_id.exists' => 'Izbrano delovno mesto ne obstaja.',
            'project_person_app_position_start_date.nullable' => 'Začetni datum je lahko prazen.',
            'project_person_app_position_start_date.date' => 'Začetni datum ni veljaven datum.',
            'project_person_app_position_start_date.after_or_equal' => 'Začetni datum mora biti enak ali kasnejši od začetka projekta.',
            
            'project_person_app_position_end_date.nullable' => 'Končni datum je lahko prazen.',
            'project_person_app_position_end_date.date' => 'Končni datum ni veljaven datum.',
            'project_person_app_position_end_date.after_or_equal' => 'Končni datum mora biti enak ali kasnejši od začetnega datuma.',
            'project_person_app_position_end_date.before_or_equal' => 'Končni datum mora biti enak ali prej od konca projekta.',
        ]);

        // Preverimo, ali ima oseba že to funkcijo na projektu
        $existingRole = ProjectPeopleAppPosition::where('project_id', $request->project_id)
            ->where('person_id', $request->person_id)
            ->where('app_position_id', $request->app_position_id)
            ->exists();

        if ($existingRole) {
            return redirect()->back()->with('error', 'Oseba že ima to funkcijo na tem projektu.');
        }

        // Pridobimo začetni in končni datum projekta
        $project = Project::find($request->project_id);
        $projectStartDate = Carbon::parse($project->project_start_date);
        $projectEndDate = Carbon::parse($project->project_end_date);

        // Preverimo, ali so datumi znotraj obdobja projekta
        $startDate = $request->input('project_person_app_position_start_date') 
            ? Carbon::parse($request->input('project_person_app_position_start_date')) 
            : null;

        $endDate = $request->input('project_person_app_position_end_date') 
            ? Carbon::parse($request->input('project_person_app_position_end_date')) 
            : null;

        if ($startDate && $startDate->lt($projectStartDate)) {
            return redirect()->back()->with('error', 'Začetni datum mora biti znotraj obdobja projekta.');
        }

        if ($endDate && $endDate->gt($projectEndDate)) {
            return redirect()->back()->with('error', 'Končni datum mora biti znotraj obdobja projekta.');
        }

        $position_category_pivot = AppPositionCategoryPivot::find($request->position_category_pivot_id);

        // Dodamo osebi novo funkcijo na projektu
        ProjectPeopleAppPosition::create([
            'project_id' => $request->project_id,
            'person_id' => $request->person_id,
            'position_category_pivot_id' => $request->position_category_pivot_id ,
            'app_position_id' => $position_category_pivot->app_position->id,
            'project_person_app_position_start_date' => $startDate ? $startDate->format('Y-m-d') : null,
            'project_person_app_position_end_date' => $endDate ? $endDate->format('Y-m-d') : null,
        ]);

        return redirect('/school_admin/projects/'.$request->project_id.'/people/app_positions')
            ->with('success', 'Oseba uspešno dodana.');

        return response()->json(['success' => 'Funkcija je bila uspešno dodana osebi na projektu.'], 201);

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
