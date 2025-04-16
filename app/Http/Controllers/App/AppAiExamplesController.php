<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\App\AppAiType;
use App\Models\App\AppAiExample;


class AppAiExamplesController extends Controller
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
        $app_ai_types = AppAiType::all();
        $app_ai_examples =  AppAiExample::all();
        return view('app.ais.examples.index')
            ->with('app_ai_types', $app_ai_types)
            ->with('app_ai_examples', $app_ai_examples);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $app_ai_example_types = AppAiType::all()->pluck('app_ai_type_name_slo', 'id');
        $app_ai_type = null;
        return view('app.ais.examples.create')
            ->with('app_ai_type', $app_ai_type)
            ->with('app_ai_example_types', $app_ai_example_types);
    }
    
    public function create_example_add_to_type($app_ai_type_id)
    {
        //
        //return(1);
        $app_ai_type =AppAiType::find($app_ai_type_id);
        return view('app.ais.examples.create')
            ->with('app_ai_type', $app_ai_type);

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
        //return ($request);
        request()->validate([
            'app_ai_example_name' => 'required|max:255|string',
        ],
        [
            'app_ai_example_name.required' => 'Potrebno je vnesti ime.',
        ]);


        $app_ai_example = new AppAiExample;
        $app_ai_example->app_ai_type_id = $request->input ('app_ai_type_id');
        $app_ai_example->app_ai_example_name = $request->input ('app_ai_example_name');
        $app_ai_example->app_ai_example_description = $request->input ('app_ai_example_description');
        
        $app_ai_example->save();
        
        return redirect('/app/ais/examples/'.$app_ai_example->id)
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
        $app_ai_example = AppAiExample::find($id);
        return view('app.ais.examples.show')

            ->with('app_ai_example', $app_ai_example);
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
        $app_ai_example_types = AppAiType::all()->pluck('app_ai_type_name_slo', 'id');

        $app_ai_example = AppAiExample::find($id);
        return view('app.ais.examples.edit')
            ->with('app_ai_example_types', $app_ai_example_types)
            ->with('app_ai_example', $app_ai_example);
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
        request()->validate([
            'app_ai_example_name' => 'required|max:255|string',
        ],
        [
            'app_ai_example_name.required' => 'Potrebno je vnesti ime.',
        ]);


        $app_ai_example = AppAiExample::find($id);
        $app_ai_example->app_ai_type_id = $request->input ('app_ai_type_id');
        $app_ai_example->app_ai_example_name = $request->input ('app_ai_example_name');
        $app_ai_example->app_ai_example_description = $request->input ('app_ai_example_description');
        
        $app_ai_example->save();
        
        return redirect('/app/ais/examples/'.$app_ai_example->id)
            ->with('success', 'Posodobljeno');
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
