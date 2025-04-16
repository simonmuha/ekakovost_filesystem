<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

 
use App\Models\Calendars\CalendarEvent;
use App\Models\Calendars\CalendarEventType;
use App\Models\Calendars\CalendarEventOwnership;
use App\Models\Calendars\CalendarEventPersonRole;
use App\Models\Calendars\CalendarEventPerson;
use App\Models\Calendars\CalendarEventReport;

use App\Models\Projects\Project;

use App\Models\App\AppNotification;

use App\Models\School\SchoolOrganizationYearPersonPosition;

class SchoolCalendarEventsController extends Controller
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
        // potrebno popraviti na izpis samo dogodkov
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

        //return view('school.calendars.index')
        //    ->with('person', $person)
        //    ->with('eventsByDateAndTime', $eventsByDateAndTime);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $calendar_event_types = CalendarEventType::all()->pluck('calendar_event_type_name_slo', 'id')->toArray();
        $calendar_event_ownerships = CalendarEventOwnership::all();
        $parent_event = null;

        return view ('school.calendars.events.create')
            ->with('parent_event', $parent_event)

            ->with('calendar_event_types', $calendar_event_types)
            ->with('calendar_event_ownerships', $calendar_event_ownerships);
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
            'calendar_event_title' => 'required',
            'calendar_start_date' => 'required|date',
            'calendar_start_time' => 'required|date_format:H:i',
            'calendar_end_date' => 'required|date|after_or_equal:calendar_start_date',
            'calendar_end_time' => 'required|date_format:H:i|after_or_equal:calendar_start_time',
            'calendar_event_location' => 'required',
            'calendar_event_ownership_id' => 'required|integer|exists:calendar_event_ownerships,id',
        ], [
            'calendar_event_title.required' => 'Naslov dogodka je obvezen.',
            'calendar_start_date.required' => 'Začetni datum dogodka je obvezen.',
            'calendar_start_date.date' => 'Začetni datum dogodka mora biti v pravilnem formatu.',
            'calendar_start_time.required' => 'Začetni čas dogodka je obvezen.',
            'calendar_start_time.date_format' => 'Začetni čas dogodka mora biti v formatu HH:mm.',
            'calendar_end_date.required' => 'Končni datum dogodka je obvezen.',
            'calendar_end_date.date' => 'Končni datum dogodka mora biti v pravilnem formatu.',
            'calendar_end_date.after_or_equal' => 'Končni datum dogodka mora biti enak ali po začetnem datumu.',
            'calendar_end_time.required' => 'Končni čas dogodka je obvezen.',
            'calendar_end_time.date_format' => 'Končni čas dogodka mora biti v formatu HH:mm.',
            'calendar_end_time.after_or_equal' => 'Končni čas dogodka mora biti enak ali po začetnem času.',
            'calendar_event_location.required' => 'Kraj dogodka je obvezen.',
            'calendar_event_ownership_id.required' => 'Lastništvo dogodka je obvezno.',
            'calendar_event_ownership_id.integer' => 'Lastništvo dogodka mora biti število.',
            'calendar_event_ownership_id.exists' => 'Izbrano lastništvo dogodka ne obstaja.',
        ]);

        // Create a new CalendarEvent instance and save it to the database
        $user = Auth::user();
        //return (12);
        $person = $user->active_status->person;

        
        $calendar_event = new CalendarEvent();

        
        $calendar_event->calendar_event_title = $request->input('calendar_event_title');
        $calendar_event->calendar_event_description_short = $request->input('calendar_event_description_short');
        $calendar_event->calendar_event_description = $request->input('calendar_event_description');
        $calendar_event->calendar_event_parent_id  = $request->input('calendar_event_parent_id');
        $startDateTime = Carbon::createFromFormat(
            'Y-m-d H:i',
            $request->input('calendar_start_date') . ' ' . $request->input('calendar_start_time')
        );
        $calendar_event->calendar_event_start_time = $startDateTime;
        // Combine date and time for end
        $endDateTime = Carbon::createFromFormat(
            'Y-m-d H:i',
            $request->input('calendar_end_date') . ' ' . $request->input('calendar_end_time')
        );

        $calendar_event->calendar_event_all_day = $startDateTime->toDateString() !== $endDateTime->toDateString();
        $calendar_event->calendar_event_end_time = $endDateTime;
        $calendar_event->calendar_event_type_id = 1;
        $calendar_event->calendar_event_ownership_id = $request->input('calendar_event_ownership_id');
        $calendar_event->calendar_event_location = $request->input('calendar_event_location');
        $calendar_event->person_id = $person->id;
        $calendar_event->calendar_id = $person->school->calendar->id;


        $calendar_event->save();
        
        return redirect('/school/calendars/events/'.$calendar_event->id)
            ->with('success', 'Dogodek je bil uspešno ustvarjen.');

        // Redirect or return response
        
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
        $calendar_event = CalendarEvent::find($id);
        $user = Auth::user();
        $active_status = $user->active_status;
        $person = $active_status->person;
        $app_organization =$person->organization;
        $school_organization = $app_organization->school;


        $calendar_event = CalendarEvent::with(['ownership', 'people'])->findOrFail($id);
        // Preveri, ali je dogodek "Personal"
        if ($calendar_event->ownership->calendar_event_ownership_name == 'Personal') {
            // Preveri, ali je trenutni uporabnik ustvarjalec dogodka ali je povezan v tabeli calendar_event_people
            $isCreator = $person->id == $calendar_event->person_id;
            $hasRole = $calendar_event->people()->where('person_id', $person->id)->exists();
    
            if (!$isCreator && !$hasRole) {
                return redirect('/school/calendars/personal/week')
                    ->with('error', 'To je osebni dogodek.');
            }
        }

        //return ($school_organization->school->school_organization_year_id_current);
        $calendar_event_person_roles = CalendarEventPersonRole::all();

        $school_people = $school_organization->active_year->people;

        //return ($school_organization->active_year);
        $currentYear = $school_organization->active_year;

        if ($currentYear) {
            // Pridobimo pozicije za trenutni šolski organizacijski let
            $school_positions = $currentYear
                ->positions() // Relacija do pozicij
                ->get();
        } else {
            $school_positions = collect(); // Če ni trenutnega leta, vrnemo prazno kolekcijo
        }
        //return ($school_positions);

        //return ($school_organization->active_year->people);
        $school_groups = $school_positions;

        //return ($school_people);
        $calendar_event_report = $calendar_event->report; //ali
        $calendar_event_report = CalendarEventReport::where('calendar_event_id', $id)->first();
        //return($calendar_event_report);
        //return ($person->organization);
        //return($person->rolesForEvent($calendar_event->id));
        //return($calendar_event->calendarEventPeople);
        if ($person->organization->app_organization_parent_id != null) {
            $vehicles = $person->organization->parent->vehicles;

        } else {
            $vehicles = $person->organization->vehicles;

        }
        $start = $calendar_event->calendar_event_start_time;
        $end = $calendar_event->calendar_event_end_time;
    
        // Poišči projekte, kjer ta oseba sodeluje in projekt poteka v času dogodka
        $projects = Project::whereHas('project_people_app_position', function ($query) use ($person) {
            $query->where('person_id', $person->id);
            // (opcijsko) dodaj še časovno preverjanje tu, če želiš
        })
        ->where(function ($query) use ($start, $end) {
            $query->whereNull('project_start_date')
                  ->orWhere('project_start_date', '<=', $end);
        })
        ->where(function ($query) use ($start, $end) {
            $query->whereNull('project_end_date')
                  ->orWhere('project_end_date', '>=', $start);
        })
        ->get();
        $selectedProjects = $calendar_event->projects()
            ->wherePivot('active', true)
            ->pluck('projects.id')  // Poberemo id iz tabele projects
            ->toArray(); 
        //return ($projects);
        return view('school.calendars.events.show')
        ->with('selectedProjects', $selectedProjects)
        ->with('projects', $projects)
        ->with('school_groups', $school_groups)
        ->with('school_positions', $school_positions)
            ->with('calendar_event_person_roles', $calendar_event_person_roles)
            ->with('school_people', $school_people)
            ->with('person', $person)
            ->with('vehicles', $vehicles)
            ->with('calendar_event_report', $calendar_event_report)
            ->with('calendar_event', $calendar_event);
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
        $calendar_event_types = CalendarEventType::all()->pluck('calendar_event_type_name_slo', 'id')->toArray();
        $calendar_event_ownerships = CalendarEventOwnership::all();
        $calendar_event = CalendarEvent::find($id);

        return view ('school.calendars.events.edit')
            ->with('calendar_event', $calendar_event)
            ->with('calendar_event_types', $calendar_event_types)
            ->with('calendar_event_ownerships', $calendar_event_ownerships);
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
        request()->validate([
            'calendar_event_title' => 'required',
            'calendar_start_date' => 'required|date',
            'calendar_start_time' => 'required|date_format:H:i',
            'calendar_end_date' => 'required|date|after_or_equal:calendar_start_date',
            'calendar_end_time' => 'required|date_format:H:i|after_or_equal:calendar_start_time',
        ], [
            'calendar_event_title.required' => 'Naslov dogodka je obvezen.',
            'calendar_start_date.required' => 'Začetni datum dogodka je obvezen.',
            'calendar_start_date.date' => 'Začetni datum dogodka mora biti v pravilnem formatu.',
            'calendar_start_time.required' => 'Začetni čas dogodka je obvezen.',
            'calendar_start_time.date_format' => 'Začetni čas dogodka mora biti v formatu HH:mm.',
            'calendar_end_date.required' => 'Končni datum dogodka je obvezen.',
            'calendar_end_date.date' => 'Končni datum dogodka mora biti v pravilnem formatu.',
            'calendar_end_date.after_or_equal' => 'Končni datum dogodka mora biti enak ali po začetnem datumu.',
            'calendar_end_time.required' => 'Končni čas dogodka je obvezen.',
            'calendar_end_time.date_format' => 'Končni čas dogodka mora biti v formatu HH:mm.',
            'calendar_end_time.after_or_equal' => 'Končni čas dogodka mora biti enak ali po začetnem času.',
        ]);
        $event = CalendarEvent::find($id);
        $event->calendar_event_title = $request->input('calendar_event_title');
        $event->calendar_event_description_short = $request->input('calendar_event_description_short');
        $event->calendar_event_description = $request->input('calendar_event_description');
        $startDateTime = Carbon::createFromFormat(
            'Y-m-d H:i',
            $request->input('calendar_start_date') . ' ' . $request->input('calendar_start_time')
        );
        $event->calendar_event_start_time = $startDateTime;
        // Combine date and time for end
        $endDateTime = Carbon::createFromFormat(
            'Y-m-d H:i',
            $request->input('calendar_end_date') . ' ' . $request->input('calendar_end_time')
        );
        $event->calendar_event_all_day = $startDateTime->toDateString() !== $endDateTime->toDateString();
        $event->calendar_event_end_time = $endDateTime;
        $event->save();

        // Redirect or return response
        return redirect('/school/calendars/events/'.$event->id)
            ->with('success', 'Dogodek je bil uspešno posodobljen.');
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
        //return($id);
        // Poiščite dogodek po ID-ju
        $calendar_event = CalendarEvent::find($id);
        $user = Auth::user();
        $person = $user->active_status->person;
        if ($person->id != $calendar_event->person_id ) {
            return redirect()->back()->with('error', 'Nimate pravic brisanja dogodka.');
        }
        if (!$calendar_event) {
            return redirect()->back()->with('error', 'Dogodek ni bil najden.');
        }
        $calendar_event->delete();  // Izbrišite dogodek
        return redirect('/school/calendars')
                    ->with('success', 'Dogodek uspešno izbrisan.');
    }
    public function addPersonToRole(Request $request)
{
    // Validacija vhodnih podatkov
    //return($request);
    $validatedData = $request->validate(
        [
            'calendar_event_id' => 'required|exists:calendar_events,id',
            'calendar_event_person_role_id' => 'required|exists:calendar_event_person_roles,id',
            'selected_people' => 'nullable|array', // Preveri, da so osebe lahko prazne ali tabela
            'selected_people.*' => 'exists:people,id', // Preveri, da osebe obstajajo v bazi
        ],
        [
            'calendar_event_id.required' => 'ID dogodka je obvezen.',
            'calendar_event_id.exists' => 'Dogodek ne obstaja.',
            'calendar_event_person_role_id.required' => 'ID vloge na dogodku je obvezen.',
            'calendar_event_person_role_id.exists' => 'Vloga na dogodku ne obstaja.',
            'selected_people.array' => 'Seznam izbranih oseb mora biti v obliki tabele.',
            'selected_people.*.exists' => 'Ena ali več izbranih oseb ne obstaja.',
        ]
    );

    // Pridobivanje uporabnika in povezane osebe
    $user = Auth::user();
    $currentPerson = $user->active_status->person;

    // Pridobi podatke iz zahtevka
    $calendar_event_id = $validatedData['calendar_event_id'];
    $calendar_event_person_role_id = $validatedData['calendar_event_person_role_id'];
    $selected_people = $validatedData['selected_people'] ?? []; // Če ni podano, nastavi prazno tabelo

    // Najdi dogodek
    $calendar_event = CalendarEvent::findOrFail($calendar_event_id);

    // Pridobi obstoječe osebe za dogodek in vlogo
    $existingPeople = CalendarEventPerson::where('calendar_event_id', $calendar_event_id)
        ->where('calendar_event_person_role_id', $calendar_event_person_role_id)
        ->pluck('person_id')
        ->toArray();

    // Ugotovi razlike
    $peopleToAdd = array_diff($selected_people, $existingPeople);
    $peopleToRemove = array_diff($existingPeople, $selected_people);

    // **Dodajanje novih oseb**
    foreach ($peopleToAdd as $person_id) {
        CalendarEventPerson::create([
            'calendar_event_id' => $calendar_event_id,
            'person_id' => $person_id,
            'calendar_event_person_role_id' => $calendar_event_person_role_id,
        ]);

        // Obvestilo za dodano osebo
        AppNotification::create([
            'person_id' => $person_id,
            'created_by_person_id' => $currentPerson->id,
            'app_notification_title' => "Nova vloga na dogodku",
            'app_notification_text' => "Dodeljena vam je bila vloga na dogodku {$calendar_event->calendar_event_title}.",
            'app_notification_link' => "/school/calendars/events/{$calendar_event_id}",
            'app_notification_date' => Carbon::now(),
            'app_notification_read_at' => null,
        ]);
    }

    // **Odstranjevanje oseb**
    foreach ($peopleToRemove as $person_id) {
        CalendarEventPerson::where('calendar_event_id', $calendar_event_id)
            ->where('calendar_event_person_role_id', $calendar_event_person_role_id)
            ->where('person_id', $person_id)
            ->delete();

        // Obvestilo za odstranjeno osebo
        AppNotification::create([
            'person_id' => $person_id,
            'created_by_person_id' => $currentPerson->id,
            'app_notification_title' => "Odstranjeni iz dogodka",
            'app_notification_text' => "Vaša vloga na dogodku {$calendar_event->calendar_event_title} je bila odstranjena.",
            'app_notification_link' => "/school/calendars/events/{$calendar_event_id}",
            'app_notification_date' => Carbon::now(),
            'app_notification_read_at' => null,
        ]);
    }

    // **Poseben primer: Če je seznam 'selected_people' prazen, izbriši vse za to vlogo**
    if (empty($selected_people)) {
        CalendarEventPerson::where('calendar_event_id', $calendar_event_id)
            ->where('calendar_event_person_role_id', $calendar_event_person_role_id)
            ->delete();
    }

    // Uspešno preusmeritev nazaj z obvestilom
    return redirect()->back()->with('success', 'Osebe so bile uspešno posodobljene.');
}

public function create_child_event($id)
    {
        $parent_event = CalendarEvent::findOrFail($id);
        // Preverimo, ali je že poddogodek
    if ($parent_event->calendar_event_parent_id !== null) {
        return redirect()->back()->withErrors(['error' => 'Poddogodku ne moremo dodajati poddogodka.']);
    }

        // Preverimo, ali ima uporabnik pravico ustvarjati poddogodke
        $user = Auth::user();
        $person = $user->active_status->person;

        if ($parent_event->person_id !== $person->id && !$parent_event->people()->where('person_id', $person->id)->exists()) {
            return redirect()->route('school.calendars.events.index')->withErrors(['error' => 'Nimate dovoljenja za dodajanje poddogodka.']);
        }

        $calendar_event_types = CalendarEventType::all()->pluck('calendar_event_type_name_slo', 'id')->toArray();
        $calendar_event_ownerships = CalendarEventOwnership::all();

        return view ('school.calendars.events.create')
        ->with('parent_event', $parent_event)
        ->with('calendar_event_types', $calendar_event_types)
            ->with('calendar_event_ownerships', $calendar_event_ownerships);

    }
    public function removeRole(Request $request)
    {
        //return ($request);
        $request->validate([
            'calendar_event_id' => 'required|integer|exists:calendar_events,id',
            'person_id' => 'required|integer|exists:people,id',
            'calendar_event_person_role_id' => 'nullable|integer|exists:calendar_event_person_roles,id',
        ], [
            'calendar_event_id.required' => 'Dogodek je obvezen.',
            'calendar_event_id.integer' => 'ID dogodka mora biti število.',
            'calendar_event_id.exists' => 'Izbrani dogodek ne obstaja.',
    
            'person_id.required' => 'Oseba je obvezna.',
            'person_id.integer' => 'ID osebe mora biti število.',
            'person_id.exists' => 'Izbrana oseba ne obstaja.',
    
            'calendar_event_person_role_id.integer' => 'ID vloge mora biti število.',
            'calendar_event_person_role_id.exists' => 'Izbrana vloga ne obstaja.',
        ]);
    
    
        // Če je podan calendar_event_person_role_id, brišemo specifično vlogo
        if ($request->has('calendar_event_person_role_id')) {
            $roleEntry = CalendarEventPerson::where('calendar_event_id', $request->calendar_event_id)
                ->where('person_id', $request->person_id)
                ->where('calendar_event_person_role_id', $request->calendar_event_person_role_id)
                ->first();
    
            if ($roleEntry) {
                $roleEntry->delete();
                return back()->with('success', 'Vloga uspešno odstranjena.');
            }
        } else {
            
        }
    
        return back()->with('error', 'Vloga ni bila najdena.');
    
    }

}
