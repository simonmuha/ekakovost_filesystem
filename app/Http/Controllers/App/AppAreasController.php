<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\AppArea;
use App\Models\App\AppHelp;
use App\Models\App\AppSideBar;
use Spatie\Permission\Models\Role;

class AppAreasController extends Controller
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
        $app_help = AppHelp::where('app_help_view','app.areas.index')
            ->first();

        $app_areas = AppArea::with('subareas')->whereNull('app_area_parent_id')->get();
        return view('app.areas.index')
            ->with('app_help', $app_help)
            ->with('app_areas', $app_areas);
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
        $app_area_parent = null;
        return view('app.areas.create')
            ->with('app_area_parent', $app_area_parent)
            ->with('app_areas_parent', $app_areas_parent);
    }
    public function create_subarea($app_area_parent_id)
    {
        //
        //return(1);
        $app_area_parent = AppArea::find($app_area_parent_id);
        if (!$app_area_parent) {
            return redirect('/app/areas')
                ->with('error', 'Kategorija ne obstaja');
        }
        return view('app.areas.create')
            ->with('app_area_parent', $app_area_parent);

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
            'app_area_name' => 'required|max:255|string',
            'app_area_name_eng' => 'required|max:255|string',
        ],
        [
            'app_area_name.required' => 'Potrebno je vnesti ime.',
            'app_area_name_eng.required' => 'Potrebno je vnesti ang. ime.',
        ]);


        $app_area = new AppArea;
        $app_area->app_area_parent_id = $request->input ('app_area_parent_id');
        $app_area->app_area_name = $request->input ('app_area_name');
        $app_area->app_area_name_eng = $request->input ('app_area_name_eng');
        $app_area->app_area_code = $request->input ('app_area_code');
        
        $app_area->app_area_fontawesome = $request->input ('app_area_fontawesome');
        $app_area->app_area_link = $request->input ('app_area_link');
        $app_area->app_area_sidebar_name = $request->input ('app_area_sidebar_name');
        $app_area->save();
        
        if ($request->input ('app_area_parent_name') == null) {
            return redirect('/app/areas/'.$app_area->id)
                ->with('success', 'Dodano');
        } else {
            return redirect('/app/areas/'.$app_area->app_area_parent_id)
                ->with('success', 'Dodano podpodročje');
        }

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
        $roles = Role::all();
        $app_area = AppArea::find($id);
        $app_areas = $this->getRecursiveAreas();
        $selected_app_areas = AppSideBar::where('app_area_id', $app_area->id)
            ->pluck('app_side_bar_app_area_id')->toArray();
        //return($selected_app_areas);
        return view('app.areas.show')
            ->with('roles', $roles)
            ->with('app_areas', $app_areas)
            ->with('selected_app_areas', $selected_app_areas)
            ->with('app_area', $app_area);
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
        $app_area = AppArea::find($id);
        return view('app.areas.edit')
            ->with('app_areas_parent', $app_areas_parent)
            ->with('app_area', $app_area);
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
            'app_area_name' => 'required|max:255|string',
            'app_area_name_eng' => 'required|max:255|string',
        ],
        [
            'app_area_name.required' => 'Potrebno je vnesti ime.',
            'app_area_name_eng.required' => 'Potrebno je vnesti ang. ime.',
        ]);


        $app_area = AppArea::find($id);
        $app_area->app_area_parent_id = $request->input ('app_area_parent_id');
        $app_area->app_area_name = $request->input ('app_area_name');
        $app_area->app_area_name_eng = $request->input ('app_area_name_eng');
        $app_area->app_area_fontawesome = $request->input ('app_area_fontawesome');
        $app_area->app_area_link = $request->input ('app_area_link');
        $app_area->app_area_home = $request->input ('app_area_home');
        $app_area->app_area_sidebar_name = $request->input ('app_area_sidebar_name');
        
        $app_area->save();
        
        return redirect('/app/areas/'.$app_area->id)
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
