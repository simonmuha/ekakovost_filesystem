<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;


use App\Models\App\AppAreaPerson;
use App\Models\App\AppArea;
use App\Models\App\AppUserActiveStatus;





class AppAreaPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        //$this->middleware('check.area:appadmin'); // Tukaj specificiraš kodo področja
        //$this->middleware('check.user.area:appadmin'); // Tukaj specificiraš kodo področja
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
    public function change_person_app_area($person_id, $app_area_id) 
    {
        //
        //return(1);
        $user = Auth::user();
        if (!$user->has_person($person_id)) {
            return redirect('/users/'. $user->id)
                ->with('error', 'Nimate pravic. Ni vaš profil.');
        }
        $person = Person::find($person_id);
        $app_area = AppArea::where('app_area_parent_id', null)
            ->where('id',$app_area_id)
            ->first();
        if (!$app_area) {
            return redirect('/users/'. $user->id)
                ->with('error', 'Področje aplikacije ne obstaja.');
        }
        $user_active_status = AppUserActiveStatus::where('user_id',$user->id)
            ->first();
        if (!$user_active_status) {
            $user_active_status = new AppUserActiveStatus;
            $user_active_status->user_id = $user->id;
            $user_active_status->person_id = $person_id;
            $user_active_status->app_area_id = $app_area_id;
            $user_active_status->save();
        }  
        if ($user_active_status->app_area_id != $app_area_id) {
            $user_active_status->app_area_id = $app_area_id;
            $user_active_status->save();
        }
        if ($user_active_status->person_id != $person_id) {
            $user_active_status->person_id = $person_id;
            $user_active_status->save();
        }

        return redirect()->route('home');

                    
    }
    public function change_person_app_area_old($app_area_person_id) 
    {
        //prestavljeno na področja aplikacije - app - areas
        //
            //return ($app_area_person_id);
            
            // Preveri, ali oseba obstaja
            $app_area_person = AppAreaPerson::find($app_area_person_id);

            
            //return (4);
            //return redirect ('/'.$app_area_person->app_area->app_area_home);

            
            //return ($app_area_person->app_area);
            if ($app_area_person) {
                //return (1);
                //return redirect ('/school_admin');
                if ($app_area_person->app_area_person_active) {
                    return redirect()->route('home');
                } else {
                    
                    $user = $app_area_person->person->user;
                    $personIds = $user->people->pluck('id')->toArray();

                    // Poiščite prvi aktiven zapis v tabeli app_area_people
                    $activeAppAreaPerson = AppAreaPerson::whereIn('person_id', $personIds)
                        ->where('app_area_person_active', true)
                        ->first();

                    if ($activeAppAreaPerson) {
                        $activeAppAreaPerson->app_area_person_active = false;
                        $activeAppAreaPerson->save();
                    }
                    $app_area_person->app_area_person_active = true;
                    $app_area_person->save();
                    //return (1);
                    return redirect()->route('home');
                }
                
            } else {
                return redirect()->route('home')->with('error', 'Izbrano področje ne obstaja.');
            }
            //return ($school_organization_person);
            //return (Auth::user()->user_person_id);
             
    }
}
