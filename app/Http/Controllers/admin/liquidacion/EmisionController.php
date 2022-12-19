<?php

namespace App\Http\Controllers\admin\liquidacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\LuafTable;
use App\models\Rubro;
use App\models\Establishments;
use App\models\LiquidationSequence;
use App\models\Liquidation;
use App\models\LiquidationRubro;
use App\models\Catalogue_SBU;
use PDF;
use App\models\InitialEmissionValue;
use Illuminate\Support\Facades\DB;
use Exception;

class EmisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rubro = Rubro::all();
        $yearEmision = LuafTable::select('year')->groupBy('year')->get();
        return view('liquidation.emision',compact('Rubro','yearEmision'));
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
        //try {
            //DB::beginTransaction();
                $checkrubroData = explode(',',$request->checkrubro);
                $year_emision = $request->year_emision;
                $year_luaf = $request->year_luaf;
                $max_num_liquidacion = 0;
                $total_liquidacion = 0;
                $total_tasa_administrativa = 0;
                $sueldo_basico_unificado = 0;

                //verifica si existe el sueldo basico para el año de emision
                if(Catalogue_SBU::where('year',$year_emision)->count() == 0){
                    return response()->json(['success' => 'error','message' => 'No se encuentra registrado un sueldo basico con el año de emisión']);
                }

                    $SBU = Catalogue_SBU::where('year',$year_emision)->first();
                    $sueldo_basico_unificado = $SBU->value;
                    // 1 Recorremos todos los establecimientos
                    $contadorSecuencia = LiquidationSequence::where('year',$year_emision)->count();
                    $max_num_liquidacion = 0;
                    foreach (Establishments::where('status',1)->lazy() as $e) {

                        if($contadorSecuencia == 0){
                            $max_num_liquidacion = 1;
                            $LiquidationSequence = new LiquidationSequence;
                            $LiquidationSequence->sequence = $max_num_liquidacion;
                            $LiquidationSequence->year = $year_emision;
                            $LiquidationSequence->type_liquidation_id = 1;
                            $LiquidationSequence->save();
                            $contadorSecuencia = $contadorSecuencia + 1;
                        }else{
                            $max_num_liquidacion = $contadorSecuencia;
                            $LiquidationSequence = new LiquidationSequence;
                            $LiquidationSequence->sequence = str_pad($max_num_liquidacion, 6, '0', STR_PAD_LEFT);
                            $LiquidationSequence->year = $year_emision;
                            $LiquidationSequence->type_liquidation_id = 1;
                            $LiquidationSequence->save();
                            $contadorSecuencia = $contadorSecuencia + 1;
                        }
                        $Liquidation = new Liquidation();
                        $Liquidation->voucher_number = null;
                        $Liquidation->liquidation_number = $max_num_liquidacion;
                        $Liquidation->liquidation_code = $year_emision.'-'.str_pad($max_num_liquidacion, 6, '0', STR_PAD_LEFT).'-LUAF';
                        $Liquidation->total_payment = 0;
                        $Liquidation->status = 2;
                        $Liquidation->username = 'dbermudez1349@hotmail.com';
                        $Liquidation->observation = 'Emision 2022';
                        $Liquidation->year = $year_emision;
                        $Liquidation->type_liquidation_id = 1;
                        $Liquidation->establishment_id = $e->id;
                        $Liquidation->is_coercive = false;
                        $Liquidation->save();
                        //obtenemos todos los rubros
                        $checkrubro = Rubro::lazy();

                        // 2 Recorremo todos los rubros que existen
                        foreach ($checkrubro as $cr){
                            if($checkrubroData != null){
                                //3 recorremos los rubros selecccionados en el formulario
                                for($i=0;$i<count($checkrubroData);$i++){
                                    if($cr->id == $checkrubroData[$i]){
                                        //validamos si es el rubro del luaf_tables
                                        if($cr->id == 1){
                                            //obtener datos de la tabla LUAF
                                            $LuafTable = LuafTable::where([
                                                ['year','=', $year_luaf],
                                                ['tourist_activity_id', '=', $e->tourist_activity_id],
                                                ['classification_id' , '=', $e->classification_id],
                                                ['category_id' , '=', $e->category_id],
                                            ])->get();
                                            //calcular valor del rubro de LUAF segun acuerdo Ministerial 2020 - 34
                                            //return $LuafTable;
                                            if($LuafTable->count() == 1){
                                                foreach($LuafTable as $lt){
                                                    $valorLuaf = 0;
                                                    if($e->tourist_activity_id == 1 ){
                                                        if($e->category_id == 2){
                                                            $valorLuaf = ($lt->percentage * $sueldo_basico_unificado) * $e->total_places;
                                                        }else{
                                                            $valorLuaf = ($lt->percentage * $sueldo_basico_unificado)* $e->total_rooms;
                                                        }
                                                    }else if($e->tourist_activity_id == 2){
                                                        $valorLuaf = ($lt->percentage * $sueldo_basico_unificado);
                                                    }else if($e->tourist_activity_id == 3){
                                                        $valorLuaf = ($lt->percentage * $sueldo_basico_unificado);
                                                    }else if($e->tourist_activity_id == 4){
                                                        $valorLuaf = ($lt->percentage * $sueldo_basico_unificado);
                                                    }else if($e->tourist_activity_id == 5){
                                                        $valorLuaf = ($lt->percentage * $sueldo_basico_unificado) * $e->total_places;
                                                    }else if($e->tourist_activity_id == 6){
                                                        $valorLuaf = ($lt->percentage * $sueldo_basico_unificado);
                                                    }
                                                    $LiquidationRubro = new LiquidationRubro;
                                                    $LiquidationRubro->rubro_id = $cr->id;
                                                    $LiquidationRubro->liquidation_id = $Liquidation->id;
                                                    $LiquidationRubro->value = $valorLuaf;
                                                    $LiquidationRubro->status = true;
                                                    $LiquidationRubro->save();
                                                    $Liquidationupdate = Liquidation::find($Liquidation->id);
                                                    $Liquidationupdate->total_payment = $Liquidationupdate->total_payment + $valorLuaf;
                                                    $Liquidationupdate->save();
                                                    $total_liquidacion = $total_liquidacion + $LiquidationRubro->value;
                                                }

                                            }

                                            //guardamos o actualizamos la tabla inicial de emision de
                                            $existsInitialEmissionValue = InitialEmissionValue::where([
                                                ['rubro_id','=',$cr->id],
                                                ['year', '=', $year_emision]
                                            ])->count();
                                            if($existsInitialEmissionValue == 1){
                                                $idInitialEmissionValue = InitialEmissionValue::where([
                                                    ['rubro_id','=',$cr->id],
                                                    ['year', '=', $year_emision]
                                                ])->first();
                                                $InitialEmissionValue = InitialEmissionValue::find($idInitialEmissionValue->id);
                                                $InitialEmissionValue->rubro_id = $cr->id;
                                                $InitialEmissionValue->year = $year_emision;
                                                $InitialEmissionValue->initial_value = $total_liquidacion;
                                                $InitialEmissionValue->status = true;
                                                $InitialEmissionValue->save();
                                            }else{
                                                $InitialEmissionValue = new InitialEmissionValue();
                                                $InitialEmissionValue->rubro_id = $cr->id;
                                                $InitialEmissionValue->year = $year_emision;
                                                $InitialEmissionValue->initial_value = $total_liquidacion;
                                                $InitialEmissionValue->status = true;
                                                $InitialEmissionValue->save();
                                            }

                                        }else if($cr->id == 2){
                                            //rubro tasa administrativa
                                            $LiquidationRubro = new LiquidationRubro;
                                            $LiquidationRubro->rubro_id = $cr->id;
                                            $LiquidationRubro->liquidation_id = $Liquidation->id;
                                            $LiquidationRubro->value = $cr->value;
                                            $LiquidationRubro->status = true;
                                            $LiquidationRubro->save();
                                            $Liquidationupdate = Liquidation::find($Liquidation->id);
                                            $Liquidationupdate->total_payment = $Liquidationupdate->total_payment + $cr->value;
                                            $Liquidationupdate->save();
                                            $total_tasa_administrativa = $total_tasa_administrativa + $LiquidationRubro->value;
                                            //guardamos o actualizamos la tabla inicial de emision de
                                            $existsInitialEmissionValue = InitialEmissionValue::where([
                                                ['rubro_id','=',$cr->id],
                                                ['year', '=', $year_emision]
                                            ])->count();
                                            if($existsInitialEmissionValue == 1){
                                                $idInitialEmissionValue = InitialEmissionValue::where([
                                                    ['rubro_id','=',$cr->id],
                                                    ['year', '=', $year_emision]
                                                ])->first();
                                                $InitialEmissionValue = InitialEmissionValue::find($idInitialEmissionValue->id);
                                                $InitialEmissionValue->rubro_id = $cr->id;
                                                $InitialEmissionValue->year = $year_emision;
                                                $InitialEmissionValue->initial_value = $total_tasa_administrativa;
                                                $InitialEmissionValue->status = true;
                                                $InitialEmissionValue->save();
                                            }else{
                                                $InitialEmissionValue = new InitialEmissionValue();
                                                $InitialEmissionValue->rubro_id = $cr->id;
                                                $InitialEmissionValue->year = $year_emision;
                                                $InitialEmissionValue->initial_value = $total_tasa_administrativa;
                                                $InitialEmissionValue->status = true;
                                                $InitialEmissionValue->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
            //DB::commit();
        /*} catch (\Exception $e) {
            //DB::rollBack();
            return report($e);
            return response()->json(['message' => 'Error']);
        }*/
        $respuesta = ["status" => "200",
                        "success" => 'guardado',
                        ];

        return json_encode($respuesta);
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

    public function report($year)
    {
        $emision = InitialEmissionValue::where([
            ['year', '=', $year]
        ])->get();
        $Liquidation = Liquidation::with(['liquidations_rubros'])->where('year',$year)->get();

        $r = '';
        foreach($Liquidation as $li){
            $r .= $li->liquidations_rubros->value.' ';
        }
        return $r;
        //return $Liquidation;
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'emision' => $emision,
            'Liquidation' => $Liquidation
        ];

        $pdf = PDF::loadView('reports.emisionReporte', $data)
                            ->setPaper('a4', 'landscape');

        return $pdf->download('emision_luaf_'.$year.'.pdf');
    }
}
