<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

use App\Models\Person;
use App\Models\User;


use App\Mail\UserLoginDetailsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;


class SchoolOrganizationUsersController extends Controller
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
    public function pdf_user_login($person_id)
    { 
        //return (1);
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
        $dompdf->loadHtml(view('organization_admin.companies.users.pdf_user_login', $data)->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Prenos PDF dokumenta
        return $dompdf->stream('Uporabnik - '.$person->organization->app_organization_name.' - '.$person->person_name.'.pdf');
    }
    public function mail_user_login($person_id)
    {
        // Najprej poiščemo osebo in uporabnika
        $person = Person::find($person_id); // Popravljeno $person_id
        $user = $person->user;

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

        //$config = Config::get('mail.mailers.aai');
        //$mailer = app()->makeWith('mailer', ['transport' => $config]);

        //$mailer->to('simon.muha@scv.si')->send(new UserLoginDetailsMail($pdfPath));
        //return back()->with('success', 'Prijavni podatki so bili uspešno poslani preko e-pošte.  na e-naslov: '.$user->email);
        $password = Crypt::decryptString($user->user_password_main);

        if (file_exists($pdfPath)) { 
            //Mail::to($user->email)->send(new UserLoginDetailsMail($pdfPath));
            Mail::to($user->email)->send(new UserLoginDetailsMail($pdfPath, $user, $password));  // Pošiljanje tudi gesla

        } else {
            return back()->with('error', 'PDF datoteka ni bila kreirana.');
        }


        // Brisanje PDF po pošiljanju
        unlink($pdfPath);

        return back()->with('success', 'Prijavni podatki so bili uspešno poslani na e-naslov: '.$user->email);
    }
    public function mail_trailer($person_id)
    {
        // Najprej poiščemo osebo in uporabnika
        $person = Person::find($person_id); // Popravljeno $person_id
        $user = $person->user;

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

        //$config = Config::get('mail.mailers.aai');
        //$mailer = app()->makeWith('mailer', ['transport' => $config]);

        //$mailer->to('simon.muha@scv.si')->send(new UserLoginDetailsMail($pdfPath));
        //return back()->with('success', 'Prijavni podatki so bili uspešno poslani preko e-pošte.  na e-naslov: '.$user->email);
        $password = Crypt::decryptString($user->user_password_main);

        if (file_exists($pdfPath)) { 
            //Mail::to($user->email)->send(new UserLoginDetailsMail($pdfPath));
            Mail::to($user->email)->send(new UserLoginDetailsMail($pdfPath, $user, $password));  // Pošiljanje tudi gesla

        } else {
            return back()->with('error', 'PDF datoteka ni bila kreirana.');
        }


        // Brisanje PDF po pošiljanju
        unlink($pdfPath);

        return back()->with('success', 'Prijavni podatki so bili uspešno poslani na e-naslov: '.$user->email);
    }

}
