<?php

namespace App\Http\Controllers\School;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Calendars\CalendarEvent;
use App\Models\Calendars\Calendar; 
use App\Models\Calendars\CalendarEventType;
use App\Models\Calendars\CalendarEventOwnership;



class SchoolCalendarsController extends Controller
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
        // 
        //return (1);

        $user = Auth::user();
        $person = $user->active_status->person;
        // Nastavite trenutni datum
        $today = Carbon::today();

        // Pridobite dogodke po danih pogojih
        $school_events = CalendarEvent::where(function ($query) use ($person, $today) {
            $query->where(function ($q) use ($today) {
                $q->where('calendar_event_start_time', '>=', $today)
                ->orWhere('calendar_event_end_time', '>=', $today);
            })
            ->whereHas('calendar.organization', function ($q) use ($person) {
                $q->where('id', $person->school_organization_id);
            })
            ->whereHas('ownership', function ($q) use ($person) {
                $q->where('calendar_event_ownership_name', 'school')
                ->orWhere(function ($q) use ($person) {
                    $q->where('calendar_event_ownership_name', 'personal')
                        ->where('person_id', $person->id);
                });
            });
        })
        ->orderBy('calendar_event_start_time', 'asc')
        ->get();

        // Organizirajte dogodke po datumu in uri
        $eventsByDate = $school_events->groupBy(function($event) {
            return Carbon::parse($event->calendar_event_start_time)->format('Y-m-d');
        });

        $eventsByDateAndTime = $eventsByDate->map(function($events) {
            return $events->groupBy(function($event) {
                return Carbon::parse($event->calendar_event_start_time)->format('H:i');
            });
        });
        //$events = CalendarEvent::all();

        //Vsi šolski dogodki in osebni dogodki.
        $school_year = $person->school_organization_year_current;
        $schoolCalendarId = $person->school->calendar->id;

        //return ($weekly_events);
        $calendar_event_ownership_school = CalendarEventOwnership::where('calendar_event_ownership_name', 'School')->first();
        $calendar_event_ownership_personal = CalendarEventOwnership::where('calendar_event_ownership_name', 'Personal')->first();


        $events = CalendarEvent::whereNull('calendar_event_parent_id')
        ->where(function ($query) use ($schoolCalendarId, $calendar_event_ownership_school, $calendar_event_ownership_personal, $person) {
            $query->where(function ($q) use ($schoolCalendarId, $calendar_event_ownership_school) {
                // Filtriranje šolskih dogodkov
                $q->where('calendar_id', $schoolCalendarId)
                  ->where('calendar_event_ownership_id', $calendar_event_ownership_school->id);
            })->orWhere(function ($q) use ($calendar_event_ownership_personal, $person) {
                // Filtriranje osebnih dogodkov
                $q->where('calendar_event_ownership_id', $calendar_event_ownership_personal->id)
                  ->where('person_id', $person->id);
            });
        })
        ->get();
        //return ($events);

        $today = Carbon::today();
        $today_events = CalendarEvent::whereDate('calendar_event_start_time', $today)
            ->orWhereDate('calendar_event_end_time', $today)
            ->orderBy('calendar_event_start_time', 'asc')
            ->get(); 
        
            $today = Carbon::today();

            $today_events = CalendarEvent::whereNull('calendar_event_parent_id')
                ->where(function ($query) use ($today) {
                    $query->whereDate('calendar_event_start_time', $today)
                        ->orWhereDate('calendar_event_end_time', $today);
                })
                ->where(function ($query) use ($schoolCalendarId, $calendar_event_ownership_school, $calendar_event_ownership_personal, $person) {
                    $query->where(function ($q) use ($schoolCalendarId, $calendar_event_ownership_school) {
                        $q->where('calendar_id', $schoolCalendarId)
                        ->where('calendar_event_ownership_id', $calendar_event_ownership_school->id);
                    })->orWhere(function ($q) use ($calendar_event_ownership_personal, $person) {
                        $q->where('calendar_event_ownership_id', $calendar_event_ownership_personal->id)
                        ->where('person_id', $person->id);
                    });
                })
                ->orderBy('calendar_event_start_time', 'asc')
                ->get();



        $school_year = $person->school_organization_year_current; 

        // Definirajte začetni in končni datum trenutnega tedna
        $startOfWeek = $today->copy()->startOfWeek(); // Privzeto ponedeljek
        $endOfWeek = $today->copy()->endOfWeek();    // Privzeto nedelja

        // Pridobite dogodke za trenutni teden
        $weekly_events = CalendarEvent::where(function ($query) use ($person, $startOfWeek, $endOfWeek) {
            $query->whereBetween('calendar_event_start_time', [$startOfWeek, $endOfWeek])
                ->orWhereBetween('calendar_event_end_time', [$startOfWeek, $endOfWeek])
                ->whereHas('calendar.organization', function ($q) use ($person) {
                    $q->where('id', $person->school_organization_id);
                })
                ->whereHas('ownership', function ($q) use ($person) {
                    $q->where('calendar_event_ownership_name', 'school')
                        ->orWhere(function ($q) use ($person) {
                            $q->where('calendar_event_ownership_name', 'personal')
                                ->where('person_id', $person->id);
                        });
                });
        })
        ->orderBy('calendar_event_start_time', 'asc')
        ->get();
        //return ($weekly_events);

        $calendar_event_types = CalendarEventType::all();
        return view('school.calendars.index')
            ->with('calendar_event_types', $calendar_event_types)
            ->with('person', $person)
            ->with('events', $events)
            ->with('today_events', $today_events)
            ->with('weekly_events', $weekly_events)
            ->with('school_year', $school_year)
            ->with('eventsByDateAndTime', $eventsByDateAndTime);
    }
    public function school_index_week()
    {
        $user = Auth::user();
        $person = $user->active_status->person;
        $school_year = $person->school_organization_year_current->year; 
        $school_calendar = Calendar::where('school_organization_id',$person->school_organization_id)
            ->first();
        //return ($school_year);
        $school_events = CalendarEvent::where('calendar_id', $school_calendar->id)
            ->where(function ($query) use ($school_year) {
                $query->whereBetween('calendar_event_start_time', [$school_year->school_year_start, $school_year->school_year_end])
                      ->orWhereBetween('calendar_event_end_time', [$school_year->school_year_start, $school_year->school_year_end]);
            })
            ->orderBy('calendar_event_start_time', 'asc')  // Po želji: razvrsti dogodke po začetnem času
            ->get();


        //return ($school_events);
        $today = Carbon::today();
        $today_events = CalendarEvent::whereDate('calendar_event_start_time', $today)
        ->orWhereDate('calendar_event_end_time', $today)
        ->orderBy('calendar_event_start_time', 'asc')
        ->get(); 

        $calendar_event_types = CalendarEventType::all();
        return view('school.calendars.school.index_week')
        ->with('today_events', $today_events)
        ->with('calendar_event_types', $calendar_event_types)
        ->with('person', $person)
        ->with('school_year', $school_year)
            ->with('school_events', $school_events);
    }
    public function personal_index_week()
    {
        $user = Auth::user();
    $person = $user->active_status->person;
    $school_year = $person->school_organization_year_current->year; 
    $school_calendar = Calendar::where('school_organization_id', $person->school_organization_id)
        ->first();

    // Poišči samo dogodke, kjer je oseba lastnik ali ima kakšno vlogo
    $school_events = CalendarEvent::where('calendar_id', $school_calendar->id)
        ->where(function ($query) use ($school_year, $person) {
            $query->whereBetween('calendar_event_start_time', [$school_year->school_year_start, $school_year->school_year_end])
                  ->orWhereBetween('calendar_event_end_time', [$school_year->school_year_start, $school_year->school_year_end]);
        })
        ->where(function ($query) use ($person) {
            $query->where('person_id', $person->id) // Lastnik dogodka
                  ->orWhereHas('people', function ($subQuery) use ($person) {
                      $subQuery->where('person_id', $person->id); // Oseba ima vlogo v dogodku
                  });
        })
        ->orderBy('calendar_event_start_time', 'asc')
        ->get();

        // Poišči dogodke tega tedna
    $startOfWeek = now()->startOfWeek();
    $endOfWeek = now()->endOfWeek();
    
    $person_weekly_events = $school_events->filter(function ($event) use ($startOfWeek, $endOfWeek) {
        return ($event->calendar_event_start_time >= $startOfWeek && $event->calendar_event_start_time <= $endOfWeek)
            || ($event->calendar_event_end_time >= $startOfWeek && $event->calendar_event_end_time <= $endOfWeek);
    });
    $calendar_event_types = CalendarEventType::all();




    return view('school.calendars.personal.index_week')
    ->with('calendar_event_types', $calendar_event_types)
    ->with('person', $person)
        ->with('school_year', $school_year)
        ->with('school_events', $school_events)
        ->with('person_weekly_events', $person_weekly_events);
    }
    public function school_index_day()
    {
        $user = Auth::user();
        $person = $user->active_status->person;
        $school_year = $person->school_organization_year_current->year; 
        $school_calendar = Calendar::where('school_organization_id', $person->school_organization_id)
            ->first();

        // Trenutni datum (lahko uporabite določen datum namesto "today")
        $today = \Carbon\Carbon::today();

        // Pridobi dnevne dogodke iz koledarja šole
        $school_events = CalendarEvent::where('calendar_id', $school_calendar->id)
            ->where(function ($query) use ($today) {
                $query->whereDate('calendar_event_start_time', $today)  // Dogodki, ki se začnejo danes
                    ->orWhereDate('calendar_event_end_time', $today); // Dogodki, ki se končajo danes
            })
            ->orderBy('calendar_event_start_time', 'asc')  // Razvrsti dogodke po začetnem času
            ->get();

            $today_events = CalendarEvent::whereDate('calendar_event_start_time', $today)
            ->orWhereDate('calendar_event_end_time', $today)
            ->orderBy('calendar_event_start_time', 'asc')
            ->get(); 

            $calendar_event_types = CalendarEventType::all();

        return view('school.calendars.school.index_day')  // Prikaži dnevni pogled
        ->with('today_events', $today_events)
        ->with('calendar_event_types', $calendar_event_types)
        ->with('person', $person)
        ->with('school_year', $school_year)
            ->with('school_events', $school_events);
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
}
