<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Quality\QualitySystem;
use App\Models\Quality\QualityStandard;

class QualitySystemsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 
     *migracija vprašanj - /migrate-indicators


     * @return \Illuminate\Http\Response
     */
    public function __construct()
    { 
        $this->middleware('auth');
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
    public function showSystem($systemCode) 
    {
        // Poišči sistem glede na podani quality_system_code
        $quality_system = QualitySystem::where('quality_system_code', $systemCode)->first();

        // Preveri, če je sistem najden
        if (!$quality_system) {
            abort(404, 'Sistem ni najden.'); // Vrni 404 napako, če sistem ne obstaja
        }

        // Vrni pogled z najdenim sistemom
        //return($systemCode);
        $quality_standards = QualityStandard::where('quality_system_id',$quality_system->id)
            ->where('quality_standard_parent_id',null)
            ->get();

        return view('school.quality.systems.show')
        ->with('quality_standards', $quality_standards)
        ->with('quality_system', $quality_system);
    }
    public function migrateIndicatorsToStandards()
{
    DB::beginTransaction();

    try {
        // Pridobi vse quality_indicators
        $qualityIndicators = DB::table('quality_indicators')->get();

        foreach ($qualityIndicators as $indicator) {
            // Najdi pripadajoči quality_standard
            $parentStandard = DB::table('quality_standards')->where('id', $indicator->quality_standard_id)->first();

            if (!$parentStandard) {
                throw new Exception("Ni najdenega quality_standard za indikator ID: {$indicator->id}");
            }

            // Ustvari nov zapis v quality_standards za indikator
            $newStandardId = DB::table('quality_standards')->insertGetId([
                'quality_system_id' => $parentStandard->quality_system_id,
                'quality_standard_parent_id' => $parentStandard->id, // Nastavi parent_id na ID parent standarda
                'quality_standard_number' => $indicator->quality_indicator_number, // Kopiraj številko
                'quality_standard_name' => $indicator->quality_indicator_name, // Kopiraj ime
                'quality_standard_description' => $indicator->quality_indicator_description, // Kopiraj opis
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Posodobi quality_question_indicators
            DB::table('quality_question_indicators')
                ->where('quality_indicator_id', $indicator->id)
                ->update(['quality_indicator_id' => $newStandardId]);
        }

        DB::commit();

        return response()->json(['message' => 'Migracija uspešno zaključena!'], 200);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}
