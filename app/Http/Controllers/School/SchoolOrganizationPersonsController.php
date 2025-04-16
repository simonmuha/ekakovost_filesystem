<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School\SchoolOrganizationPerson;
use App\Models\School\SchoolOrganization;
use App\Models\School\SchoolOrganizationYear;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;


class SchoolOrganizationPersonsController extends Controller
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

        $school_organization = SchoolOrganization::find($organization_id);
        if ($school_organization != null) {
            $school_organization_year_current = SchoolOrganizationYear :: where('school_organization_id',$organization_id)
                ->where('school_organization_year_current',true)
                ->first();
            $school_organization_persons = SchoolOrganizationPerson:: where ('school_organization_id', $organization_id)
                ->where('school_organization_year_id',$school_organization_year_current->id)
                ->get();
            //return ($school_organization_persons);
            //session(['team_id' => $team->team_id]);

            setPermissionsTeamId($school_organization->id);
            //return($school_organization->id);
            return view('schools.organizations.persons.index')
                ->with('school_organization', $school_organization)
                ->with('school_organization_persons', $school_organization_persons);
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
    public function create($organization_id)
    {
        //
        $school_organization = SchoolOrganization::find($organization_id);
        if ($school_organization != null) {
            if ($school_organization->school_organization_parent_id == null) {
                return view('schools.organizations.persons.create')
                    ->with('school_organization', $school_organization);
            } else {
                return redirect('/schools/organizations/'.$school_organization->id)
                    ->with('error', 'Organizacijski enoti ne morete dodajati novih oseb.');
            }
        } else {
            return redirect('/schools/organizations/')
                ->with('error', 'Organizacija ne obstaja.');

        }
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
            'person_name' => 'required',
            'person_surname' => 'required',
            'person_email' => 'required|email',
        ],
        [
            'person_name.required' => 'Potrebno je vnesti ime.',
            'person_surname.required' => 'Potrebno je vnesti priimek.',
            'person_email.required' => 'Potrebno je vnesti e-naslov.',
            'person_email.email' => 'Potrebno je vnesti pravilen e-naslov.',
        ]);
        $exists = Person::where('person_email', $request->input('person_email'))
                ->where('school_organization_id', $request->input('school_organization_id'))
                ->exists();

        if ($exists) {
            return redirect('/schools/organizations/'.$request->input ('school_organization_id'))
                    ->with('error', 'Oseba že obstaja v vaši organizaciji.');
        } else {
            $person = new Person;
            $person->person_name = $request->input ('person_name');
            $person->person_surname = $request->input ('person_surname');
            $person->person_email = $request->input ('person_email');
            $person->school_organization_id = $request->input ('school_organization_id');
            $person->person_employment_start_date = $request->input ('person_employment_start_date');
            $person->person_employment_end_date = $request->input ('person_employment_end_date');
            $person->save();

            $school_organization_people = new SchoolOrganizationPerson;
            $school_organization_people->school_organization_id = $request->input ('school_organization_id');
            $school_organization_people->person_id = $person->id;
            $school_organization_year_current = SchoolOrganizationYear :: where('school_organization_id',$request->input ('school_organization_id'))
                ->where('school_organization_year_current',true)
                ->first();

            $school_organization_people->school_organization_year_id = $school_organization_year_current->id;
            $school_organization_people->active = false;
            $school_organization_people->save();

            return redirect('/schools/organizations/'.$request->input ('school_organization_id'))
                    ->with('success', 'Oseba je bila pravkar kreirana.');
        }
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

        $school_organization_person = SchoolOrganizationPerson::find($id);
        //return ($school_organization_person);
        //return ($school_organization_person);
        //return ($school_organization_person->school_organization_id);
        $roles = Role::where('team_id', $school_organization_person->school_organization_id)
            ->get(); 

        //return ($roles);
        
        //return ($school_organization_person->school_organization_id);
        //return ($school_organization_person->person->user_id);
        if ($school_organization_person->person->user_id != null) {
            $user = User::find($school_organization_person->person->user_id);
        } else {
            $user = null;
            $user_roles = null;
            $person_roles = null;
        }


        return view('schools.organizations.persons.show')
            ->with('roles', $roles)
            ->with('person_roles', )
            ->with('school_organization_person', $school_organization_person);
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


    public function add_role_to_person_in_organization(Request $request)
    {
        $person = Person::find($request->input('person_id'));
        if (!$person) {
            return response()->json(['error' => 'Oseba ne obstaja'], 404);
        }

        $user = User::find($person->user_id);
        if (!$user) {
            return response()->json(['error' => 'Uporabnik ne obstaja'], 404);
        }

        $role = Role::find($request->input('role_id'));
        if (!$role) {
            return response()->json(['error' => 'Vloga ne obstaja'], 404);
        }

        $team_id = $request->input('school_organization_id');
        if (!$team_id) {
            return response()->json(['error' => 'Manjka team_id'], 400);
        }

        // Preveri, ali uporabnik že ima dodeljeno to vlogo v tej ekipi
        if ($user->hasRole($role)) {
            return response()->json(['error' => 'Uporabnik že ima to vlogo v tej ekipi'], 400);
        }

        setPermissionsTeamId($user->team_id);
        $user->assignRole($role);

     

        return redirect('/schools/organizations/persons/'.$request->input('person_id'))
            ->with('success', 'Dodana vloga.');

    }
    public function change_person_active_organization($id)
    {
        //
        
        // Preveri, ali oseba obstaja
        $school_organization_person = SchoolOrganizationPerson::find($id);
        //return ($school_organization_person);
        //return (Auth::user()->user_person_id);
        if($school_organization_person->person_id == Auth::user()->user_person_id ) {
            //return (1);
            $school_organization_person_old = SchoolOrganizationPerson::where('person_id', Auth::user()->user_person_id)
                ->where('active', true)
                ->update(['active' => false]);
            $school_organization_person->active = true;
            $school_organization_person->save();
        }
        return redirect()->back();

    }

}
