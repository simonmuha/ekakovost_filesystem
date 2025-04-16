<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\AppSideBar;
use App\Models\App\AppArea;

class AppSideBarsController extends Controller
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
        //return (1);
        request()->validate([
            'app_side_bar_app_area_id' => 'required',
            'app_area_id' => 'required',
        ],
        [
            'app_side_bar_app_area_id.required' => 'Potrebno je izbrati področje za stranski meni.',
            'app_area_id.required' => 'Potrebno je izbrati področje.',
        ]);
        $app_area_exists = AppArea::where('id', $request->input ('app_area_id'))->exists();
        $side_bar_app_area_exists = AppArea::where('id', $request->input ('app_side_bar_app_area_id'))->exists();

        if (!$app_area_exists || !$side_bar_app_area_exists) {
            return redirect()->back()->with('error', 'Izbrana področja ne obstajajo.');
        }
        // Preverite, ali zapis že obstaja
        $existingEntry = AppSideBar::where('app_area_id', $request->input ('app_area_id'))
            ->where('app_side_bar_app_area_id', $request->input ('app_side_bar_app_area_id'))
            ->first();

        if ($existingEntry) {
            return redirect()->back()->with('error', 'Zapis že obstaja.');
        }

        AppSideBar::create([
            'app_area_id' => $request->input ('app_area_id'),
            'app_side_bar_app_area_id' => $request->input ('app_side_bar_app_area_id'),
        ]);

        // Preusmeritev na želeno stran z obvestilom o uspehu
        return redirect('/app/areas/'.$request->input ('app_area_id'))
            ->with('success', 'Stranski meni je bil uspešno dodan.');
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
    
    public function delete_sidebar_from_area($app_sidebar_id)
{
    //return ($app_permission_id);
    // Preverite, ali zapis obstaja
    $existingRecord = AppSideBar::where('id', $app_sidebar_id)
        ->first();

    // Če zapis obstaja, ga izbrišemo
    if ($existingRecord) {
        $existingRecord->delete();
        return redirect()->back()->with('success', 'Stranski meni izbrisan.');
    }

    return redirect()->back()->with('error', 'Ta zapis ne obstaja v bazi podatkov.');
}
}
