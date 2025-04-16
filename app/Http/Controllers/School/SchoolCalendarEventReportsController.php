<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Calendars\CalendarEvent;
use App\Models\Calendars\CalendarEventReport;



use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class SchoolCalendarEventReportsController extends Controller
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
        //return ($request);
        // Poišči dogodek
$calendarEvent = CalendarEvent::findOrFail($id);

// Validacija vhodnih podatkov
$validated = $request->validate([
    'calendar_event_report_start_time_date' => 'required|date',
    'calendar_event_report_start_time_time' => 'required|date_format:H:i',
    'calendar_event_report_end_time_date' => 'required|date',
    'calendar_event_report_end_time_time' => 'required|date_format:H:i',
    'calendar_event_report_relation' => 'required|string|max:255',
    'calendar_event_report_transport_official' => 'nullable|string|max:255',
    'calendar_event_report_transport_personal' => 'nullable|string|max:255',
    'calendar_event_report_is_personal_vehicle' => 'nullable|boolean',
    'calendar_event_report_driver_id' => 'required|exists:people,id', // Voznik je obvezen
    'calendar_event_report_description' => 'required|string',
], [
    'calendar_event_report_start_time_date.required' => 'Začetni datum je obvezen.',
    'calendar_event_report_start_time_time.required' => 'Začetni čas je obvezen.',
    'calendar_event_report_end_time_date.required' => 'Končni datum je obvezen.',
    'calendar_event_report_end_time_time.required' => 'Končni čas je obvezen.',
    'calendar_event_report_relation.required' => 'Relacija službene poti je obvezna.',
    'calendar_event_report_driver_id.required' => 'Izbira voznika je obvezna.',
    'calendar_event_report_driver_id.exists' => 'Izbrani voznik ne obstaja.',
    'calendar_event_report_description.required' => 'Poročilo je obvezno.',
]);
//dd($validated);
// Posodobi ali ustvari poročilo za dogodek
$report = CalendarEventReport::updateOrCreate(
    ['calendar_event_id' => $calendarEvent->id],
    [
        'calendar_event_report_start_time' => $validated['calendar_event_report_start_time_date'] . ' ' . $validated['calendar_event_report_start_time_time'],
        'calendar_event_report_end_time' => $validated['calendar_event_report_end_time_date'] . ' ' . $validated['calendar_event_report_end_time_time'],
        'calendar_event_report_relation' => $validated['calendar_event_report_relation'],
        'transport_official' => $validated['calendar_event_report_transport_official'] ?? null,
        'transport_personal' => $validated['calendar_event_report_transport_personal'] ?? null,
        'is_personal_vehicle' => $request->boolean('calendar_event_report_is_personal_vehicle'), // Bolj varno za checkbox
        'calendar_event_report_driver_id' => $validated['calendar_event_report_driver_id'],
        'calendar_event_report_description' => $validated['calendar_event_report_description'],
    ]
);

// Preusmeritev nazaj z uspešnim sporočilom
return redirect()->back()->with('success', 'Poročilo je bilo uspešno shranjeno.');

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

    
    public function pdf_event_travel_report($calendar_event_report_id)
    {
        //
        //return(1);
        $calendar_event_report = CalendarEventReport::findOrFail($calendar_event_report_id);
        $calendar_event = $calendar_event_report->calendarEvent;
        //return($calendar_event_report);
        $event_owner = $calendar_event->person;
        //return($calendar_event);

        $user = Auth::user();
        $person = $user->active_status->person;
        $driver = $calendar_event_report->driver;
        // Prilagoditev nastavitev DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        

        $data = [
            'calendar_event_report_start_time' => $calendar_event_report->calendar_event_report_start_time,
            'calendar_event_report_end_time' => $calendar_event_report->calendar_event_report_end_time,
            'calendar_event_report_relation' => $calendar_event_report->calendar_event_report_relation,
            'calendar_event_report_transport_official' => $calendar_event_report->calendar_event_report_transport_official,
            'calendar_event_report_transport_personal' => $calendar_event_report->calendar_event_report_transport_personal,
            'calendar_event_report_is_personal_vehicle' => $calendar_event_report->calendar_event_report_is_personal_vehicle,
            'calendar_event_report_description' => $calendar_event_report->calendar_event_report_description,
            'driver_person_name' => $driver->person_name,
            'driver_person_surname' => $driver->person_surname,
            'calendar_event_title' => $calendar_event->calendar_event_title,
            'event_owner_name' => $event_owner->person_name,
            'event_owner_surname' => $event_owner->person_surname,
        ];

        // Ustvarjanje PDF
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('school.calendars.events.reports.pdf_event_travel_report', $data)->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        $date = Carbon::parse($calendar_event_report->calendar_event_report_start_time)
            ->format('Y m d'); // Oblika: '2025 01 23'
        // Prenos PDF dokumenta
        return $dompdf->stream('Poročilo o službeni poti - '.$person->organization->app_organization_name_short.' - '.$person->person_name.' - '.$date.'.pdf');
    }
    
}
