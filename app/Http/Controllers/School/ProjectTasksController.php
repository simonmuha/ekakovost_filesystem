<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Projects\ProjectTask;

class ProjectTasksController extends Controller
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
        //return ($request);
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'project_task_parent_id' => 'nullable|exists:project_tasks,id',
            'project_task_title' => 'required|string|max:255',
            'project_task_description' => 'nullable|string',
            'project_task_status_id' => 'required|exists:project_task_statuses,id',
            'project_task_due_date' => 'nullable|date',
        ], [
            'project_id.required' => 'Projekt je obvezen.',
            'project_id.exists' => 'Izbrani projekt ne obstaja.',
            'project_task_parent_id.exists' => 'Nadrejena naloga ni veljavna.',
            'project_task_title.required' => 'Naslov naloge je obvezen.',
            'project_task_title.max' => 'Naslov naloge je lahko dolg največ :max znakov.',
            'project_task_status_id.required' => 'Status naloge je obvezen.',
            'project_task_status_id.exists' => 'Izbrani status ni veljaven.',
            'project_task_due_date.date' => 'Datum roka mora biti veljaven datum.',
        ]);

        $task = new ProjectTask($validatedData);
        $task->save();

        return redirect()->back()->with('success', 'Naloga je bila uspešno ustvarjena.');

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
