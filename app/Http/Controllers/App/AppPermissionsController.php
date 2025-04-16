<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\AppPermission;
use App\Models\App\AppArea;




class AppPermissionsController extends Controller
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
        request()->validate([
            'app_permission_name' => 'required|max:255|string',
            'app_permission_name_slo' => 'required|max:255|string',
            'app_area_id' => 'required|integer|exists:app_areas,id',
        ],
        [
            'app_permission_name.required' => 'Potrebno je vnesti ime pravice.',
            'app_permission_name_slo.required' => 'Potrebno je vnesti ime pravice (SLO).',
            'app_area_id.required' => 'Potrebno je izbrat področje aplikacije.',
            'app_area_id.integer' => 'ID področja aplikacije mora biti število.',
            'app_area_id.exists' => 'Izbrano področje aplikacije ne obstaja.',
        ]);
return (1); 
        $school_permissions = new AppPermission;
        $school_permissions->app_area_id = $request->input ('app_area_id');
        $school_permissions->app_permission_name = $request->input ('app_permission_name');
        $school_permissions->app_permission_name_slo = $request->input ('app_permission_name_slo');
        $school_permissions->app_permission_description = $request->input ('app_permission_description');
        
        $school_permissions->save();
        return redirect('/app/areas/'.$request->input ('app_area_id'))
            ->with('success', 'Dodana pravica.');
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
}
