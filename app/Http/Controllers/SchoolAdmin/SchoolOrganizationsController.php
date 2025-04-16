<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;



use App\Models\App\AppPositionPerson;
use App\Models\App\AppOrganization;
use App\Models\App\AppPosition;
use App\Models\App\AppUserActiveStatus;

use App\Models\School\SchoolOrganizationPerson;
use App\Models\School\SchoolOrganization;
use App\Models\School\SchoolOrganizationYearPersonPosition;
use App\Models\School\SchoolOrganizationYearPerson;
use App\Models\School\SchoolOrganizationYear;



class SchoolOrganizationsController extends Controller
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
        //return(1); 
        $person_active = Auth::user()->active_person;
        if (!$person_active) {
            return redirect()->back()
                ->with('error', 'Nimate določene aktivnega profila.');
        }
        //return ($person_active);
        if ($person_active->school_organization_id == null) {
            $app_organization = AppOrganization::find($person_active->app_organization_id);
            if (!$app_organization) {
                return redirect()->back()
                    ->with('error', 'Organizacija ne obstaja.');
            }
            $school = $app_organization->school;
            if (!$school) {
                return redirect()->back()
                    ->with('error', 'Šola ne obstaja.');
            }
            $person_active->school_organization_id = $school->id;
            $person_active->save();
        }
        return redirect('/school_admin/school/'.$person_active->school_organization_id);
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
        //return (1);
        $school_admin_user = Auth::user();
        $school_admin_active_person = $school_admin_user->active_person;
        //return ($school_admin_active_person);

        $school_admin_active_person_position = $school_admin_active_person->position('schooladmin');

        //return ($school_admin_active_person_position);
        if (!$school_admin_active_person_position) {
            return redirect()->back()
                ->with('error', 'Nimate pravic.');
        } 
        $school_admin_active_person_subpositions =$school_admin_active_person_position->subpositions;
        //return ($school_admin_active_person_subpositions);
        if (!$school_admin_active_person) {
            return redirect()->back()
                ->with('error', 'Nimate določene aktivnega profila.');
        }
        if ($school_admin_active_person->school_organization_id != $id) {
            return redirect()->back()
                ->with('error', 'S tem profilom ne morete upravljati izbrano šolo.');
        }
        $school_organization = $school_admin_active_person->school;
        if (!$school_organization) {
            return redirect()->back()
                ->with('error', 'Šola ni določena.');
        }
        $school_organization_year = $school_admin_active_person->school_organization_year_current;
        $school_organization_year_people = $school_organization_year->year_people;
        //return($school_organizattion_year_people);

        $app_positions = AppPosition::all(); 
        
        $school_organization_people = SchoolOrganizationPerson::where('school_organization_id', $school_organization->id)
            ->where('school_organization_year_id', $school_organization_year->id)
            ->get();
        //return ($school_organization_people);
        //return ($school_organization_year_people);
        $school_organization_year_people = $school_organization_year_people->unique('person_id');

        return ($school_organization_year_people);
        $app_organization = $school_organization->app_organization;
        if (!$app_organization) {
            return redirect()->back()
                ->with('error', 'Organizacija ne obstaja.'); 
        }

        //return ($app_organization);

        $app_organization_people = $app_organization->people;

        return view('school_admin.school.show')
            ->with('school_admin_active_person_subpositions', $school_admin_active_person_subpositions)
            ->with('school_organization_year_people', $school_organization_year_people)
            ->with('school_organization_people', $school_organization_people)
            ->with('app_organization_people', $app_organization_people)
            ->with('school_organization_year', $school_organization_year)
            ->with('app_positions', $app_positions)
            ->with('school_organization', $school_organization);
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
    public function add_school_year_to_school(Request $request)
    { 
       //return ($request);

        request()->validate([
            'school_organization_id' => 'required|exists:school_organizations,id',         
            'school_year_id' => 'required|exists:school_years,id',
        ],
        [
            'school_organization_id.required' => 'Potrebno je izbrati šolo.',
            'school_organization_id.exists' => 'Šola ne obstaja.',
            'school_year_id.required' => 'Potrebno je izbrati šolsko leto.',
            'school_year_id.exists' => 'Šolsko leto ne obstaja.',

        ]);
        $school_organization_year = SchoolOrganizationYear::where('school_organization_id',$request->input ('school_organization_id'))
            ->where('school_year_id',$request->input ('school_year_id'))
            ->first();
        if ($school_organization_year) {
            return redirect()->back()
                ->with('error', 'Šolsko leto že obstaja v šoli.');
        }

        $school_organization_year = new SchoolOrganizationYear;
        $school_organization_year->school_organization_id = $request->input ('school_organization_id');
        $school_organization_year->school_year_id = $request->input ('school_year_id');

        $school_organization_year->school_organization_year_current = false;
        $school_organization_year->save();
        return redirect('/school_admin/school/organization/years')
            ->with('success', 'Organizaciji je dodano šolsko leto.');
    } 
    public function add_person_to_school($school_organization_id) 
    { 

        $school_admin_user = Auth::user();
        $school_admin_active_person = $school_admin_user->active_person;
        //return ($school_admin_active_person);
        $school_organization_year = $school_admin_active_person->school_organization_year_current;

        $school_admin_active_person_position = $school_admin_active_person->position('schooladmin');

        //return ($school_admin_active_person_position);
        if (!$school_admin_active_person_position) {
            return redirect()->back()
                ->with('error', 'Nimate pravic.');
        } 
        $school_admin_active_person_subpositions =$school_admin_active_person_position->subpositions;



        $school_organization = SchoolOrganization::find($school_organization_id);
        if (!$school_organization) {
            return redirect('/users/'. $school_admin_user->id)
                ->with('error', 'Šola ne obstaja'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
        }
        if ($school_admin_active_person->school_organization_id != $school_organization->id) {
            return redirect('/users/'. $school_admin_user->id)
                ->with('error', 'Ni vaša šola'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
        }
        $app_organization = $school_organization->app_organization;
        $school_active_year = $school_organization->active_year;


        $app_organization_users = Person::where('app_organization_id', $app_organization->id)
        ->pluck('person_name', 'id');

        $app_organization_users = $app_organization->people
            ->pluck('person_name', 'id');


        $orgAdminPositions = $school_admin_active_person->positions()
        ->whereHas('areas', function($query) {
            $query->where('app_area_code', 'orgadmin')
                    ->whereNull('app_area_parent_id');
        })
        ->get();

        // Pridobimo vse podrejene pozicije za vsako najdeno orgAdmin pozicijo
        $allPositions = collect();
        foreach ($orgAdminPositions as $position) {
            $allPositions->push($position);
            $allPositions = $allPositions->merge($position->subpositions);
            }

        // Odstranimo morebitne podvojene pozicije
        $app_positions = $allPositions->unique('id')
            ->pluck('app_position_name', 'id');



            
        //return ($app_organization_users); 
        return view('school_admin.school.people.create')
        ->with('school_admin_active_person_subpositions', $school_admin_active_person_subpositions)
        ->with('school_organization_year', $school_organization_year)
        ->with('app_organization_users', $app_organization_users)
            ->with('app_positions', $app_positions)
            ->with('school_organization', $school_organization);
    } 
    
    public function store_app_position_to_person(Request $request) 
    { 

        //return ($request);
        request()->validate([
            'school_organization_year_id' => 'required|integer|exists:school_organization_years,id',
            'school_organization_year_person_id' => 'required|integer|exists:school_organization_year_people,id',
            'app_position_id' => 'required|integer|exists:app_positions,id',
        ],
        [
            'school_organization_year_id.required' => 'Izbrati morate šolsko leto.',
            'school_organization_year_id.integer' => 'ID šolskega leta mora biti število.',
            'school_organization_year_id.exists' => 'Izbrano šolsko leto ne obstaja.',
            'school_organization_year_person_id.required' => 'Izbrati morate uporabnika.',
            'school_organization_year_person_id.integer' => 'ID uporabnika mora biti število.',
            'school_organization_year_person_id.exists' => 'Izbran uporabnik ne obstaja.',
            'app_position_id.required' => 'Izbrati morate delovno mesto.',
            'app_position_id.integer' => 'ID delovnega mesta aplikacije mora biti število.',
            'app_position_id.exists' => 'Izbrano delovno mesto ne obstaja.',
        ]);

        //------------ začetna iskanja ------------------
        $school_admin_user = Auth::user();
        $school_admin_active_person = $school_admin_user->active_person;
        if (!$school_admin_active_person) {
            return redirect()->back()
                ->with('error', 'Nimate določene aktivnega profila.');
        }
        $school_admin_active_person_position = $school_admin_active_person->position('schooladmin');
        //return ($school_admin_active_person_position);
        if (!$school_admin_active_person_position) {
            return redirect()->back()
                ->with('error', 'Nimate pravic.');
        } 

        $school_organization_year_person = SchoolOrganizationYearPerson::find($request->input ('school_organization_year_person_id'));
        if (!$school_organization_year_person) {
            return redirect()->back()
                ->with('error', 'Šolsko leto za osebo ne obstaja.');
        }
        $person = $school_organization_year_person->person;
        $school_organization_year_person_position = SchoolOrganizationYearPersonPosition::where('school_organization_year_person_id',$school_organization_year_person->id)
            ->where('person_id',$person->id)
            ->where('app_position_id',$request->input ('app_position_id'))
            ->first();
        if ($school_organization_year_person_position) {
            return redirect()->back()->with('error', 'Oseba že ima to delovno mesto.');
        }
        $school_organization_year = SchoolOrganizationYear::find($request->input ('school_organization_year_id'));
        if (!$school_organization_year) {
            return redirect()->back()
                ->with('error', 'Šolsko leto organizacije ne obstaja.');
        }

        $app_position = AppPosition::find($request->input ('app_position_id'));
        if (!$app_position) {
            return redirect()->back()
                ->with('error', 'Delovno mesto ne obstaja.');
        }
        
        //return ($person);
        //----------------------------------------------------------------

        //---- Preverjanje pravic ------------------------------------------------------------

        //potrebno je preveriti ali ima uporabnik pravico dodajati to delovno mesto
        $school_admin_active_person_subpositions =$school_admin_active_person_position->subpositions;

        //return ($school_admin_active_person_subpositions);
        if (!$school_admin_active_person_subpositions->contains($app_position)) {
            return redirect()->back()->with('error', 'Nimate pravice dodajati to delovno mesto.');
        }

        return ($request);

        //---- Vpis v bazo ------------------------------------------------------------
        
        //return ($school_organization_year_person_position);

        $school_organization_year_person_position = new SchoolOrganizationYearPersonPosition;
        $school_organization_year_person_position->school_organization_year_person_id = $school_organization_year_person->id;
        $school_organization_year_person_position->person_id = $school_organization_year_person->person_id;
        $school_organization_year_person_position->app_position_id = $request->input ('app_position_id');
        $school_organization_year_person_position->save();

        $app_position_person = AppPositionPerson::where('person_id',$request->input('person_id'))
            ->where('app_position_id', $request->input('app_position_id'))
            ->first();
        if (!$app_position_person) {
            $app_position_person = new AppPositionPerson;
            $app_position_person->person_id = $person->id;
            $app_position_person->app_position_id = $request->input('app_position_id');
            $app_position_person->app_position_person_active = true;
            $app_position_person->save(); 
        }
        return ($school_organization_year_person);
        $school_organization= $school_organization_year_person->person->school;
        return redirect('/school_admin/school/'.$school_organization->id)
            ->with('success', 'Osebi je dodano delovno mesto.');

    } 
    public function store_person_to_school(Request $request)
    {
        //return($request);
        request()->validate([
            'person_id' => 'required|numeric|exists:people,id',
            'school_organization_year_id' => 'required|integer|exists:school_organization_years,id',
            'app_position_id' => 'required|integer|exists:app_positions,id',
        ],
        [
            'person_id.required' => 'Izbrati morate uporabnika',
            'person_id.exists' => 'Izbrani uporabnik ne obstaja',
            'school_organization_year_id.required' => 'Izbrati morate šolsko leto.',
            'school_organization_year_id.integer' => 'ID šolskega leta mora biti število.',
            'school_organization_year_id.exists' => 'Izbrano šolsko leto ne obstaja.',
            'app_position_id.required' => 'Izbrati morate delovno mesto.',
            'app_position_id.integer' => 'ID delovnega mesta aplikacije mora biti število.',
            'app_position_id.exists' => 'Izbrano delovno mesto ne obstaja.',
        ]);
        //return($request);

        //Preverjanje obstoja podatkov v bazah
        $person = Person::find($request->input('person_id'));
        //return($organization_main_person);
        if (!$person) {
            return redirect()->back()
                ->with('error', 'Oseba ne obstaja');
        }
        $app_position = AppPosition::find($request->input('app_position_id'));
        //return($organization_main_person);
        if (!$app_position) {
            return redirect()->back()
                ->with('error', 'Delovno mesto ne obstaja');
        }

        $school_organization_year = SchoolOrganizationYear::find($request->input('school_organization_year_id'));
        //return($school_organization_year);
        if (!$school_organization_year) {
            return redirect()->back()
                ->with('error', 'Ni šolskega leta.');
        }


        $school_organization_year_person = SchoolOrganizationYearPerson::where ('person_id',$person->id)
            ->where('school_organization_year_id',$school_organization_year->id)
            ->first();

        if (!$school_organization_year_person) {
            $school_organization_year_person = new SchoolOrganizationYearPerson;
            $school_organization_year_person->person_id = $request->input('person_id');
            $school_organization_year_person->school_organization_year_id = $request->input('school_organization_year_id');
            $school_organization_year_person->save(); 
            
            $person->school_organization_id = $school_organization_year->school_organization_id;
            $person->school_organization_year_id_current = $request->input('school_organization_year_id');
            $person->save();
        }

        $school_organization_year_person_position = SchoolOrganizationYearPersonPosition::where ('school_organization_year_person_id',$school_organization_year_person->id)
            ->where('person_id',$request->input('person_id'))
            ->where('app_position_id',$request->input('app_position_id'))
            ->first();

        if (!$school_organization_year_person_position) {
            $school_organization_year_person_position = new SchoolOrganizationYearPersonPosition;
            $school_organization_year_person_position->person_id = $request->input('person_id');
            $school_organization_year_person_position->school_organization_year_person_id = $school_organization_year_person->id;
            $school_organization_year_person_position->app_position_id = $request->input('app_position_id');
            $school_organization_year_person_position->save(); 
        }


        $app_position_person = AppPositionPerson::where('person_id',$request->input('person_id'))
            ->where('app_position_id',$request->input('app_position_id'))
            ->first();
        if (!$app_position_person) {
            $app_position_person = new AppPositionPerson;
            $app_position_person->person_id = $request->input('person_id');
            $app_position_person->app_position_id = $request->input('app_position_id');
            $app_position_person->app_position_person_active = true;
            $app_position_person->save(); 
        }

        $user = $person->user;

        $user_active_status = $user->active_status;
        if (!$user_active_status) {
            $user_active_status = new AppUserActiveStatus;
            $user_active_status->user_id = $user->id;
            $user_active_status->person_id = $person->id;
            $user_active_status->app_position_id = $app_position_person->app_position_id;
            $user_active_status->app_area_id = null;
            $user_active_status->save();
        } else {
            $user_active_status->person_id = $person->id;
            $user_active_status->save();
        }


        return redirect('/school_admin/school/'.$school_organization_year_person->person->school_organization_id)
            ->with('success', 'Dodan uporabnik.');

        // ---------------- Staro -------------------

        //return ($organization_main_person);

        if ($organization_main_person->app_organization_id == $school_organization_year->organization->app_organization->id) {
            $person = $organization_main_person;
        } else {
            
            $person = Person::where('user_id', $organization_main_person->user_id)
                ->where('app_organization_id', $school_organization_year->organization->app_organization->id)
                ->first();
            
            if (!$person) {
                $person =  new Person;
                $person->user_id = $organization_main_person->user_id;
                $person->person_name = $organization_main_person->person_name;
                $person->person_email = $organization_main_person->person_email;
                $person->app_organization_id = $school_organization_year->organization->app_organization->id;
                $person->save();
            } 
            //return ($person);
        }
        //return ($organization_main_person);
        if (!$person) {
            return redirect()->back()
                ->with('error', 'Oseba ne obstaja');
        }
        

        
        //potrebno je dodati delovno mesto tudi k organizaciji

        
        //return ($school_organization_year->organization->id);
        if ($person->school_organization_id == null) {
            $person->school_organization_year_id_current = $school_organization_year->id;
            $person->school_organization_id = $school_organization_year->organization->id;
            $person->save();
        }


        


        return redirect('/school_admin/school/'.$school_organization_year_person->person->school_organization_id)
            ->with('success', 'Dodan uporabnik.');
    }

    public function remove_position_from_person($school_organization_year_person_position_id)
    { 
        //
        //return ($school_organization_year_person_position_id);
        //------------ začetna iskanja ------------------
        //return($school_organization_year_person_position_id);
        $school_organization_year_person_position = SchoolOrganizationYearPersonPosition::find($school_organization_year_person_position_id);
        if (!$school_organization_year_person_position) {
            return redirect()->back()
                ->with('error', 'Uporabnik nima najdenega delovnega mesta.');
        }
        $app_position = $school_organization_year_person_position->app_position;
        if (!$app_position) {
            return redirect()->back()
                ->with('error', 'Delovno mesto ne obstaja.');
        }
        $school_organization_year_person = $school_organization_year_person_position->school_organization_year_person;
        if (!$school_organization_year_person) {
            return redirect()->back()
                ->with('error', 'Uporabnik ni nv šolskem letu.');
        }
        $person = $school_organization_year_person->person;
        if (!$person) {
            return redirect()->back()
                ->with('error', 'Uporabnik ne obstaja.');
        }

        if (count($school_organization_year_person->positions) <2) {
            return redirect()->back()->with('error', 'Uporabnik mora imeti vsaj eno delovno mesto v organizaciji.');
        }
        
        $school_organization_year_person_position->delete();

        //Ker smo zbrisali delovno mesto v šoli je potrebno pogledati ali to delovno mesto obstaja
        //v kakšnem drugem šolskem letu. Če ne obstaja potem zbrišemo delovno mesto tudi v organizaciji.

        $school_organization_year_person_position = SchoolOrganizationYearPersonPosition::where('person_id',$person->id)
            ->where('app_position_id',$app_position->id)
            ->first();

        if (!$school_organization_year_person_position) {
            $app_position_person = AppPositionPerson::where('app_position_id',$app_position->id)
                ->where('person_id',$person->id)
                ->first();
            if (!$app_position_person) {
                $app_position_person->delete();
            }
        }


        return redirect()->back()->with('success', 'Delovno mesto je bilo uspešno odstranjeno iz organizacije.');

    }



}
