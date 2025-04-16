<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Person;


use App\Models\School\SchoolOrganizationYear;


class SchoolOrganizationPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    { 
        $this->middleware('auth');
        $this->middleware('check.user.area:school'); // Tukaj specificiraš kodo področja
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
    public function change_person_active_school_year($person_id, $school_organizational_year_id)
    { 
        $school_organizational_year = SchoolOrganizationYear::find($school_organizational_year_id);
        if (!$school_organizational_year) {
            return redirect('home')
                ->with('error', 'Šolsko leto ne obstaja.'); 
        }
        $person = Person::find($person_id);
        if (!$person) {
            return redirect('home')
                ->with('error', 'Oseba ne obstaja.'); 
        }
        if ($person->school_organization_year_id_current != $school_organizational_year_id){
            $person->school_organization_year_id_current = $school_organizational_year_id;
            $person->save();
            return redirect('home');
        } else {
            return back(); 
        }
    }
}
