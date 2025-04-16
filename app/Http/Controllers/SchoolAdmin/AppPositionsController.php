<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;

use App\Models\App\AppPosition;

use App\Models\School\SchoolOrganizationPeopleAppArea;


class AppPositionsController extends Controller
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
        $app_positions = AppPosition::all();
        //return ($app_positions);
        return view('school_admin.app.positions.index')
            ->with('app_positions', $app_positions);
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
    
    public function store_person_to_possition(Request $request)
    {
        //
        //return($request);
        //potrebno določiti šolsko leto
        request()->validate([
            'app_position_id' => 'required|numeric|exists:app_positions,id',
            'person_id' => 'required|numeric|exists:people,id',
        ],
        [
            'app_position_id.required' => 'Izbrati morate delovno mesto.',
            'app_position_id.exists' => 'Izbrano delovno mesto ne obstaja.',
            'person_id.required' => 'Izbrati morate uporabnika.',
            'person_id.exists' => 'Izbrani uporabnik ne obstaja.',
        ]);

        $person = Person::find($request->input ('person_id'));

        $school_organization_people_app_area = new SchoolOrganizationPeopleAppArea;
        $school_organization_people_app_area->app_position_id = $request->input ('app_position_id');
        $school_organization_people_app_area->person_id = $request->input ('person_id');
        $school_organization_people_app_area->school_organization_year_id = 1;
        $school_organization_people_app_area->school_organization_id = $person->school_organization_id;
        $school_organization_people_app_area->save();
        return redirect('/school_admin/app/positions/'.$request->input ('app_position_id'))
                ->with('success', 'Dodan uporabnik.');
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
        $app_position = AppPosition::find($id);

        $user = Auth::user();
        $user_school_active = $user->active_school; //pripravljeno v modelu
        $school_organization_people = $user_school_active->people;

        if ($user_school_active) {
            return view('school_admin.app.positions.show')
                ->with('school_organization_people', $school_organization_people)
                ->with('app_position', $app_position);
        } else {
            return redirect('home')
                ->with('error', 'Nimate pravic.');
        }

        //return ($app_positions);
        
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
