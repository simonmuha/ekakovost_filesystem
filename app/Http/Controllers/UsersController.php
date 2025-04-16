<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use App\Models\Person;

class UsersController extends Controller
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
        
        $validator = Validator::make($request->all(), [
            'user_profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[   
            'user_profile_image.required' => 'Izbrati je potrebno sliko največje velikosti 300 kB.',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
       


        //handle image upload
        if ($request->hasFile('user_profile_image')){
            $filenameWithExt = $request->file('user_profile_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('user_profile_image')->getClientOriginalExtension();
            $fileNameToStore = 'Profile_'.auth()->user()->id.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('user_profile_image')->storeAs('public/users', $fileNameToStore);

            $user = User::find (auth()->user()->id);
            $user->user_profile_image = $fileNameToStore;
            $user->save();
            return response()->json(['success' => 'Slika posodobljena.']);

        } else {
            return response()->json(['success' => 'Naložiti morate sliko.']);

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
        //return ($id);
        $user = Auth::user();
        //return ($user);
        if ($user->id != $id) {
            return redirect ('/home')
                ->with('error', 'Napaka. Nimate dovoljenja');
        }
        $person = Person::find ($user->user_person_id);
        //return ($person);
        $user_people_areas = $user->people()->with('appAreas')->get();
        //return ($person);
        //return($user_people_areas);
        return view ('users.show')
            ->with ('user',$user)
            ->with ('user_people_areas',$user_people_areas)
            ->with ('person',$person); 
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
                //
                $user = User::find ($id);
                if (!isset($user)){
                    return redirect ('/home')
                        ->with('error', 'Napaka. Oseba ne obstaja');
                }
                if ($user->id != auth()->user()->id) {
                    return redirect ('/home')
                        ->with('error', 'Nimate dovoljenja');
                }
        
                return view ('users.edit')
                    ->with ('user',$user);
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
        //Trenutno lahko spreminjamo samo ime. Imena ne smejo biti enaka med posameznimi uporabniki.
        $user = User::find ($id);
        if ($user->name!=$request->user_name){
            $count = User::where('name', 'like', $request->user_name)->count();
            if($count == 0) {
                //username doesn't exist
                $user->name = $request->user_name;
                $user->save();
                $person = Person::find ($user->user_person_id);
                return back()->with("status", "Podatki posodobljeni");
                return redirect ('/users/'.$user->id )
                    ->with ('user',$user)
                    ->with ('person',$person)
                    ->with('msg', 'Podatki posodobljeni');
            } else {
                //username exists
                return back()->with("error", "Ime že obstaja");
                return view ('users.edit')
                    ->with ('user',$user)
                    ->with('error', 'Ime obstaja');
            } 
        } else {
            $person = Person::find ($user->user_person_id);
            return view ('users.show')
                ->with ('user',$user)
                ->with ('person',$person)
                ->with('msg', 'Podatki posodobljeni');
        }
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
    public function edit_user_profile_image($id)
    {
        //
                //
                $user = User::find ($id);
                if (!isset($user)){
                    return redirect ('/home')
                        ->with('error', 'Napaka. Oseba ne obstaja');
                }
                if ($user->id != auth()->user()->id) {
                    return redirect ('/home')
                        ->with('error', 'Nimate dovoljenja');
                }
        
                return view ('users.edit_user_profile_image')
                    ->with ('user',$user);
    }

    public function update_user_profile_image (Request $request, $id)
    {
        //
        $this->validate($request, [
            'user_profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[   
            'user_profile_image.required' => 'Izbrati je potrebno sliko največje velikosti 300 kB.',
        ]);
        //handle image upload
        if ($request->hasFile('user_profile_image')){
            $filenameWithExt = $request->file('user_profile_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('user_profile_image')->getClientOriginalExtension();
            $fileNameToStore = 'Profile_'.auth()->user()->id.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('user_profile_image')->storeAs('public/users', $fileNameToStore);

            $user = User::find ($id);
            if ($user->user_profile_image != "profile400x400") {
                Storage::delete('public/users/'.$user->user_profile_image);
            }
            $user->user_profile_image = $fileNameToStore;
            $user->save();
            return redirect ('/users/'.auth()->user()->id)->with("status", "Slika posodobljena");
            return back()->with("status", "Slika posodobljena");
        } else {
            return back()->with("status", "Ni datoteke");
        }
    }

    public function edit_user_home_image($id)
    {
        //
                //
                $user = User::find ($id);
                if (!isset($user)){
                    return redirect ('/home')
                        ->with('error', 'Napaka. Oseba ne obstaja');
                }
                if ($user->id != auth()->user()->id) {
                    return redirect ('/home')
                        ->with('error', 'Nimate dovoljenja');
                }
        
                return view ('users.edit_user_home_image')
                    ->with ('user',$user);
    }
    public function update_user_home_image (Request $request, $id)
    {
        //
        $this->validate($request, [
            'user_home_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[   
            'user_home_image.required' => 'Izbrati je potrebno sliko največje velikosti 1400 400.',
        ]);
        //handle image upload
        if ($request->hasFile('user_home_image')){
            $filenameWithExt = $request->file('user_home_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('user_home_image')->getClientOriginalExtension();
            $fileNameToStore = 'Home_'.auth()->user()->id.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('user_home_image')->storeAs('public/users', $fileNameToStore);

            $user = User::find ($id);
            $person = Person::find ($user->user_person_id);
            if ($person->person_home_image != "profile1400x400") {
                Storage::delete('public/users/'.$person->person_home_image);
            }
            $person->person_home_image = $fileNameToStore;
            $person->save();
            return redirect ('/users/'.auth()->user()->id)->with("status", "Slika posodobljena");
            return back()->with("status", "Slika posodobljena");
        } else {
            return back()->with("status", "Ni datoteke");
        }
    }

    public function updatePassword(Request $request)
    {
            # Validation
            $this->validate($request, [
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ],[   
                'old_password.required' => 'Potrebno je vnesti trenutno geslo.',
                'new_password.required' => 'Potrebno je vnesti novo geslo.',
                'new_password.confirmed' => 'Gesli se ne ujemata. Poskusite znova.',
            ]);
    
            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Geslo ni pravilno");
            }
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()->with("status", "Geslo spremenjeno!");
    }
}
