<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\School\SchoolEducationalProgram;
use App\Models\School\SchoolEducationalProgramType;


class AppEducationalProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        //$this->middleware('check.area:appadmin'); // Tukaj specificiraš kodo področja
        $this->middleware('check.user.area:appadmin'); // Tukaj specificiraš kodo področja
    }
    public function index()
    {
        //
        
        $school_educational_programs = SchoolEducationalProgram::all();
        return view('app.educationalprograms.index')
            ->with('school_educational_programs', $school_educational_programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $school_educational_program_types = SchoolEducationalProgramType::all();
        $school_educational_program_types = SchoolEducationalProgramType:: pluck('school_educational_program_type_name', 'id');
        return view('app.educationalprograms.create')
            ->with('school_educational_program_types', $school_educational_program_types);
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
        request()->validate([
            'school_educational_program_name' => 'required|max:255|string', 
        ],
        [
            'school_educational_program_name.required' => 'Potrebno je vnesti ime programa.',
        ]);
        
        $school_educational_program = new SchoolEducationalProgram;
        $school_educational_program->school_educational_program_name = $request->input ('school_educational_program_name');
        $school_educational_program->school_educational_program_type_id = $request->input ('school_educational_program_type_id');
        $school_educational_program->save();
        return redirect('/app/educationalprograms/')
            ->with('success', 'Dodano.');
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
        $school_educational_program = SchoolEducationalProgram::find($id);
        
        return view('app.educationalprograms.show')
            ->with('school_educational_program', $school_educational_program);
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
        $school_educational_program = SchoolEducationalProgram::find($id);
        $school_educational_program_types = SchoolEducationalProgramType::all();
        $school_educational_program_types = SchoolEducationalProgramType:: pluck('school_educational_program_type_name', 'id');
        return view('app.educationalprograms.edit')
        ->with('school_educational_program_types', $school_educational_program_types)
        ->with('school_educational_program', $school_educational_program);
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
        request()->validate([
            'school_educational_program_name' => 'required|max:255|string', 
        ],
        [
            'school_educational_program_name.required' => 'Potrebno je vnesti ime programa.',
        ]);
        
        $school_educational_program = SchoolEducationalProgram::find($id);
        $school_educational_program->school_educational_program_name = $request->input ('school_educational_program_name');
        $school_educational_program->school_educational_program_type_id = $request->input ('school_educational_program_type_id');
        $school_educational_program->save();
        return redirect('/app/educationalprograms/')
            ->with('success', 'Posodobljeno.');
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
