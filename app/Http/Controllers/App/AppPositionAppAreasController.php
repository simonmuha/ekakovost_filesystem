<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppPositionAppAreasController extends Controller
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
    public function store_app_permission_to_position_app_area(Request $request)
    { 
        //
        //return($request);
        request()->validate([
            'school_position_app_area_id' => 'required|exists:school_position_app_areas,id',
            'app_permission_id' => 'required|exists:app_permissions,id',
        ],
        [
            'school_position_app_area_id.required' => 'Potrebno je izbrati področje.',
            'app_permission_id.required' => 'Potrebno je izbrati pravico.',
        ]);
        //return (1);
        // Preverjanje obstoja zapisa v tabeli app_position_areas
        $existingRecord = SchoolPositionAppAreaAppPermission::where('school_position_app_area_id', $request->input('school_position_app_area_id'))
            ->where('app_permission_id', $request->input('app_permission_id'))
            ->first();

        // Če zapis ne obstaja, ga dodamo

        if (!$existingRecord) {
            $app_positio_app_area_app_permission = new SchoolPositionAppAreaAppPermission();
            $app_positio_app_area_app_permission->school_position_app_area_id = $request->input('school_position_app_area_id');
            $app_positio_app_area_app_permission->app_permission_id = $request->input('app_permission_id');
            $app_positio_app_area_app_permission->save();
            return redirect()->back()->with('success', 'Pravica je bila uspešno dodana pofročju.');
        }

        return redirect()->back()->with('error', 'Ta zapis že obstaja v bazi podatkov.');
    }
    
    public function delete_app_permission_from_position_app_area($app_permission_id, $school_position_app_area_id)
{
    //return ($app_permission_id);
    // Preverite, ali zapis obstaja
    $existingRecord = SchoolPositionAppAreaAppPermission::where('school_position_app_area_id', $school_position_app_area_id)
        ->where('app_permission_id', $app_permission_id)
        ->first();

    // Če zapis obstaja, ga izbrišemo
    if ($existingRecord) {
        $existingRecord->delete();
        return redirect()->back()->with('success', 'Pravica je bila uspešno odstranjena iz področja.');
    }

    return redirect()->back()->with('error', 'Ta zapis ne obstaja v bazi podatkov.');
}
}
