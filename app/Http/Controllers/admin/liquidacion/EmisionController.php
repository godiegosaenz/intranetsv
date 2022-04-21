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

class EmisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LuafTable = LuafTable::all();
        $Rubro = Rubro::all();
        return view('liquidation.emision',compact('LuafTable','Rubro'));
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
        $checkrubroData = explode(',',$request->checkrubro);
        $year_emision = $request->year_emision;
        $max_num_liquidacion = 0;
        $total_liquidacion = 0;
        $sueldo_basico_unificado = 0;
        if(Catalogue_SBU::where('year',$year_emision)->count() == 1){
            $SBU = Catalogue_SBU::where('year',$year_emision)->first();
            $sueldo_basico_unificado = $SBU->value;
            // 1 Recorremos todos los establecimientos
            foreach (Establishments::where('status',1)->lazy() as $e) {
                //verificamos la secuencia maxima para el año y el tipo de liquidacion
                $contadorSecuencia = LiquidationSequence::where('year',$year_emision)->count();
                if($contadorSecuencia == 0){
                    $LiquidationSequence = new LiquidationSequence;
                    $LiquidationSequence->sequence = 1;
                    $LiquidationSequence->year = $year_emision;
                    $LiquidationSequence->type_liquidation_id = 1;
                }else{
                    $max_num_liquidacion = LiquidationSequence::where('year',$year_emision)->max();
                    $max_num_liquidacion = $max_num_liquidacion + 1;
                    $LiquidationSequence = new LiquidationSequence;
                    $LiquidationSequence->sequence = $max_num_liquidacion;
                    $LiquidationSequence->year = $year_emision;
                    $LiquidationSequence->type_liquidation_id = 1;
                }
                $Liquidation = new Liquidation();
                $Liquidation->voucher_number = NULL;
                $Liquidation->liquidation_number = $max_num_liquidacion;
                $Liquidation->liquidation_code = $year_emision.'-'.$max_num_liquidacion.'-LUAF';
                $Liquidation->total_payment = 0;
                $Liquidation->status = 2;
                $Liquidation->username = 'dbermudez1349@hotmail.com';
                $Liquidation->observation = 'Emision 2021';
                $Liquidation->year = $year_emision;
                $Liquidation->type_liquidation_id = 1;
                $Liquidation->establishment_id = $e->id;
                $Liquidation->is_coercive = false;
                $Liquidation->save();
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
                                        ['year' => $year_emision],
                                        ['tourist_activity_id' => $year_emision],
                                        ['classification_id' => $year_emision],
                                        ['category_id' => $year_emision],
                                    ])->get();
                                    //calcular valor del rubro de LUAF segun acuerdo Ministerial 2020 - 34
                                    $valorLuaf = ($LuafTable->percentage * $sueldo_basico_unificado) * $e->rooms_number;
                                    $LiquidationRubro = new LiquidationRubro;
                                    $LiquidationRubro->rubro_id = $cr->id;
                                    $LiquidationRubro->liquidation_id = $Liquidation->id;
                                    $LiquidationRubro->value = $valorLuaf;
                                    $LiquidationRubro->status = true;
                                }
                            }
                        }
                    }
                }
            }
        }

        $respuesta = ["status" => "200",
                        "success" => true,
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
}
