<?php

namespace App\Http\Controllers\admin\liquidacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LuafTable;
use App\Models\Rubro;
use App\Models\Establishments;
use App\Models\LiquidationSequence;
use App\Models\Liquidation;
use App\Models\LiquidationRubro;
use App\Models\Catalogue_SBU;
use App\Models\Interes;
use PDF;
use App\Models\InitialEmissionValue;
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
                $establisment_id = 0;
                $max_num_liquidacion = 0;
                $total_liquidacion = 0;
                $total_tasa_administrativa = 0;
                $sueldo_basico_unificado = 0;

                //verifica si existe el sueldo basico para el año de emision
                if(Catalogue_SBU::where('year',$year_emision)->count() == 0){
                    return response()->json(['success' => 'error','message' => 'No se encuentra registrado un sueldo basico con el año de emisión']);
                }
                //verifica si existe interes para el año de emision
                if(Interes::where('year',$year_emision)->count() == 0){
                    return response()->json(['success' => 'error','message' => 'No se encuentra registrado el interes para el año de emisión']);
                }

                $existsInitialEmissionValue = InitialEmissionValue::where([
                                ['year', '=', $year_emision]
                                ])->count();

                if($existsInitialEmissionValue > 0){
                    return response()->json(['success' => 'error','message' => 'Ya existe una emisión para el año '.$year_emision]);
                }
                //obtenemos el sueldo basico del año de emision
                $SBU = Catalogue_SBU::where('year',$year_emision)->first();
                $sueldo_basico_unificado = $SBU->value;
                // contamos las secuencia del año de emision
                $contadorSecuencia = LiquidationSequence::where('year',$year_emision)->count();
                //inicializamos la variable en cero
                $max_num_liquidacion = 0;
                // 1--- recorremos todos los establecimientos
                foreach (Establishments::where('status',1)->lazy() as $e) {
                    //validamos si es la primera liquidacion la cual tendra una secuencia de 1
                    if($contadorSecuencia < 1){
                        $max_num_liquidacion = 1;
                        $LiquidationSequence = new LiquidationSequence;
                        $LiquidationSequence->sequence = $max_num_liquidacion;
                        $LiquidationSequence->year = $year_emision;
                        $LiquidationSequence->type_liquidation_id = 1;
                        $LiquidationSequence->save();
                        $contadorSecuencia = $max_num_liquidacion;
                    }else{
                        //si la secuencia es mayor a cero, esta tendra un incremento
                        $max_num_liquidacion = $contadorSecuencia + 1;
                        $LiquidationSequence = new LiquidationSequence;
                        $LiquidationSequence->sequence = str_pad($max_num_liquidacion, 6, '0', STR_PAD_LEFT);
                        $LiquidationSequence->year = $year_emision;
                        $LiquidationSequence->type_liquidation_id = 1;
                        $LiquidationSequence->save();
                        $contadorSecuencia = $max_num_liquidacion;
                    }
                    //Se procede a crear la liquidacion;
                    $Liquidation = new Liquidation();
                    $Liquidation->voucher_number = null;
                    $Liquidation->liquidation_number = $max_num_liquidacion;
                    $Liquidation->liquidation_code = $year_emision.'-'.str_pad($max_num_liquidacion, 6, '0', STR_PAD_LEFT).'-LUAF';
                    $Liquidation->total_payment = 0;
                    $Liquidation->status = 2;
                    $Liquidation->username = Auth()->user()->email;
                    $Liquidation->observation = 'Emision '.$year_emision;
                    $Liquidation->year = $year_emision;
                    $Liquidation->type_liquidation_id = 1;
                    $Liquidation->establishment_id = $e->id;
                    $Liquidation->is_coercive = false;
                    $Liquidation->save();

                    //3-- recorremos los rubros
                    for($i=0;$i<count($checkrubroData);$i++){
                        if($checkrubroData[$i] == 1){
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
                                $valorLuaf = 0;
                                foreach($LuafTable as $lt){
                                    $valorLuaf = round(($lt->percentage * $sueldo_basico_unificado) / 100, 2);
                                    $LiquidationRubro = new LiquidationRubro;
                                    $LiquidationRubro->rubro_id = $checkrubroData[$i];
                                    $LiquidationRubro->liquidation_id = $Liquidation->id;
                                    $LiquidationRubro->value = $valorLuaf;
                                    $LiquidationRubro->status = true;
                                    $LiquidationRubro->save();
                                    $Liquidationupdate = Liquidation::find($Liquidation->id);
                                    $Liquidationupdate->total_payment = $Liquidationupdate->total_payment + $valorLuaf;
                                    $Liquidationupdate->save();
                                    $total_liquidacion = $total_liquidacion + $valorLuaf;
                                }
                            }

                            //guardamos o actualizamos la tabla inicial de emision de
                            $existsInitialEmissionValue = InitialEmissionValue::where([
                                ['rubro_id','=',$checkrubroData[$i]],
                                ['year', '=', $year_emision]
                            ])->count();
                            if($existsInitialEmissionValue == 1){
                                $idInitialEmissionValue = InitialEmissionValue::where([
                                    ['rubro_id','=',$checkrubroData[$i]],
                                    ['year', '=', $year_emision]
                                ])->first();
                                $InitialEmissionValue = InitialEmissionValue::find($idInitialEmissionValue->id);
                                $InitialEmissionValue->rubro_id = $checkrubroData[$i];
                                $InitialEmissionValue->year = $year_emision;
                                $InitialEmissionValue->initial_value = $total_liquidacion;
                                $InitialEmissionValue->status = true;
                                $InitialEmissionValue->save();
                            }else{
                                $InitialEmissionValue = new InitialEmissionValue();
                                $InitialEmissionValue->rubro_id = $checkrubroData[$i];
                                $InitialEmissionValue->year = $year_emision;
                                $InitialEmissionValue->initial_value = $total_liquidacion;
                                $InitialEmissionValue->status = true;
                                $InitialEmissionValue->save();
                            }

                        }else if($checkrubroData[$i] == 2){
                            //rubro tasa administrativa
                            $LiquidationRubro = new LiquidationRubro;
                            $LiquidationRubro->rubro_id = $checkrubroData[$i];
                            $LiquidationRubro->liquidation_id = $Liquidation->id;
                            $LiquidationRubro->value = round(5,2);
                            $LiquidationRubro->status = true;
                            $LiquidationRubro->save();
                            $Liquidationupdate = Liquidation::find($Liquidation->id);
                            $Liquidationupdate->total_payment = $Liquidationupdate->total_payment + round(5,2);
                            $Liquidationupdate->save();
                            $total_tasa_administrativa = $total_tasa_administrativa + $LiquidationRubro->value;
                            //guardamos o actualizamos la tabla inicial de emision de
                            $existsInitialEmissionValue = InitialEmissionValue::where([
                                ['rubro_id','=',$checkrubroData[$i]],
                                ['year', '=', $year_emision]
                            ])->count();
                            if($existsInitialEmissionValue == 1){
                                $idInitialEmissionValue = InitialEmissionValue::where([
                                    ['rubro_id','=',$checkrubroData[$i]],
                                    ['year', '=', $year_emision]
                                ])->first();
                                $InitialEmissionValue = InitialEmissionValue::find($idInitialEmissionValue->id);
                                $InitialEmissionValue->rubro_id = $checkrubroData[$i];
                                $InitialEmissionValue->year = $year_emision;
                                $InitialEmissionValue->initial_value = $total_tasa_administrativa;
                                $InitialEmissionValue->status = true;
                                $InitialEmissionValue->save();
                            }else{
                                $InitialEmissionValue = new InitialEmissionValue();
                                $InitialEmissionValue->rubro_id = $checkrubroData[$i];
                                $InitialEmissionValue->year = $year_emision;
                                $InitialEmissionValue->initial_value = $total_tasa_administrativa;
                                $InitialEmissionValue->status = true;
                                $InitialEmissionValue->save();
                            }

                        }
                    }


                }

        $respuesta = ["status" => "200","success" => 'guardado'];

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
