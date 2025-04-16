<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use App\Models\App\AppPosition;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Person;

use App\Models\Projects\Project;
use App\Models\Projects\ProjectStatus;

use App\Models\App\AppMediaType;


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
        //$this->middleware('check.area:schooladmin'); // Tukaj specificiraš kodo področja
        $this->middleware('check.user.area:schooladmin'); // Tukaj specificiraš kodo področja
    }
    
    public function index()
    {
        //
        $user = Auth::user();
        $projects = Project::all();
        return view('school_admin.projects.index')
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
        return view ('school_admin.projects.create');
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
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_name_short' => 'nullable|string',
            'project_description' => 'nullable|string',
            'project_start_date' => 'nullable|date',
            'project_end_date' => 'nullable|date|after_or_equal:project_start_date',
        ], [
            'project_name.required' => 'Ime projekta je obvezno.',
            'project_name_short.max' => 'Ime projekta ne sme biti daljše od 255 znakov.',
            'project_name.max' => 'Ime projekta ne sme biti daljše od 255 znakov.',
            'project_start_date.date' => 'Začetni datum mora biti veljaven datum.',
            'project_end_date.date' => 'Končni datum mora biti veljaven datum.',
            'project_end_date.after_or_equal' => 'Končni datum ne sme biti pred začetnim datumom.',
        ]);

        $user = Auth::user();
        $active_status = $user->active_status;
        $person = $active_status->person;
        $app_organization =$person->organization;
        $school_organization = $app_organization->school;

        $project_status = ProjectStatus::where('project_status_name', 'Pending')->first(); 

        if (!$project_status) {
            // Če status ni najden, vrni uporabnika z napako
            return back()->with('error', 'Status "V pripravi" ni bil najden. Prosimo, ustvarite status pred nadaljevanjem.');
        }
//return ($project_status);
        $project = Project::create([
            'project_name' => $request->project_name,
            'project_name_short' => $request->project_name_short,
            'project_description' => $request->project_description,
            'project_description_short' => $request->project_description_short,
            'project_start_date' => $request->project_start_date,
            'project_end_date' => $request->project_end_date,
            'project_owner_id' => $person->id, 
            'project_app_organization_id' => $app_organization->id, 
            'project_school_organization_id' => $school_organization->id, 
            'project_status_id' => $project_status->id,  
        ]);
        
        return redirect('/school_admin/projects/'.$project->id)
            ->with('success', 'Projekt je bil uspešno ustvarjen.');

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
        //return ($id);
        $user = Auth::user();
        $active_status = $user->active_status;
        $person = $active_status->person;


        $project = Project::find($id);
        $project_people = $project->project_people;
        //return ($project_people);
        $school_people = Person::all();
        $app_positions = AppPosition::all();
        $app_media_types = AppMediaType::all();
        //$project_people = [];
        return view('school_admin.projects.show')
        ->with('app_media_types', $app_media_types)
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
        $project = Project::find($id);
        //return (1);
        return view('school_admin.projects.edit')
            ->with('project', $project);
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

        // Validacija vhodnih podatkov s slovenskimi sporočili
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_name_short' => 'nullable|string|max:100',
            'project_start_date' => 'nullable|date',
            'project_end_date' => 'nullable|date|after_or_equal:project_start_date',
            'project_description_short' => 'nullable|string|max:500',
            'project_description' => 'nullable|string',
        ], 
        [
            'project_name.required' => 'Ime projekta je obvezno.',
            'project_name.string' => 'Ime projekta mora biti besedilo.',
            'project_name.max' => 'Ime projekta ne sme biti daljše od 255 znakov.',
            
            'project_name_short.max' => 'Kratko ime projekta ne sme biti daljše od 100 znakov.',
            
            'project_start_date.date' => 'Začetni datum mora biti veljaven datum.',
            'project_end_date.date' => 'Končni datum mora biti veljaven datum.',
            'project_end_date.after_or_equal' => 'Končni datum mora biti enak ali kasnejši od začetnega datuma.',
            
            'project_description_short.max' => 'Kratek opis ne sme biti daljši od 500 znakov.',
            'project_description.string' => 'Opis projekta mora biti besedilo.',
        ]);

        // Najdi projekt po ID-ju
        $project = Project::findOrFail($id);

        // Posodobi podatke
        $project->update($validatedData);

        // Preusmeritev nazaj z obvestilom
        return redirect('/school_admin/projects/'.$project->id)
            ->with('success', 'Projekt je bil uspešno posodobljen!');

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
