<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Person;
use App\Models\User;

class PersonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $user = User::find (auth()->user()->id);

        return view ('persons.create')
            ->with ('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->person_id ==0) {
            //kadar oseba še nima osebnega profila
            $this->validate ($request,[
                'person_name'  => 'required',
                'person_surname'  => 'required',
                'person_birth_date' => 'date_format:d. m. Y',
            ]); 
        }
        if (auth()->user()->person_id ==0) {
            //kadar oseba še nima osebnega profila naredimo novo osebo
            $myperson = new Person;
            $myperson->person_name = $request->input ('person_name');
            $myperson->person_surname = $request->input ('person_surname');
            $myperson->person_gender = $request->input ('person_gender');
            $myperson->user_id = auth()->user()->id;
            $person_birth_date = Carbon::createFromFormat('d. m. Y', $request->input ('person_birth_date'))->format('Y-m-d');
            $myperson->person_birth_date = $person_birth_date;
            $myperson->save();
            $user = User::find ($myperson->user_id);
            $user->user_person_id = $myperson->id;
            $user->save();
        }
        return redirect('/home/')
            ->with('success', 'Dobrodošel! Tvoj osebni profil je ustvarjen.');
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
        $user = User::find (auth()->user()->id);
        $person = Person::find (auth()->user()->user_person_id);
        return view ('persons.edit')
            ->with ('user',$user)
            ->with ('person',$person);
    }

        /**
     * Show the form for editing images the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_images($id)
    {
        //
        if (auth()->user()->id == $id) {
            $user = User::find ($id); 
            if (!isset($user)){
                return redirect ('/home')
                    ->with('error', 'Napaka. Oseba ne obstaja');
            }
            if ($user->id != auth()->user()->id) {
                return redirect ('/home')
                    ->with('error', 'Nimate dovoljenja');
            }
            $person = Person::find ($user->user_person_id);
            if (!isset($person)){
                return redirect ('/persons/create')
                    ->with('error', 'Nimate izpolnjenega osebnega profila');
            }
            return view ('persons/edit_images')
                ->with ('user',$user)
                ->with ('person',$person);
        } else {
            return redirect ('/home')
                        ->with('error', 'Napaka. Nimate dovoljenja');
        }

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
        $this->validate ($request,[
            'person_name'  => 'required',
            'person_surname'  => 'required',
            'person_birth_date' => 'date_format:d. m. Y',
        ]); 
        $myperson = Person::find($id);
        $myperson->person_name = $request->input ('person_name');
        $myperson->person_surname = $request->input ('person_surname');
        $myperson->person_gender = $request->input ('person_gender');
        $myperson->person_description = $request->input ('person_description');
        $myperson->person_GSM = $request->input ('person_GSM');
        $person_birth_date = Carbon::createFromFormat('d. m. Y', $request->input ('person_birth_date'))->format('Y-m-d');
        $myperson->person_birth_date = $person_birth_date;

        $myperson->user_id = auth()->user()->id;
        $person_birth_date = Carbon::createFromFormat('d. m. Y', $request->input ('person_birth_date'))->format('Y-m-d');
        $myperson->person_birth_date = $person_birth_date;
        $myperson->save();

    return redirect('/users/'.$myperson->user_id)
        ->with('success', 'Vaš  osebni profil je posodobljen.');
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
