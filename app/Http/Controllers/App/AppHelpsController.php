<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\App\AppHelp;
use App\Models\App\AppArea;

class AppHelpsController extends Controller
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
        $app_helps = AppHelp::all();
        return view('app.helps.index')
            ->with('app_helps', $app_helps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $app_areas_parent = $this->getRecursiveAreas();
        return view ('app.helps.create')
            ->with('app_areas_parent', $app_areas_parent);
    }
    private function getRecursiveAreas($parentId = null, $prefix = '')
    {
        $areas = AppArea::where('app_area_parent_id', $parentId)->get();
    
        $result = [];
    
        foreach ($areas as $area) {
            $result[$area->id] = $prefix . $area->app_area_name;
            $result += $this->getRecursiveAreas($area->id, $prefix . '—');
        }
    
        return $result;
    }
    
    public function create_help_add_to_app_area($app_area_id)
    {
        //
        $app_areas_parent = $this->getRecursiveAreas();
        $app_area = AppArea::find($app_area_id);  

        return view ('app.helps.create')
            ->with('app_area', $app_area)
            ->with('app_areas_parent', $app_areas_parent);

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
            'app_help_name' => 'required|max:255|string',
            'app_area_id' => 'required',
            'app_help_view' => 'required|max:255|string',
        ],
        [
            'app_help_name.required' => 'Potrebno je vnesti ime.',
            'app_area_id.required' => 'Potrebno je vnesti področje.',
            'app_help_view.required' => 'Potrebno je vnesti pogled.',
        ]);


        $app_help = new AppHelp;
        $app_help->app_help_name = $request->input ('app_help_name');
        $app_help->app_area_id = $request->input ('app_area_id');
        $app_help->app_help_view = $request->input ('app_help_view');
        $app_help->app_help_description = $request->input ('app_help_description');
        $app_help->save();
        
        if ($request->filled('return_to')) {
            $returnTđ_to = $request->input('return_to');
            if ($returnTđ_to === 'app_area') {
                return redirect('/app/areas/'.$app_help->app_area_id)
                    ->with('success', 'Dodano');
            }
        }
        return redirect('/app/helps/'.$app_help->id)
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

        $app_help = AppHelp::find($id);
        return view('app.helps.show')
            ->with('app_help', $app_help);
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
        $app_areas_parent = $this->getRecursiveAreas();

        $app_help = AppHelp::find($id);
        return view('app.helps.edit')
        ->with('app_areas_parent', $app_areas_parent)
        ->with('app_help', $app_help);
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
            'app_help_name' => 'required|max:255|string',
            'app_area_id' => 'required',
            'app_help_view' => 'required|max:255|string',
        ],
        [
            'app_help_name.required' => 'Potrebno je vnesti ime.',
            'app_area_id.required' => 'Potrebno je vnesti področje.',
            'app_help_view.required' => 'Potrebno je vnesti pogled.',
        ]);


        $app_help = AppHelp::find($id);
        $app_help->app_help_name = $request->input ('app_help_name');
        $app_help->app_area_id = $request->input ('app_area_id');
        $app_help->app_help_view = $request->input ('app_help_view');
        $app_help->app_help_description = $request->input ('app_help_description');
        $app_help->save();
        
        return redirect('/app/helps/'.$app_help->id)
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
