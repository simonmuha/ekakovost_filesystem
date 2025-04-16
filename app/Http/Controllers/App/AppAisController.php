<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\App\AppAiType;
use App\Models\App\AppAi;
use App\Models\App\AppAiSegment;


class AppAisController extends Controller
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
        $app_ais = AppAi::all();
        return view('app.ais.index')
            ->with('app_ais', $app_ais);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $app_ai_types = AppAiType::all();
        return view('app.ais.create')
            ->with('app_ai_types', $app_ai_types);
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
        //return($request);
        request()->validate([
            'app_ai_name' => 'required|max:255|string',
        ],
        [
            'app_ai_name.required' => 'Potrebno je vnesti ime.',
        ]);

        $app_ai = new AppAi;
        $app_ai->app_ai_name = $request->input ('app_ai_name');
        $app_ai->app_ai_description = $request->input ('app_ai_description');
        $app_ai->save();

        // Ustvari nov segment
        $app_ai_types = AppAiType::all();

        foreach ($app_ai_types as $app_ai_type) {
            // Pridobite vrednost iz obrazca
            if ($request->input('app_ai_type_' . $app_ai_type->id) != null) {
                // Ustvari nov segment
                AppAiSegment::create([
                    'app_ai_segment_description' => $request->input('app_ai_type_' . $app_ai_type->id),
                    'app_ai_type_id' => $app_ai_type->id,
                    'app_ai_id' => $app_ai->id // Preverite, ali ta vrednost prihaja iz obrazca
                ]);
            }
        }

        return redirect('/app/ais/')
            ->with('success', 'Dodano');
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

        $app_ai_prompt = '';
        $app_ai = AppAi::find($id);
        foreach ($app_ai->segments as $app_ai_segment) {
            $app_ai_prompt .=  $app_ai_segment->app_ai_segment_description . "\n";
        }
        return view('app.ais.show')
        ->with('app_ai_prompt', $app_ai_prompt)
        ->with('app_ai', $app_ai);
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
        $app_ai_types = AppAiType::all();
        $app_ai = AppAi::find($id);
        return view('app.ais.edit')
            ->with('app_ai_types', $app_ai_types)
            ->with('app_ai', $app_ai);

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
        //return($request);
        request()->validate([
            'app_ai_name' => 'required|max:255|string',
        ],
        [
            'app_ai_name.required' => 'Potrebno je vnesti ime.',
        ]);

        $app_ai = AppAi::find($id);
        $app_ai->app_ai_name = $request->input ('app_ai_name');
        $app_ai->app_ai_description = $request->input ('app_ai_description');
        $app_ai->save();

        // Ustvari ali posodobi segmente
        $app_ai_types = AppAiType::all();

        foreach ($app_ai_types as $app_ai_type) {
            $inputName = 'app_ai_type_' . $app_ai_type->id;

            if ($request->input($inputName) != null) {
                // Preveri, če segment že obstaja
                $segment = AppAiSegment::where('app_ai_type_id', $app_ai_type->id)
                                        ->where('app_ai_id', $app_ai->id)
                                        ->first();

                if ($segment) {
                    // Posodobi obstoječi segment
                    $segment->app_ai_segment_description = $request->input($inputName);
                    $segment->save();
                } else {
                    // Ustvari nov segment
                    AppAiSegment::create([
                        'app_ai_segment_description' => $request->input($inputName),
                        'app_ai_type_id' => $app_ai_type->id,
                        'app_ai_id' => $app_ai->id
                    ]);
                }
            } else {
                // Če ni inputa za ta segment, ga izbrišite
                $segment = AppAiSegment::where('app_ai_type_id', $app_ai_type->id)
                                        ->where('app_ai_id', $app_ai->id)
                                        ->first();
                if ($segment) {
                    $segment->delete();
                }
            }
        }

        return redirect('/app/ais/')
            ->with('success', 'Posodobljeno');

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
