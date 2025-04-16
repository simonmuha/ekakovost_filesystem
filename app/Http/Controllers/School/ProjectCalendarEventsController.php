<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Projects\ProjectCalendarEvent;
use App\Models\Projects\Project;

use App\Models\Calendars\CalendarEvent;

class ProjectCalendarEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
        //
        $project = Project::find($project_id);
        $calendarEvents = $project->calendarEvents()
            ->wherePivot('active', true)
            ->orderBy('calendar_event_start_time', 'asc')  // Sortiraj po datumu začetka dogodka (od najstarejšega do najnovejšega)
            ->get();
        //return ($calendarEvents);
        return view('school.projects.calendar.events.index')
            ->with('calendarEvents', $calendarEvents)
            ->with('project', $project);
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
        //return ($request);

        $validatedData = $request->validate([
            'project_ids' => 'array',
            'project_ids.*' => 'exists:projects,id',
        ], [
            'project_ids.*.exists' => 'Izbran projekt ne obstaja.',
        ]);
        $calendar_event = CalendarEvent::findOrFail($id);
        $selectedProjectIds = $request->input('project_ids', []);

        // Vsi obstoječi povezani projekti (tudi tisti neaktivni)
        $existingLinks = ProjectCalendarEvent::where('calendar_event_id', $calendar_event->id)->get();

        // 1. OBRAVNAVA OBSTOJEČIH POVEZAV
        foreach ($existingLinks as $link) {
            if (in_array($link->project_id, $selectedProjectIds)) {
                // označen – poskrbimo, da je aktiven
                if (!$link->active) {
                    $link->active = true;
                    $link->save();
                }
            } else {
                // ni več izbran – deaktiviramo
                if ($link->active) {
                    $link->active = false;
                    $link->save();
                }
            }
        }

        // 2. DODAJANJE NOVIH POVEZAV
        $existingProjectIds = $existingLinks->pluck('project_id')->toArray();

        foreach ($selectedProjectIds as $projectId) {
            if (!in_array($projectId, $existingProjectIds)) {
                ProjectCalendarEvent::create([
                    'calendar_event_id' => $calendar_event->id,
                    'project_id' => $projectId,
                    'active' => true,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Dogodek je bil uspešno posodobljen.');
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
