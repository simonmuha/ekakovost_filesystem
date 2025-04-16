<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\AppRolePerson;
use Illuminate\Support\Facades\Auth;

class AppRolePersonsController extends Controller
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
    public function change_person_app_role($app_role_person_id)
    {
        //prestavljeno na področja aplikacije - app - areas
        //
        /*

            //return ($app_role_person_id);
            // Preveri, ali oseba obstaja
            $app_role_person = AppRolePerson::find($app_role_person_id);
            //return ($school_organization_person);
            //return (Auth::user()->user_person_id);
            if($app_role_person->person_id == Auth::user()->user_person_id ) {
                //return (1);
                $app_role_person_old = AppRolePerson::where('person_id', Auth::user()->user_person_id)
                    ->where('app_role_people_active', true)
                    ->update(['app_role_people_active' => false]);
                $app_role_person->app_role_people_active = true;
                $app_role_person->save();
            }
            return redirect()->route('home');
        */
    }

}
