<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\App\AppNotification;
use App\Models\App\AppArea;
use App\Models\App\AppSuggestion;

class AppSuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); 
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
        // Validacija podatkov
        $validatedData = $request->validate(
            [
                'app_area_id' => 'required|exists:app_areas,id',
                'app_suggestion_description' => 'required|string|max:5000',
            ],
            [
                'app_area_id.required' => 'Prosimo, izberite področje za vaš predlog.',
                'app_area_id.exists' => 'Izbrano področje ni veljavno.',
                'app_suggestion_description.required' => 'Opis predloga je obvezen.',
                'app_suggestion_description.string' => 'Opis predloga mora biti veljavno besedilo.',
                'app_suggestion_description.max' => 'Opis predloga ne sme presegati 5000 znakov.',
            ]
        );

        // Shranimo predlog v bazo
        $appSuggestion = AppSuggestion::create([
            'app_person_id' => Auth::id(),  // Pridobimo ID trenutno prijavljenega uporabnika
            'app_area_id' => $validatedData['app_area_id'],
            'app_suggestion_description' => $validatedData['app_suggestion_description'],
        ]);

        // Pošljemo obvestila administratorjem
        $this->notifyAdmins($appSuggestion);

        return redirect()->route('app_suggestions.index')->with('success', 'Vaš predlog je bil uspešno oddan.');
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
