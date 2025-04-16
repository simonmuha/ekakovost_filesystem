<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\App\AppEmail;
use App\Models\App\AppDay;
use App\Models\App\AppEmailSchedule;


class AppEmailSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        //$this->middleware('check.area:schooladmin'); // Tukaj specificiraš kodo področja
        $this->middleware('check.user.area:schooladmin'); // Tukaj specificiraš kodo področja
    }
    public function index() 
    {
        //

        $user = Auth::user();
        $person = $user->active_person; 
        $school_organization = $user->active_organization->school;
        $app_days = AppDay::all();
        $app_emails = AppEmail::all();
        return view('school_admin.app.email.shedules.index')
            ->with('app_days', $app_days)
            ->with('school_organization', $school_organization)
            ->with('app_emails', $app_emails);

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
        //return ($request);
        $request->validate([
            'app_email_id' => 'required|exists:app_emails,id',
            'app_day_id' => 'required|exists:app_days,id',
            'app_email_schedule_time' => 'required|date_format:H:i',
        ], [
            'app_email_id.required' => 'Izberite e-pošto.',
            'app_email_id.exists' => 'Izbrana e-pošta ne obstaja.',
            'app_day_id.required' => 'Izberite dan.',
            'app_day_id.exists' => 'Izbran dan ne obstaja.',
            'app_email_schedule_time.required' => 'Vnesite čas urnika.',
            'app_email_schedule_time.date_format' => 'Čas mora biti v formatu HH:MM.',
        ]);

        AppEmailSchedule::create([
            'app_email_id' => $request->app_email_id,
            'app_day_id' => $request->app_day_id,
            'app_email_schedule_time' => $request->app_email_schedule_time,
            'app_email_schedule_is_active' => true,
            'app_email_is_holiday' => false,
            'app_organization_id' => $request->app_organization_id,
        ]);

        return redirect()->back()->with('success', 'Urnik uspešno dodan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //uporabljamo index, je potrebno razviti
        $user = Auth::user(); 
        $person_active = $user->active_person;
        $app_organization = $user->active_organization->school;
        

        $app_email_shedules = AppEmailSchedule::where('app_organization_id', $app_organization->id)
            ->where('app_email_schedule_is_active', true)    
            ->get();
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
            'app_day_id' => 'required|exists:app_days,id',
            'app_email_schedule_time' => 'required|date_format:H:i',
        ], [
            'app_day_id.required' => 'Izberite dan.',
            'app_day_id.exists' => 'Izbran dan ne obstaja.',
            'app_email_schedule_time.required' => 'Vnesite čas urnika.',
            'app_email_schedule_time.date_format' => 'Čas mora biti v formatu HH:MM.',
        ]);

        $existingSchedule = AppEmailSchedule::findOrFail($id);
        $existingSchedule->update(['app_email_schedule_is_active' => false]);
        //return ($existingSchedule);

        AppEmailSchedule::create([
            'app_email_id' => $existingSchedule->app_email_id,
            'app_day_id' => $request->app_day_id,
            'app_email_schedule_time' => $request->app_email_schedule_time,
            'app_organization_id' => $existingSchedule->app_organization_id,
            'app_email_schedule_is_active' => true,
            'app_email_is_holiday' => false,
        ]);

        return redirect()->back()->with('success', 'Urnik uspešno posodobljen.');
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
        $schedule = AppEmailSchedule::findOrFail($id);
        $schedule->update(['app_email_schedule_is_active' => false]);

        return redirect()->back()->with('success', 'Urnik uspešno deaktiviran.');
    }
}
