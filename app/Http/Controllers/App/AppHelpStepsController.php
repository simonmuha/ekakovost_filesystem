<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\AppHelpStep;


class AppHelpStepsController extends Controller
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
        //return ($request);
        request()->validate([
            'app_help_id' => 'required|numeric',
            'app_help_step_number' => 'required|max:255|string',
            'app_help_step_description' => 'required',
        ],
        [
            'app_help_id.required' => 'Potrebno je vnesti pomoč, h kateri dodajate korak.',
            'app_help_step_number.required' => 'Potrebno je vnesti številko koraka.',
            'app_help_step_number.numeric' => 'Potrebno je vnesti številčno vrednost koraka.',
            'app_help_step_description.required' => 'Potrebno je vnesti opis koraka.',
        ]);


        $app_help_step = new AppHelpStep;
        $app_help_step->app_help_id = $request->input ('app_help_id');
        $app_help_step->app_help_step_number = $request->input ('app_help_step_number');
        $app_help_step->app_help_step_description = $request->input ('app_help_step_description');
        if ($request->hasFile('app_help_step_image')){
            $filenameWithExt = $request->file('app_help_step_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext 
            $extension = $request->file('app_help_step_image')->getClientOriginalExtension();
            $fileNameToStore = 'app_help_step_image'.$app_help_step->id.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('app_help_step_image')->storeAs('public/app/helps/steps', $fileNameToStore);
            $app_help_step->app_help_step_image = $fileNameToStore;
        } 


        $app_help_step->save();
        
        
        return redirect('/app/helps/'.$app_help_step->app_help_id)
            ->with('success', 'Dodano');
        

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
