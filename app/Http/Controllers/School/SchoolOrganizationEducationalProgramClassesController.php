<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School\SchoolOrganizationEducationalProgram;
use App\Models\School\SchoolOrganizationEducationalProgramClass;


class SchoolOrganizationEducationalProgramClassesController extends Controller
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
    
    public function add_class_to_organization_educational_program(Request $request)
    {
        //
        //return ($request);
        $school_organization_educational_program = SchoolOrganizationEducationalProgram::find($request->input ('school_organization_educational_program_id'));
        if (!$school_organization_educational_program) {
            return back()->with('error', 'Izobraževalni program ni bil najden.'); 
        }
        $school_organization_educational_program = SchoolOrganizationEducationalProgramClass::firstOrCreate(
            [
                'class_year' => $request->input('class_year'),
                'school_organization_educational_program_id' => $request->input('school_organization_educational_program_id'),
                'class_name' => $request->input('class_name')
            ]
        );
        
        if ($school_organization_educational_program->wasRecentlyCreated) {
            return redirect('/schools/organizations/educationalprograms/'.$request->input('school_organization_educational_program_id'))
                ->with('success', 'Dodan oddelek.');
        } else {
            return redirect('/schools/organizations/educationalprograms/'.$request->input('school_organization_educational_program_id'))
                ->with('error', 'Oddelek že obstaja.');
        }

    }
}
