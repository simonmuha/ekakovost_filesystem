<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School\SchoolOrganizationYear;

class SchoolOrganizationYearsController extends Controller
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
    public function index($organization)
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

    public function add_school_year_to_organization(Request $request)
    { 
        $school_organization_year = new SchoolOrganizationYear;
        $school_organization_year->school_organization_id = $request->input ('school_organization_id');
        $school_organization_year->school_year_id = $request->input ('school_year_id');

        if ($request->input ('school_organization_year_current') != null) {
            $school_organization_year->school_organization_year_current = false;
        }
        else {
            $school_organization_year->school_organization_year_current = true;
        }
        $school_organization_year->save();
        return redirect('/schools/organizations/'.$request->input ('school_organization_id'))
            ->with('success', 'Organizaciji je dodano šolsko leto.');
    }
}
