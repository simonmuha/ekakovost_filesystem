<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\App\AppNotification;
use App\Models\App\AppArea;
use App\Models\App\AppSuggestion;
use App\Models\App\AppPosition;
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
        $user = Auth::user();
        $person = $user->active_status->person;
        $app_suggestions = AppSuggestion::with('appArea')
            ->where('app_person_id', $person->id)
            ->get();

        return view('school.suggestions.index', compact('app_suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $app_area_school = AppArea::where('app_area_code', 'school')->first();
        $app_areas = AppArea::where('app_area_parent_id', $app_area_school->id)->get();
        return view('school.suggestions.create', compact('app_areas'));
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
        //return($request);
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
        $user=Auth::user();
        $person = $user->active_status->person;
        $appSuggestion = AppSuggestion::create([
            'app_person_id' => $person->id,  // Pridobimo ID trenutno prijavljenega uporabnika
            'app_area_id' => $validatedData['app_area_id'],
            'app_suggestion_description' => $validatedData['app_suggestion_description'],
        ]);

        // Pošljemo obvestila administratorjem

        // Poiščemo administratorje aplikacije (prilagodi glede na logiko aplikacije)
        $app_position = AppPosition::where('app_position_code', 'schooladmin')
            ->first();
        $school_organization = $person->school;

        $school_admins = $school_organization->people()
            ->whereHas('positions', function ($query) use ($app_position) {
                $query->where('app_positions.id', $app_position->id); // Dodaj ime tabele pred 'id'
            })
            ->get();


        // Ustvarimo obvestila za vsakega administratorja
        if ($school_admins->isNotEmpty()) {
            foreach ($school_admins as $admin) {
                AppNotification::create([
                    'person_id' => $admin->id,
                    'created_by_person_id' => $person->id,
                    'app_notification_title' => "Nov predlog",
                    'app_notification_text' => "Dobili ste nov predlog, ki se nanaša na področje: {$appSuggestion->appArea->app_area_name}.",
                    'app_notification_link' => "/aschool/suggestions/{$appSuggestion->id}",
                    'app_notification_date' => Carbon::now(),
                    'app_notification_read_at' => null,
                ]);
            }
        }

        return redirect('/school/app/suggestions/')
            ->with('success', 'Vaš predlog je bil uspešno oddan.');

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
