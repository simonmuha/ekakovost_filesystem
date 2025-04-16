<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\App\AppPosition;  
use App\Models\App\AppArea;
use App\Models\App\AppAreaAppPosition;
use App\Models\App\AppPositionAppSubposition;

use App\Models\App\AppPositionCategory;

class AppPositionsController extends Controller
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
        $app_positions = AppPosition::all();
        //return ($app_positions);
        return view('app.positions.index')
            ->with('app_positions', $app_positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $app_position = null;
        $categories = AppPositionCategory::whereNull('app_position_category_parent_id')->get();
        return view('app.positions.create')
            ->with('categories', $categories)
            ->with('app_position', $app_position);
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
            'app_position_name' => 'required|max:255|string',
            'categories' => 'required|array', // kategorije so polje
            'categories.*' => 'exists:app_position_categories,id', // vsaka izbrana kategorija mora obstajati
        ],
        [
            'app_position_name.required' => 'Potrebno je vnesti ime delovnega mesta.',
            'app_position_category_id.exists' => 'Izbrana kategorija ne obstaja.',

        ]);
        

        $app_position = new AppPosition;
        $app_position->app_position_parent_id = null;
        $app_position->app_position_name = $request->input ('app_position_name');
        $app_position->app_position_description = $request->input ('app_position_description');
        $app_position->app_position_category_id = $request->input ('app_position_category_id');
        $app_position->app_position_responsibility = $request->input ('app_position_responsibility');
        $app_position->app_position_task = $request->input ('app_position_task');
        $app_position->app_position_team_id = 1;
        $app_position->save();
        //return (1);

        $app_position->categories()->sync($request->input ('categories'));

        return redirect('/app/positions/'.$app_position->id)
            ->with('success', 'Dodano.');
    }
    public function store_app_area_to_position(Request $request)
    {
        //
        $request->validate([
            'app_area_id' => 'required|numeric|exists:app_areas,id',
            'app_position_id' => 'required|numeric|exists:app_positions,id',
        ], [
            'app_area_id.required' => 'Vnesti morate področje.',
            'app_position_id.required' => 'Vnesti morate delovno mesto.',
            'app_area_id.exists' => 'Izbrano področje ne obstaja.',
            'app_position_id.exists' => 'Izbrano delovno mesto ne obstaja.',
        ]);
    
        // Preveri, ali področje obstaja
        $app_area = AppArea::find($request->input('app_area_id'));
        if (!$app_area) {
            return redirect('/app/positions/' . $request->input('app_position_id'))
                ->with('error', 'Področje ne obstaja.');
        }
    
        // Preveri, ali delovno mesto obstaja
        $app_position = AppPosition::find($request->input('app_position_id'));
        if (!$app_position) {
            return redirect('/app/positions/' . $request->input('app_position_id'))
                ->with('error', 'Delovno mesto ne obstaja.');
        }
    
        // Preveri ali zapis že obstaja ali ustvarjanje novega
        $existingRecord = AppAreaAppPosition::where('app_area_id', $request->input('app_area_id'))
            ->where('app_position_id', $request->input('app_position_id'))
            ->first();
    
        if ($existingRecord) {
            // Zapis že obstaja
            return redirect('/app/positions/' . $request->input('app_position_id'))
                ->with('error', 'Področje za delovno mesto že obstaja.');
        } else {
            // Ustvari nov zapis
            AppAreaAppPosition::create([
                'app_area_id' => $request->input('app_area_id'),
                'app_position_id' => $request->input('app_position_id'),
            ]);
    
            // Uspešno dodano
            return redirect('/app/positions/' . $request->input('app_position_id'))
                ->with('success', 'Področje dodano delovnemu mestu.');
        }
    }
    public function store_app_subposition_to_position(Request $request)
    {
        //
        //return ($request);
        $request->validate([
            'app_position_id' => 'required|numeric|exists:app_positions,id',
            'app_subposition_id' => 'required|numeric|exists:app_positions,id|different:app_position_id',
        ], [
            'app_position_id.required' => 'Vnesti morate delovno mesto.',
            'app_subposition_id.required' => 'Vnesti morate podrejeno delovno mesto.',
            'app_subposition_id.exists' => 'Izbrano podrejeno delovno mesto ne obstaja.',
            'app_position_id.exists' => 'Izbrano delovno mesto ne obstaja.',
            'app_subposition_id.different' => 'Delovno mesto in podrejeno delovno mesto ne smeta biti enaka.',
        ]);
        //return ($request);
    
        $app_position_id = $request->input('app_position_id');
        $app_subposition_id = $request->input('app_subposition_id');

        // Preveri, ali zapis že obstaja
        $existingRecord = AppPositionAppSubposition::where('app_position_id', $app_position_id)
            ->where('app_subposition_id', $app_subposition_id)
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'Podrejeno delovno mesto že obstaja za izbrano delovno mesto.');
        }

        // Ustvari nov zapis
        AppPositionAppSubposition::create([
            'app_position_id' => $app_position_id,
            'app_subposition_id' => $app_subposition_id,
        ]);
        return redirect()->back()->with('success', 'Podrejeno delovno mesto je bilo uspešno dodano.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function show($id)
    {
        //
        $app_position = AppPosition::with(['categories' => function ($q) {
            $q->wherePivot('active', true);
        }])->findOrFail($id);

        
        //return($app_position->app_subpositions);
        //return ($app_position);
        $app_main_areas = AppArea::where('app_area_parent_id', null)
            ->get();
        $app_areas = $this->getRecursiveAreas();
        $app_positions = AppPosition::all();
        $app_position_areas = $app_position->areas->pluck('app_area_name', 'app_side_bar_app_area_id')->toArray();


        // Poišči vse subpositions povezane s tem app_position
        $subpositionsIds = $app_position->subpositions->pluck('id')->toArray();
        
        // Poišči vse AppPosition zapise, razen tistih, ki so v seznamu subpositionsIds
        $available_positions = AppPosition::whereNotIn('id', $subpositionsIds)
            ->where('id', '!=', $id) // Izključi tudi sam $app_position->id
            ->get();
        //return($available_positions);

        //return($available_positions);
        //return ($app_main_areas);
        //return ($app_position->position_app_areas->first()->appArea);
        return view('app.positions.show')
        ->with('available_positions', $available_positions)
        ->with('app_position_areas', $app_position_areas)
        ->with('app_areas', $app_areas)
        ->with('app_position', $app_position)
            ->with('app_main_areas', $app_main_areas);
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
        $position = AppPosition::findOrFail($id);
    $categories = AppPositionCategory::whereNull('app_position_category_parent_id')
                    ->with('subcategories')
                    ->get();

    return view('app.positions.edit', compact('position', 'categories'));

    // ----------------STARO ------------------------------
        $app_position = AppPosition::find($id);
        
        return view('app.positions.edit')
            ->with('app_position', $app_position);
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
        //return ($request);
        $position = AppPosition::findOrFail($id);
    $validated = $request->validate([
        'app_position_name' => 'required|max:255|string',
        'categories' => 'nullable|array',
        'categories.*' => 'exists:app_position_categories,id',
    ],
    [
        'app_position_name.required' => 'Potrebno je vnesti ime delovnega mesta.',
        'categories.*.exists' => 'Izbrana kategorija ne obstaja.',
    ]);
    $position->app_position_name = $request->input('app_position_name');
    $position->app_position_code = $request->input('app_position_code');
    $position->app_position_description = $request->input('app_position_description');
    $position->app_position_responsibility = $request->input('app_position_responsibility');
    $position->app_position_task = $request->input('app_position_task');

    $position->save();

    // Posodobitev kategorij - Posodobi va trenutno stanje - problem pri prikazu zaposlenih na projektu
    //$position->categories()->sync($request->input('categories', []));

    // Pridobi trenutno vezane kategorije
    $existingCategories = $position->categories()->pluck('app_position_category_id')->toArray();
    $newCategories = $request->input('categories', []);

    // Nastavi obstoječe kategorije, ki niso v novih, na inactive
    $categoriesToDeactivate = array_diff($existingCategories, $newCategories);
    if (!empty($categoriesToDeactivate)) {
        $position->categories()
            ->whereIn('app_position_category_id', $categoriesToDeactivate)
            ->update(['active' => false]);
    }
    // Dodaj nove kategorije ali nastavi 'active' na true, če že obstaja
    foreach ($newCategories as $categoryId) {
        $position->categories()->syncWithoutDetaching([
            $categoryId => ['active' => true] // Nastavi active na true v pivot tabeli
        ]);
    }
    //return (1);


    return redirect('/app/positions/'.$position->id)
        ->with('success', 'Posodobljeno.');

    return redirect()->route('positions.index')->with('success', 'Delovno mesto uspešno posodobljeno.');
    return ($request);
        
        // ----------------STARO ------------------------------
        request()->validate([
            'app_position_name' => 'required|max:255|string',
        ],
        [
            'app_position_name.required' => 'Potrebno je vnesti ime delovnega mesta.',
        ]);

        $app_position = AppPosition::find($id);
        $app_position->app_position_name = $request->input ('app_position_name');
        $app_position->app_position_description = $request->input ('app_position_description');
        $app_position->app_position_responsibility = $request->input ('app_position_responsibility');
        $app_position->app_position_task = $request->input ('app_position_task');
        
        $app_position->save();
        return redirect('/app/positions/'.$app_position->id)
            ->with('success', 'Posodobljeno.');
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
    public function remove_subposition($app_position_subposition_id)
    { 
        //
        $app_position_subposition = AppPositionAppSubposition::find($app_position_subposition_id);

        if ($app_position_subposition) {
            // Izbrišemo zapis
            $app_position_subposition->delete();

            return redirect()->back()->with('success', 'Delovno mesto je bilo odstranjenp.');
        }

        return redirect()->back()->with('error', 'Delovno mesto ni bilo najdeno.');
    }
}
