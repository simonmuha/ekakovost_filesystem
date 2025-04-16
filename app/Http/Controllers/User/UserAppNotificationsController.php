<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\App\AppNotification;
class UserAppNotificationsController extends Controller
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

        

        $today = Carbon::now();
        // 1. Izbriši obvestila, ki so bila prebrana pred 30 dnevi IN imajo dogodek, ki je že minil
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        AppNotification::where('person_id', $person->id)
            ->whereNotNull('app_notification_read_at') // Prebrana obvestila
            ->where('app_notification_read_at', '<', $thirtyDaysAgo) // Prebrana pred več kot 30 dnevi
            ->where('app_notification_date', '<', $today) // Dogodek je že minil
            ->delete();

        // 1. Pridobi vsa obvestila
        $notifications = AppNotification::where('person_id', $person->id)
            ->orderByRaw('CASE WHEN app_notification_read_at IS NULL THEN 0 ELSE 1 END') // Neprebrana najprej
            ->orderBy('app_notification_date', 'asc') // Uredi po datumu dogodka
            ->get();

        // 2. Označi vsa neprebrana obvestila kot prebrana (trenutni datum)
        AppNotification::where('person_id', $person->id)
            ->whereNull('app_notification_read_at')
            ->update(['app_notification_read_at' => $today]);

        
        return view('users.notifications.index')
            ->with('notifications',$notifications)
            ->with('person',$person);
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
