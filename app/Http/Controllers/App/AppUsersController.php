<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Dompdf\Dompdf;
use Dompdf\Options;
 
use App\Models\App\AppPosition; 
use App\Models\App\AppPositionPerson; 

use App\Mail\UserLoginDetailsMail;
use Illuminate\Support\Facades\Mail;

class AppUsersController extends Controller
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
        $users = User::all(); 
        //return ($usersWithRoles);
        return view('app.users.index')
            ->with('users', $users);
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
        //Odstranjena je bila zaščita, da samo posameznik vidi svoj profil.
        //return (1);
        $user = User::find ($id); 
        if (!isset($user)){
            return redirect ('/home')
                ->with('error', 'Napaka. Oseba ne obstaja');
        }
        $app_positions = AppPosition::all();
        $person = Person::find ($user->user_person_id);
        return view ('app.users.show')
            ->with ('app_positions',$app_positions)
            ->with ('user',$user)
            ->with ('person',$person);


        if (auth()->user()->id == $id) {
            $user = User::find ($id); 
            if (!isset($user)){
                return redirect ('/home')
                    ->with('error', 'Napaka. Oseba ne obstaja');
            }

            $person = Person::find ($user->user_person_id);
            $person_intime = null;
            return view ('app.users.show')
                ->with ('user',$user)
                ->with ('person',$person)
                ->with ('person_intime',$person_intime);
        } else {
            return redirect ('/home')
                        ->with('error', 'Napaka. Nimate dovoljenja');
        }
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
    public function add_position_to_person(Request $request)
    {
        //
        //return ($request);
        $request->validate([
            'person_id' => 'required|numeric|exists:people,id',
            'app_position_id' => 'required|numeric|exists:app_positions,id',
        ], [
            'person_id.required' => 'Izbrati morate uporabnika.',
            'app_position_id.required' => 'Izbrati morate delovno mesto.',
            'app_position_id.exists' => 'Izbrano delovno mesto ne obstaja.',
            'person_id.exists' => 'Izbran profil uporabnika ne obstaja.',
        ]);
    
        $person = Person::find($request->input('person_id'));
        $app_position = AppPosition::find($request->input('app_position_id'));
    
        if (!$person || !$app_position) {
            return redirect()->back()->with('error', 'Uporabniški profil ali delovno mesto ne obstajata.');
        }
    
        // Preveri, če je uporabnik že povezan z izbrano vlogo
        $existingPosition = $person->positions()->where('app_position_id', $request->input('app_position_id'))->exists();
    
        if ($existingPosition) {
            return redirect()->back()->with('error', 'Uporabnik že ima to delovno mesto.');
        }
    
        // Dodajanje nove vloge uporabniku
        $app_position_person = new AppPositionPerson;
        $app_position_person->app_position_id = $request->input('app_position_id');
        $app_position_person->person_id = $request->input('person_id');
        $app_position_person->app_position_person_active = true;
        $app_position_person->save();
    
        return redirect()->back()->with('success', 'Delovno mesto je bil uspešno dodano uporabnikovemu profilu.');
    
    }
    
    public function remove_position_from_person ($person_id, $app_position_id)
    { 
        //
        //return($person_id);

        $person = Person::find($person_id);
        $position = AppPosition::find($app_position_id);

        if (!$person || !$position) {
            return redirect()->back()->with('error', 'Oseba ali delovno mesto ne obstajata.');
        }

        // Preveri, če ima oseba dodeljeno to delovno mesto
        if (!$person->positions()->where('app_position_id', $app_position_id)->exists()) {
            return redirect()->back()->with('error', 'Oseba nima dodeljenega tega delovnega mesta.');
        }

        // Odstrani delovno mesto iz osebe
        $person->positions()->detach($app_position_id);

        return redirect()->back()->with('success', 'Delovno mesto je bilo uspešno odstranjeno.');


    }
    public function pdf_user_login($person_id)
    { 
        $person = Person::findOrFail($person_id);
        $user = $person->user;

        // Prilagoditev nastavitev DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'user_password_main' => Crypt::decryptString($user->user_password_main),
            'organization_name' => $person->organization->app_organization_name,
            'person_name' => $person->person_name,
            'person_surname' => $person->person_surname,
        ];
        // Ustvarjanje PDF
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('app.organizations.users.pdf_user_login', $data)->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Prenos PDF dokumenta
        return $dompdf->stream('Uporabnik - '.$person->organization->app_organization_name.' - '.$person->person_name.'.pdf');
    }


    public function mail_user_login($user_id)
    {
        // Najprej poiščemo osebo in uporabnika
        $user = User::find($user_id); // Popravljeno $person_id
        $person =  $user->person;
        // Nastavitve za DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Pripravimo podatke za PDF
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'user_password_main' => Crypt::decryptString($user->user_password_main),
            'organization_name' => $person->organization->app_organization_name,
            'person_name' => $person->person_name,
            'person_surname' => $person->person_surname,
        ];

        // Ustvarjanje PDF s DomPDF
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('organization_admin.companies.users.pdf_user_login', $data)->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Definiramo pot za začasno shranjevanje PDF datoteke
        $pdfDir = storage_path('app/public/temp');
        $pdfPath = $pdfDir . '/user_login_' . $person->id . '.pdf';

        // Preverjanje in ustvarjanje mape, če ne obstaja
        if (!file_exists($pdfDir)) {
            mkdir($pdfDir, 0755, true); // Ustvari mapo z dovoljenji 0755, vključno z vsemi nadrejenimi mapami
        }

        // Shranjevanje PDF na začasno lokacijo
        file_put_contents($pdfPath, $dompdf->output());

        //return ($pdfPath);
        // Pošiljanje e-pošte s PDF prilogo
        //return($user->email);
        if (file_exists($pdfPath)) {
            Mail::to($user->email)->send(new UserLoginDetailsMail($pdfPath));
        } else {
            return back()->with('error', 'PDF datoteka ni bila kreirana.');
        }


        // Brisanje PDF po pošiljanju
        unlink($pdfPath);

        return back()->with('success', 'Prijavni podatki so bili uspešno poslani na e-naslov: '.$user->email);
    }
    public function reset_password($id)
    {
        // Poiščite uporabnika po ID-ju
        //return ($id);
        $user = User::findOrFail($id);
        $user_password_main = Crypt::decryptString($user->user_password_main);
        $user->password = Hash::make($user_password_main);
        $user->save();

        // Pošljite začasno geslo uporabniku ali ga prikažite na zaslonu
        // Na primer, lahko prikažete sporočilo
        return back()->with('success', 'Geslo je bilo uspešno ponastavljeno.');
    }

}
