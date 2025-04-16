<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Projects\Project;
use App\Models\Projects\ProjectAppMedia;
use App\Models\App\AppMediaType;

class ProjectAppMediasController extends Controller
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

    public function index($project_id)
    {
        //

        $project = Project::with('appMedia')->findOrFail($project_id);
        $app_media_types = AppMediaType::all();

        return view('school_admin.projects.app_medias.index')
            ->with('app_media_types', $app_media_types)
            ->with('project', $project);
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
        //return ($request);
        $validatedData = $request->validate([
            'project_id' => ['required', 'exists:projects,id'],
            'app_media_type_id' => ['required', 'exists:app_media_types,id'],
            'media_title' => ['required', 'string', 'max:255'],
            'media_description' => ['nullable', 'string'],
            'media_value' => ['nullable', 'url', 'max:255'],
            'media_valid_from' => ['nullable', 'date_format:d.m.Y'],
            'media_valid_until' => ['nullable', 'date_format:d.m.Y', 'after_or_equal:media_valid_from'],
        ], [
            'project_id.required' => 'Projekt ni določen.',
            'project_id.exists' => 'Izbran projekt ne obstaja.',
            'app_media_type_id.required' => 'Izberi tip medija.',
            'app_media_type_id.exists' => 'Izbrani tip medija ne obstaja.',
            'media_title.required' => 'Vnesite ime medija.',
            'media_title.max' => 'Ime medija ne sme presegati 255 znakov.',
            'media_value.url' => 'Vnesite veljaven URL.',
            'media_valid_from.date_format' => 'Datum začetka mora biti v obliki dd.mm.llll (npr. 01.03.2025).',
            'media_valid_until.date_format' => 'Datum konca mora biti v obliki dd.mm.llll (npr. 01.03.2025).',
            'media_valid_until.after_or_equal' => 'Datum konca mora biti enak ali po datumu začetka.',
        ]);
    
        // Pretvori datuma iz formata d.m.Y v Y-m-d (MySQL)
        $validatedData['media_valid_from'] = $validatedData['media_valid_from']
            ? \Carbon\Carbon::createFromFormat('d.m.Y', $validatedData['media_valid_from'])->format('Y-m-d')
            : null;
    
        $validatedData['media_valid_until'] = $validatedData['media_valid_until']
            ? \Carbon\Carbon::createFromFormat('d.m.Y', $validatedData['media_valid_until'])->format('Y-m-d')
            : null;
    
        // Shrani v bazo
        ProjectAppMedia::create([
            'project_id' => $validatedData['project_id'],
            'app_media_type_id' => $validatedData['app_media_type_id'],
            'media_title' => $validatedData['media_title'],
            'media_description' => $validatedData['media_description'] ?? null,
            'media_value' => $validatedData['media_value'] ?? null,
            'media_valid_from' => $validatedData['media_valid_from'],
            'media_valid_until' => $validatedData['media_valid_until'],
        ]);
    
        return redirect()->back()->with('success', 'Medij je bil uspešno dodan k projektu.');
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
