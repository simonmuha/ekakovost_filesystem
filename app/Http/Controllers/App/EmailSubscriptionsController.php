<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\EmailSubscriptions;

class EmailSubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
        request()->validate([
            'email_subscribe_name' => 'required|max:255|string',
            'email_subscribe_email' => 'required|email|max:255|string',
        ],
        [
            'email_subscribe_name.required' => 'Potrebno je vnesti ime in priimek.',
            'email_subscribe_email.required' => 'Potrebno je vnesti e-poštni naslov.',
            'email_subscribe_email.email' => 'Vnesite veljaven e-poštni naslov.',
        ]);


        $email_subscription = new EmailSubscriptions;
        $email_subscription->email_subscribe_name = $request->input ('email_subscribe_name');
        $email_subscription->email_subscribe_email = $request->input ('email_subscribe_email');
        $email_subscription->email_subscribe_description = $request->input ('email_subscribe_description');
        $email_subscription->save();

        return redirect('/login')
            ->with('success', 'Vaši podatki so bili poslani');
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
    public function showform()
    {
        //
        return view('app.subscribe.show');
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
