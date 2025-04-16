<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\App\AppEmail;

class SchoolAdminController extends Controller
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
        return redirect('/home');

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
    public function home()
    {
        //
        $user = Auth::user();
        $school_organization = $user->active_organization->school;
        //return ($school_organization);
        if (!$school_organization) {
            return redirect('/users/'. $user->id)
                ->with('error', 'Organizacija nima določene šole.'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
        }
        $school_active_year = $school_organization->active_year;
        $school_organization_people = $school_active_year->people;
        //return ($school_organization);
        //Dnevno obveščanje

        $app_emails = AppEmail::All();

        //return ($app_emails->first()->schedules($school_organization->app_organization->id));
        return view('school_admin.home') 
        ->with('app_emails', $app_emails)
        ->with('school_organization_people', $school_organization_people)
        ->with('school_organization', $school_organization);
    }

}
