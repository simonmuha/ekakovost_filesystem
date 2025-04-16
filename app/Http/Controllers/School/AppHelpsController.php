<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\App\AppHelp;
use App\Models\App\AppArea;
use App\Models\App\AppFaq;
use App\Models\App\AppPosition;


use App\Models\App\AppNotification;

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
        $this->middleware('check.user.area:school'); // Tukaj specificiraš kodo področja
    }
    public function index()
    {
        //
        $user = Auth::user();
        $user_school_active = $user->active_organization->school;
        $app_area = AppArea::where('app_area_code','school') 
            ->first();

        $app_helps = AppHelp::where ('app_area_id',$app_area->id)
            ->get();
        //return ($app_helps);

        //return ($school_areas);
        return view('school.app.helps.index')
            ->with('app_area', $app_area)
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
    public function faq()
    {
        $app_area = AppArea::where('app_area_code','school') 
        ->first();
        $app_areas = $app_area->subareas;
        return view('school.app.helps.faq')
            ->with('app_area', $app_area)
            ->with('app_areas', $app_areas); 
    }
    public function storeFaq(Request $request)
    {
        // Validacija
        $validated = $request->validate([
            'app_faq_question' => 'required|string|max:1000',
        ], [
            'app_faq_question.required' => 'Vpisati morate vprašanje.', // Custom error message
            'app_faq_question.max' => 'Vprašanje ne sme biti daljše od 1000 znakov.', // Optional
        ]);

        $user = Auth::user();
        $person = $user->active_status->person;
        $school_organization = $person->school;

        // Ustvari nov zapis v bazi
        $app_area = AppArea::where('app_area_code','school') 
            ->first();
        $faq = new AppFaq();
        $faq->app_faq_question = $validated['app_faq_question'];
        
        $faq->app_faq_asked_person_id = $person->id;
        $faq->app_area_id = $app_area->id;
         
        $faq->app_faq_is_active = 0; // Privzeto neaktivno, dokler ni odobreno
        $faq->save();

        $app_position = AppPosition::where('app_position_code', 'schooladmin')
            ->first();

        $school_admins = $school_organization->people()
            ->whereHas('positions', function ($query) use ($app_position) {
                $query->where('app_positions.id', $app_position->id); // Dodaj ime tabele pred 'id'
            })
            ->get();
            
        if ($school_admins && $school_admins->isNotEmpty()) {
            foreach ($school_admins as $school_admin) {
                AppNotification::create([
                    'person_id' => $school_admin->id,
                    'created_by_person_id' => $person->id, // ID trenutnega uporabnika
                    'app_notification_title' => "Novo vprašanje",
                    'app_notification_text' => "Dobili ste novo vprašanje (FAQ): {$faq->app_faq_question}.",
                    'app_notification_link' => "/school/helps/faqs/{$faq->id}",
                    'app_notification_date' => Carbon::now(), // Trenutni datum
                    'app_notification_read_at' => null, // Neprebrano obvestilo
                ]);
            }
        }



        // Preusmeritev z obvestilom
        return redirect()->back()->with('success', 'Vaše vprašanje je bilo uspešno poslano!');
    }
}
