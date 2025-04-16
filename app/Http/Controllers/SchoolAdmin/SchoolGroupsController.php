<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\School\SchoolGroup;

class SchoolGroupsController extends Controller
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
        $user_school_active = $user->active_organization->school; //pripravljeno v modelu
        $school_groups = $user_school_active->groups;
        if ($user_school_active) {
            return view('school_admin.school.groups.index')
                ->with('school_groups', $school_groups);

        } else {
            return redirect('home')
                ->with('error', 'Organizacija ne obstaja ali nimate dovoljenja.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        $school_organization = $user->active_organization->school;
        $school_users = $school_organization->people->mapWithKeys(function ($item) {
            return [$item->id => $item->person_name . ' ' . $item->person_surname.' ('.$item->person_email.')'];
        });


        if ($school_organization) {
            return view('school_admin.school.groups.create')
                ->with('school_users', $school_users)
                ->with('school_organization', $school_organization);

        } else {
            return redirect('home')
                ->with('error', 'Organizacija ne obstaja ali nimate dovoljenja.');
        }
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
        request()->validate([
            'school_group_name' => 'required|max:255|string',
            'person_id' => 'required|max:255|string',
        ],
        [
            'school_group_name.required' => 'Potrebno je vnesti ime skupine.',
            'person_id.required' => 'Potrebno je izbrati vodjo skupine.',
        ]);
        return ('delovanje še ni preverjeno');
        $user = Auth::user();
        $school_organization_active = $user->active_organization->school; //pripravljeno v modelu

        if ($school_organization_active && $school_organization_active->id == $request->input ('school_organization_id')) {
            $school_organization_group = new SchoolGroup;
            $school_organization_group->school_organization_id = $request->input ('school_organization_id');
            $school_organization_group->school_group_name = $request->input ('school_group_name');
            $school_organization_group->school_group_description = $request->input ('school_group_description');
            $school_organization_group->school_organization_year_id = 1;
            $school_organization_group->person_id = $request->input ('person_id');
            $school_organization_group->save();
     
            if ($request->hasFile('school_group_image')){
                $filenameWithExt = $request->file('school_group_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext 
                $extension = $request->file('school_group_image')->getClientOriginalExtension();
                $fileNameToStore = 'school_group_image'.$school_organization_group->id.'_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('school_group_image')->storeAs('public/schools/groups/', $fileNameToStore);
                $school_organization_group->school_group_image = $fileNameToStore;
                $school_organization_group->save();
            } 
            if ($request->hasFile('school_group_home_image')){
                $filenameWithExt = $request->file('school_group_home_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext 
                $extension = $request->file('school_group_home_image')->getClientOriginalExtension();
                $fileNameToStore = 'school_group_home_image'.$school_organization_group->id.'_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('school_group_home_image')->storeAs('public/schools/groups/', $fileNameToStore);
                $school_organization_group->school_group_home_image = $fileNameToStore;
                $school_organization_group->save();
            } 

            return redirect('/school_admin/groups/'.$school_organization_group->id)
                ->with('success', 'Dodano.');
        } else {
            return redirect('home')
                ->with('error', 'Organizacija ne obstaja ali nimate dovoljenja.');
        }
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
