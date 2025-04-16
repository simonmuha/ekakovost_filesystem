<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School\SchoolOrganizationEducationalProgram;
use App\Models\School\SchoolOrganization;
use App\Models\School\SchoolOrganizationYear;
use App\Models\School\SchoolOrganizationEducationalProgramClass;
use Illuminate\Support\Facades\Auth;


class SchoolOrganizationEducationalProgramsController extends Controller
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
        if (Auth::user()->person) {
            // Preveri, ali uporabnik ima aktivno povezavo s šolsko organizacijo
            $personOrganization = Auth::user()->person->person_organizations()->where('active', true)->first();
            if ($personOrganization) {
                // Preveri, ali ima povezana oseba nastavljen šolsko organizacijski id
                if ($personOrganization->school_organization_id) {
                    // Vse je v redu, lahko nadaljujete z uporabo $organization_id
                    $organization_id = $personOrganization->school_organization_id;
                } else {
                    // Če šolska organizacija ni nastavljena, vrni sporočilo
                    return redirect('/schools/')
                        ->with('error', 'Šola ne obstaja.');
                }
            } else {
                // Če ni aktivne povezave s šolsko organizacijo, vrni sporočilo
                return redirect('/schools/')
                        ->with('error', 'Nimate nastavljene šole.');
            }
        } else {
            // Če uporabnik nima povezanega uporabnika, vrni sporočilo
            return redirect('/schools/')
                        ->with('error', 'Ni uproabnika.');
        }
        $organization_id = Auth::user()->person->person_organizations()->where('active', true)->first()->school_organization_id;
        $school_organization = SchoolOrganization::find($organization_id);
        if ($school_organization != null) {
            $school_organization_year_current = SchoolOrganizationYear :: where('school_organization_id',$organization_id)
                ->where('school_organization_year_current',true)
                ->first();

            $school_organization_educationalprograms = SchoolOrganizationEducationalProgram:: where ('school_organization_id', $organization_id)
                ->where('school_organization_year_id',$school_organization_year_current->id)
                ->get();
            //return ($school_organization_persons);
            return view('schools.organizations.educationalprograms.index')
                ->with('school_organization', $school_organization)
                ->with('school_organization_educationalprograms', $school_organization_educationalprograms);
        } else {
            return redirect('/schools/organizations/')
                ->with('error', 'Organizacija ne obstaja.');
        }
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
        $school_organization_educational_program = SchoolOrganizationEducationalProgram::find($id);
        
        if (!$school_organization_educational_program) {
            return back()->with('error', 'Izobraževalni program ni bil najden.'); 
        }
        $organization_educational_program_classes = SchoolOrganizationEducationalProgramClass::where('school_organization_educational_program_id',$school_organization_educational_program->id)
        ->orderBy('class_year')
        ->get();
        return view('schools.organizations.educationalprograms.show')
            ->with('organization_educational_program_classes', $organization_educational_program_classes)
            ->with('school_organization_educational_program', $school_organization_educational_program);
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
