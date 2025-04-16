<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //$this->middleware('check.area:schooladmin'); // Tukaj specificiraš kodo področja
        $this->middleware('check.user.area:schooladmin'); // Tukaj specificiraš kodo področja
    }
    public function index()
    {
        //
        $person_active = Auth::user()->active_person; 
        $active_school_year = $person_active->school_organization_year_current;
        $school_organization_people = $active_school_year->people;
        //return ($school_organization_people);
            return view('school_admin.school.people.index')
            ->with('active_school_year', $active_school_year)
            ->with('school_organization_people', $school_organization_people);
            //$activePerson = $user->person_active();
return (1);

        return ($school_organization_people);
        $user_school_active = $user->active_organization->school; //pripravljeno v modelu
        
        if (!$user_school_active) {
            return redirect('home')
                ->with('error', 'Organizacija ne obstaja ali nimate dovoljenja.');
        }
        $school_year = 
        $school_organization_people = $user_school_active->active_year;

        $school_organization_people = [];
        return ($school_organization_people);
            return view('school_admin.school.people.index')
                ->with('school_organization_people', $school_organization_people);
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
        $user_school_active = $user->active_organization->school; //pripravljeno v modelu
        if (!$user_school_active) {
            return redirect()->back()
                ->with('error', 'Nimate določene aktivne osebe');
        }
        $person = Person::find($id);
        //return ($user_school_active);
        //return ($person);
        if (!$person) {
            return redirect()->back()
                ->with('error', 'Oseba ne obstaja');
        }
        if ($person->school_organization_id != $user_school_active->id) {
            return redirect()->back()
                ->with('error', 'Oseba ni v vaši organizaciji');
        }
        return view('school_admin.school.people.show')
            ->with('person', $person);

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
