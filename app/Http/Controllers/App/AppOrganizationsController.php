<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\Models\Person;
use App\Models\User;


use App\Models\School\SchoolOrganization;
use App\Models\App\AppOrganization;
use App\Models\App\AppPost;
use App\Models\App\AppArea;
use App\Models\App\AppAreaPerson;
use App\Models\App\AppPosition;
use App\Models\App\AppPositionPerson;



class AppOrganizationsController extends Controller
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
        $this->middleware('check.user.area:appadmin'); // Tukaj specificiraš kodo področja
    }
    public function index()
    {
        //
        $app_organizations = AppOrganization::where('app_organization_parent_id',null)
            ->get();
        //return ($app_organizations);
        return view('app.organizations.index')
            ->with('app_organizations', $app_organizations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $app_posts = AppPost::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->app_post_postal_code . ' - ' . $item->app_post_name];
        });
        $app_organization = null;
        return view('app.organizations.create')
            ->with('app_posts', $app_posts)
            ->with('app_organization', $app_organization);
    }
    public function create_suborganization($organization_id)
    {
        //return(1);
        //še ni preverjeno
        $app_posts = AppPost::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->app_post_postal_code . ' - ' . $item->app_post_name];
        });
        $app_organization = AppOrganization::find($organization_id);
        return view('app.organizations.create')
            ->with('app_posts', $app_posts)
            ->with('app_organization', $app_organization);
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
            'app_organization_name' => 'required|max:255|string',
            'app_organization_name_short' => 'required|max:255|string',
            'app_organization_address' => 'required|max:255|string',
            'app_post_id' => 'required|max:255|string',
        ],
        [
            'app_organization_name.required' => 'Potrebno je vnesti ime organizacije.',
            'app_organization_name_short.required' => 'Potrebno je vnesti kratko ime organizacije.',
            'app_organization_address.required' => 'Potrebno je vnesti naslov organizacije.',
            'app_post_id.required' => 'Potrebno je vnesti poštno številko.',
        ]);

        $app_organization = new AppOrganization;
        $app_organization->app_organization_name = $request->input ('app_organization_name');
        $app_organization->app_organization_name_short = $request->input ('app_organization_name_short');
        $app_organization->app_organization_address = $request->input ('app_organization_address');
        $app_organization->app_post_id = $request->input ('app_post_id');
        $app_organization->app_organization_parent_id = $request->input ('app_organization_parent_id');
        $app_organization->save();
 
        if ($request->hasFile('app_organization_image')){
            $filenameWithExt = $request->file('app_organization_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext 
            $extension = $request->file('app_organization_image')->getClientOriginalExtension();
            $fileNameToStore = 'app_organization_image'.$app_organization->id.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('app_organization_image')->storeAs('public/app/organizations', $fileNameToStore);
            $app_organization->app_organization_image = $fileNameToStore;
        } 
        $app_organization->save();
        return redirect('/app/organizations/'.$app_organization->id)
            ->with('success', 'Dodano.');
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
        $app_organization = AppOrganization::find($id);
        if ($app_organization->app_organization_parent_id ==null) {
            $parent_app_organization = $app_organization;
        } else {
            $parent_app_organization = $app_organization->parent;
        }
        $app_positions = AppPosition::all(); 
        //return($admin_organization_users);
        return view('app.organizations.show')
        ->with('app_positions', $app_positions)
        ->with('parent_app_organization', $parent_app_organization)
        ->with('app_organization', $app_organization);
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
        $app_posts = AppPost::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->app_post_postal_code . ' - ' . $item->app_post_name];
        });
        $app_organization = AppOrganization::find($id);
        return view('app.organizations.edit')
            ->with('app_posts', $app_posts)
            ->with('app_organization', $app_organization);
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
        request()->validate([
            'app_organization_name' => 'required|max:255|string',
        ],
        [
            'app_organization_name.required' => 'Potrebno je vnesti ime organizacije.',
        ]);

        $app_organization = AppOrganization::find($id);
        $app_organization->app_organization_name = $request->input ('app_organization_name');
        $app_organization->app_organization_name_short = $request->input ('app_organization_name_short');
        $app_organization->app_organization_address = $request->input ('app_organization_address');
        $app_organization->app_post_id = $request->input ('app_post_id');

        if ($request->hasFile('app_organization_image')){
            $filenameWithExt = $request->file('app_organization_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext 
            $extension = $request->file('app_organization_image')->getClientOriginalExtension();
            $fileNameToStore = 'app_organization_image'.$app_organization->id.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('app_organization_image')->storeAs('public/app/organizations', $fileNameToStore);
            if (Str::contains($app_organization->app_organization_image, 'noimage')){
            }else{
                Storage::delete('public/app/organizations/'.$app_organization->app_organization_image);
            } 
            $app_organization->app_organization_image = $fileNameToStore;
        } 
        $app_organization->save();
        return redirect('/app/organizations/'.$app_organization->id)
            ->with('success', 'Posodobljeno.'); 
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
    //***********************************************************************************************************
    //***********************************************************************************************************
    public function create_admin_add_to_organization($app_organization_id)
    { 
        //
        
        $app_organization_users = Person::where('app_organization_id', $app_organization_id)->get()->mapWithKeys(function ($item) {
            return [$item->id => $item->person_name . ' - ' . $item->person_email];
        });

        $app_users = User::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->name . ' - ' . $item->email];
        });
        $app_organization = AppOrganization::find($app_organization_id);
        return view('app.organizations.users.create_admin')
            ->with('app_organization_users', $app_organization_users)
            ->with('app_users', $app_users)
            ->with('app_organization', $app_organization);
    }
    public function create_user_add_to_organization($app_organization_id)
    { 
        //
        $app_users = User::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->name . ' - ' . $item->email];
        });
        $app_positions = AppPosition::all()->pluck('app_position_name', 'id');
        $app_organization = AppOrganization::find($app_organization_id);
        return view('app.organizations.users.create_user')
            ->with('app_positions', $app_positions)
            ->with('app_users', $app_users)
            ->with('app_organization', $app_organization);
    }
    public function store_admin_add_to_organization(Request $request)
    {
        //
        $app_position = AppPosition::where('app_position_name','Administrator organizacije')->first();
        if (!$app_position) {
            return redirect()->back()->with('error', 'Področje šolske administracije ne obstaja.');
        }
        if ($request->has('name')) {
            request()->validate([
                'name' => 'required|string',
                'email' => 'required|email',
            ],
            [
                'name.required' => 'Vnesti morate ime.',
                'email.required' => 'Vnesti morate e-naslov.',
                'email.email' => 'Vnesti morate pravilno obliko e-naslova.',
            ]);
            $existingUser = User::where('email', $request->input('email'))->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'Uporabnik s tem e-poštnim naslovom že obstaja.');
            }
            $user = new User;
            $user->name = $request->input ('name');
            $user->email = $request->input ('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            $person = new Person;
            $person->person_name = $request->input ('name');
            $person->user_id = $user->id;
            $person->person_email = $user->email;
            $person->app_organization_id = $request->input('app_organization_id');
            $person->save();
            $user->user_person_id = $person->id;
            $user->save();




        }
        if ($request->has('person_id')) {
            request()->validate([
                'person_id' => 'required|numeric|exists:people,id',
            ],
            [
                'person_id.required' => 'Izbrati morate uporabnika',
                'person_id.exists' => 'Izbrani uporabnik ne obstaja',
            ]);

            $person = Person::find($request->input('person_id'));
            if (!$person) {
                return redirect()->back()->with('error', 'Oseba ni bila najdena.');
            }
            $user =  User::find($person->user_id);
            if (!$user) {
                return redirect()->back()->with('error', 'Uporabnik ni bil najden.');
            }
        }
        if ($request->has('user_id')) {
            request()->validate([
                'user_id' => 'required|numeric|exists:users,id',
            ],
            [
                'user_id.required' => 'Izbrati morate uporabnika',
                'user_id.exists' => 'Izbrani uporabnik ne obstaja',
            ]);
            $user =  User::find($request->input ('user_id'));
            if (!$user) {
                return redirect()->back()->with('error', 'Uporabnik ni bil najden.');
            }
            $person = Person::where('user_id', $user->id)
                    ->where('app_organization_id', $request->input('app_organization_id'))
                    ->first();
            if (!$person) {
                $person = new Person;
                $person->person_name = $user->name;
                $person->user_id = $user->id;
                $person->person_email = $user->email;
                $person->app_organization_id = $request->input('app_organization_id');
                $person->save();
            } 
        }
        //Imamo urejen User in Person profil
        $app_organization = AppOrganization::find($request->input ('app_organization_id'));

        $app_position_person = AppPositionPerson::where('person_id', $person->id)
            ->where('app_position_id', $app_position->id)
            ->first();

        if (!$app_position_person) {
            $app_position_person = new AppPositionPerson;
            $app_position_person->app_position_id = $app_position->id;
            $app_position_person->person_id = $person->id;
            $app_position_person->app_position_person_active = true;
            $app_position_person->save();
        }


        $app_area = AppArea::where('app_area_code', 'orgadmin')
            ->first();

        if ($app_area) {
            $app_area_person = AppAreaPerson::firstOrCreate(
                [
                    'app_area_id' => $app_area->id,
                    'person_id' => $person->id
                ],
                [
                    'app_area_person_active' => false
                ]
            );
            if ($app_area_person->wasRecentlyCreated) {
                return redirect('/app/organizations/'.$request->input ('app_organization_id'))
                    ->with('success', 'Dodan administrator.');
            } else {
                return redirect('/app/organizations/'.$request->input ('app_organization_id'))
                    ->with('error', 'Administrator že obstaja.');
            }
            
        } else {
            return redirect('/app/organizations/'.$request->input ('app_organization_id'))
                ->with('error', 'Ni pravice šolska administracija.');
        }
    }
    public function generateStrongPassword($length = 12)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}[]|:;<>,.?/~';
        $charactersLength = strlen($characters);
        $password = '';

        // Zagotovimo, da imamo vsaj eno veliko črko, eno malo črko, eno številko in en poseben znak
        $password .= $characters[rand(0, 25)]; // velika črka
        $password .= $characters[rand(26, 51)]; // mala črka
        $password .= $characters[rand(52, 61)]; // številka
        $password .= $characters[rand(62, $charactersLength - 1)]; // poseben znak

        for ($i = 4; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        // Premešamo znake v geslu, da odstranimo vzorec
        return str_shuffle($password);
    }
    public function store_user_add_to_organization(Request $request)
    {
        //
        //return($request);
        if ($request->has('name') && $request->input ('name') != null) {
            request()->validate([
                'name' => 'required|string',
                'email' => 'required|email', 
                'app_position_id' => 'required|integer|exists:app_positions,id',
            ],
            [
                'name.required' => 'Vnesti morate ime.',
                'email.required' => 'Vnesti morate e-naslov.',
                'email.email' => 'Vnesti morate pravilno obliko e-naslova.',
                'app_position_id.required' => 'Izbrati morate delovno mesto.',
                'app_position_id.integer' => 'ID delovnega mesta aplikacije mora biti število.',
                'app_position_id.exists' => 'Izbrano delovno mesto  ne obstaja.',
            ]);
            $existingUser = User::where('email', $request->input('email'))->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'Uporabnik s tem e-poštnim naslovom že obstaja.');
            }
            $user = new User;
            $user->name = $request->input ('name');
            $user->email = $request->input ('email');

            $password = $this->generateStrongPassword();
            $user->password = Hash::make($password);
            $user->user_password_main = Crypt::encryptString($password);
            $user->save();
            $person = new Person;
            $person->person_name = $request->input ('name');
            $person->user_id = $user->id;
            $person->person_email = $user->email;
            $person->app_organization_id = $request->input('app_organization_id');
            $person->save();
            $user->user_person_id = $person->id;
            $user->save();

            $app_position_person = new AppPositionPerson;
            $app_position_person->app_position_id = $request->input('app_position_id');
            $app_position_person->person_id = $person->id;
            $app_position_person->app_position_person_active = true;
            $app_position_person->save();

            return redirect('/app/organizations/'.$request->input ('app_organization_id'))
                    ->with('success', 'Dodan uporabnik.');
        }
        if ($request->has('user_id')) {
            request()->validate([
                'user_id' => 'required|numeric|exists:users,id',
            ],
            [
                'user_id.required' => 'Izbrati morate uporabnika',
                'user_id.exists' => 'Izbrani uporabnik ne obstaja',
            ]);
            $user =  User::find($request->input ('user_id'));
            if (!$user) {
                return redirect()->back()->with('error', 'Uporabnik ni bil najden.');
            }
            $person = Person::where('user_id', $user->id)
                    ->where('app_organization_id', $request->input('app_organization_id'))
                    ->first();
            if (!$person) {
                $person = new Person;
                $person->person_name = $user->name;
                $person->user_id = $user->id;
                $person->person_email = $user->email;
                $person->app_organization_id = $request->input('app_organization_id');
                $person->save();
                $app_position_person = new AppPositionPerson;
                $app_position_person->app_position_id = $request->input('app_position_id');
                $app_position_person->person_id = $person->id;
                $app_position_person->app_position_person_active = true;
                $app_position_person->save();
                return redirect('/app/organizations/'.$request->input ('app_organization_id'))
                    ->with('success', 'Dodan uporabnik.');
            } else {
                $app_position_person = AppPositionPerson::where('person_id', $person->id)
                    ->where('app_position_id', $request->input('app_position_id'))
                    ->first();

                if ($app_position_person) {
                    // Če zapis že obstaja, vrni napako
                    return redirect('/app/organizations/' . $request->input('app_organization_id'))
                        ->with('error', 'Uporabnik s tem delovnim mestom že obstaja.');
                } else {
                    // Če zapis ne obstaja, ustvari novo povezavo
                    $app_position_person = new AppPositionPerson;
                    $app_position_person->app_position_id = $request->input('app_position_id');
                    $app_position_person->person_id = $person->id;
                    $app_position_person->app_position_person_active = true;
                    $app_position_person->save();

                    // Preusmeritev z uspešnim sporočilom
                    return redirect('/app/organizations/' . $request->input('app_organization_id'))
                        ->with('success', 'Delovno mesto je bilo uspešno dodeljeno uporabniku.');
                }
            } 
        }
        return redirect('/app/organizations/'.$request->input ('app_organization_id'))
                    ->with('error', 'Ni podatkov.');
    }
    public function remove_admin_from_organization($app_area_person_id, $person_id)
    { 
        //
        $app_position = AppPosition::where('app_position_name','Administrator organizacije')->first();
        if (!$app_position) {
            return redirect()->back()->with('error', 'Področje šolske administracije ne obstaja.');
        }
        $person = Person::find($person_id);
        if (count($person->positions) <2) {
            return redirect()->back()->with('error', 'Uporabnik mora imeti vsaj eno delovno mesto v organizaciji.');
        }

        $app_position_person = AppPositionPerson::where('person_id', $person_id)
            ->where('app_position_id', $app_position->id)
            ->first();
        if ($app_position_person) {
            // Izbrišemo zapis
            $app_position_person->delete();

            return redirect()->back()->with('success', 'Delovno mesto je bilo uspešno odstranjeno iz organizacije.');
        }

        return redirect()->back()->with('error', 'Delovno mesto ali uporabnik ni bil najden.');


        $app_area_person = AppAreaPerson::find($app_area_person_id);

        if ($app_area_person) {
            // Izbrišemo zapis
            $app_area_person->delete();

            return redirect()->back()->with('success', 'Administrator je bil uspešno odstranjen iz organizacije.');
        }

        return redirect()->back()->with('error', 'Administrator ni bil najden.');
    }
    public function remove_position_from_organization($person_id, $app_position_id)
    { 
        //
        $person = Person::find($person_id);
        if (count($person->positions) <2) {
            return redirect()->back()->with('error', 'Uporabnik mora imeti vsaj eno delovno mesto v organizaciji.');
        }
        $app_position_person = AppPositionPerson::where('person_id', $person_id)
            ->where('app_position_id', $app_position_id)
            ->first();

        if ($app_position_person) {
            // Izbrišemo zapis
            $app_position_person->delete();

            return redirect()->back()->with('success', 'Delovno mesto je bilo uspešno odstranjeno iz organizacije.');
        }

        return redirect()->back()->with('error', 'Delovno mesto ali uporabnik ni bil najden.');
    }
}
