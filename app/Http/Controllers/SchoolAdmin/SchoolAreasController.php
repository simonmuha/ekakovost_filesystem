<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\SchoolAreas\SchoolArea;
use App\Models\School\SchoolOrganization;
use App\Models\SchoolAdmin\SchoolOrganizationSchoolArea;


class SchoolAreasController extends Controller
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
        $user = Auth::user();
        $user_school_active = $user->active_organization->school;
        $school_areas = $user_school_active->school_areas;

        $school_areas_ids = $user_school_active->school_areas->pluck('id')->toArray(); // ID-ji področij, ki jih šola že ima
        $school_areas_all = SchoolArea::all(); // Vsa področja

        // Poišči samo tista področja, ki jih šola še nima
        $school_areas_not_assigned = $school_areas_all->filter(function($area) use ($school_areas_ids) {
            return !in_array($area->id, $school_areas_ids);
        });



        //return ($school_areas);
        return view('school_admin.school.areas.index')
            ->with('user_school_active', $user_school_active)
            ->with('school_areas_not_assigned', $school_areas_not_assigned)
            ->with('school_areas', $school_areas);
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
    public function add_school_area_to_school($school_organization_id, $school_area_id)
    {
        // Najprej preverimo, ali obstaja šolska organizacija
        $school_organization = SchoolOrganization::find($school_organization_id);
        if (!$school_organization) {
            return redirect('home')
                ->with('error', 'Organizacija ne obstaja ali nimate dovoljenja.');
        }

        // Nato preverimo, ali obstaja področje šole
        $school_area = SchoolArea::find($school_area_id);
        if (!$school_area) {
            return redirect('home')
                ->with('error', 'Področje šole ni bilo najdeno.');
        }

        // Preverimo, ali povezava med šolsko organizacijo in področjem že obstaja
        $school_organization_school_area = SchoolOrganizationSchoolArea::where('school_organization_id', $school_organization_id)
            ->where('school_area_id', $school_area_id)
            ->first();

        if ($school_organization_school_area) {
            return redirect('home')
                ->with('error', 'To področje je že dodeljeno šolski organizaciji.');
        }

        // Če povezava ne obstaja, jo ustvarimo
        $new_school_organization_school_area = new SchoolOrganizationSchoolArea();
        $new_school_organization_school_area->school_organization_id = $school_organization_id;
        $new_school_organization_school_area->school_area_id = $school_area_id;
        $new_school_organization_school_area->school_area_level = 1;
        $new_school_organization_school_area->save();
        return redirect('/school_admin/school/areas')
            ->with('sucess', 'Področje "'.$school_area->school_area_name .'" je bilo dodano k šoli.');
    }

}
