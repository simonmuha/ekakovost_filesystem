<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\App\AppPositionCategory;

use App\Models\App\AppIconRemixIcons;
use App\Models\App\AppColor;

class AppPositionCategoriesController extends Controller
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
        $app_position_main_categories = AppPositionCategory::whereNull('app_position_category_parent_id')->get();

        //return ($app_positions);
        return view('app.positions.categories.index')
            ->with('app_position_main_categories', $app_position_main_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //return ($app_positions);
        $categories = AppPositionCategory::whereNull('app_position_category_parent_id')->get();


        $icons = AppIconRemixIcons::all();

        $colors = AppColor::all();
        //return (1);

        return view('app.positions.categories.create')
            ->with('icons', $icons)
            ->with('colors', $colors)
            ->with('categories', $categories);


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
        //return($request);
        $request->validate([
            'app_position_category_name' => 'required|string|max:255',
            'app_position_category_description' => 'nullable|string',
            'app_position_category_parent_id' => 'nullable|exists:app_position_categories,id',
            'app_icon_remix_icon_id' => 'required|exists:app_icon_remix_icons,id',
            'app_color_id' => 'required|exists:app_colors,id',  // Validacija za barvo
            'app_color_background_id' => 'required|exists:app_colors,id',  // Validacija za barvo ozadja
        ], [
            'app_position_category_name.required' => 'Ime kategorije je obvezno.',
            'app_position_category_name.string' => 'Ime kategorije mora biti besedilo.',
            'app_position_category_name.max' => 'Ime kategorije ne sme presegati 255 znakov.',
            
            'app_position_category_description.string' => 'Opis mora biti besedilo.',
            
            'app_position_category_parent_id.exists' => 'Izbrana nadrejena kategorija ni veljavna.',
            
            'app_icon_remix_icon_id.required' => 'Izbira ikone je obvezna.',
            'app_icon_remix_icon_id.exists' => 'Izbrana ikona ni veljavna.',
            
            'app_color_id.required' => 'Izbira barve je obvezna.',
            'app_color_id.exists' => 'Izbrana barva ni veljavna.',
            
            'app_color_background_id.required' => 'Izbira barve ozadja je obvezna.',
            'app_color_background_id.exists' => 'Izbrana barva ozadja ni veljavna.',
        ]);
        $app_color = AppColor::find($request->app_color_id);
        $app_color_background = AppColor::find($request->app_color_background_id);

        // Shranjevanje podatkov v bazo
        AppPositionCategory::create([
            'app_position_category_parent_id' => $request->app_position_category_parent_id,
            'app_position_category_name' => $request->app_position_category_name,
            'app_position_category_name_slo' => $request->app_position_category_name_slo,
            'app_position_category_description' => $request->app_position_category_description,
            'app_position_category_color' => 'primary',  // Privzeta barva, če ni podana
            'app_position_category_background' => 'white',  // Privzeta barva ozadja
            'app_icon_remix_icon_id' => $request->app_icon_remix_icon_id,
            'app_color_id' => $request->app_color_id,  // Povezava na barvo
            'app_color_background_id' => $request->app_color_background_id,  // Povezava na barvo ozadja
        ]);
        //return($request);


        //return (1);
        // Preusmeritev s sporočilom o uspehu
        return redirect('app/positions/categories')
            ->with('success', 'Kategorija je bila uspešno dodana..');

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
        


        $app_position_category = AppPositionCategory::find($id);
        $categories = AppPositionCategory::whereNull('app_position_category_parent_id')->get();
        $main_categories = AppPositionCategory::whereNull('app_position_category_parent_id')->get();
        $icons = AppIconRemixIcons::all();
        //return ($app_positions);
        return view('app.positions.categories.show')
        ->with('icons', $icons)
        ->with('main_categories', $main_categories)
        ->with('categories', $categories)
        ->with('app_position_category', $app_position_category);

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
        //return ($request);
        $request->validate([
            'app_position_category_name' => 'required|string|max:255',
            'app_position_category_name_slo' => 'required|string|max:255',
            'app_position_category_description' => 'nullable|string',
            'app_position_category_parent_id' => 'nullable|exists:app_position_categories,id',
            'app_icon_remix_icon_id' => 'required|exists:app_icon_remix_icons,id',
        ], [
            'app_position_category_name.required' => 'Ime kategorije je obvezno.',
            'app_position_category_name.string' => 'Ime kategorije mora biti besedilo.',
            'app_position_category_name.max' => 'Ime kategorije ne sme presegati 255 znakov.',
            
            'app_position_category_name_slo.required' => 'Slovensko ime kategorije je obvezno.',
            'app_position_category_name_slo.string' => 'Slovensko ime kategorije mora biti besedilo.',
            'app_position_category_name_slo.max' => 'Slovensko ime kategorije ne sme presegati 255 znakov.',
        
            'app_position_category_description.string' => 'Opis mora biti besedilo.',
        
            'app_position_category_parent_id.exists' => 'Izbrana nadrejena kategorija ne obstaja.',
        
            'app_icon_remix_icon_id.required' => 'Izbrati morate ikono.',
            'app_icon_remix_icon_id.exists' => 'Izbrana ikona ne obstaja.',
        ]);
        
    
        // Poišči kategorijo
        $category = AppPositionCategory::findOrFail($id);
    
        // Posodobi podatke
        $category->update([
            'app_position_category_name' => $request->app_position_category_name,
            'app_position_category_name_slo' => $request->app_position_category_name_slo,
            'app_position_category_description' => $request->app_position_category_description,
            'app_position_category_parent_id' => $request->app_position_category_parent_id,
            'app_icon_remix_icon_id' => $request->app_icon_remix_icon_id,
        ]);
    
        // Preusmeritev nazaj s sporočilom o uspehu
        return redirect()->back()->with('success', 'Kategorija uspešno posodobljena.');

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
