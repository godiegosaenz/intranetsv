<?php

namespace App\Http\Controllers\admin\liquidacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Liquidation;
use App\Models\Interes;
use Illuminate\Database\Eloquent\Collection;

class LiquidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('liquidation.liquidation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLiquidation(Request $request){
        //$Liquidation = Liquidation::find($request->establishment_id_2);
        $Liquidation = Liquidation::with(['establishment'])->where('establishment_id',$request->establishment_id_2 )->get();
        $DatosLiquidacion = $Liquidation->map(function ($liq) {
            $valorinteres = Interes::all();
            $data[$liq->id]['id'] = $liq->id;
            $data[$liq->id]['liquidation_number'] = $liq->liquidation_number;
            $data[$liq->id]['liquidation_code'] = $liq->liquidation_code;
            $data[$liq->id]['total_payment'] = $liq->total_payment;
            $data[$liq->id]['status'] = $liq->status;
            $data[$liq->id]['year'] = $liq->year;
            $data[$liq->id]['propietario'] = $liq->establishment->people_entities_owner->name;
            $data[$liq->id]['establisment_name'] = $liq->establishment->name;
            $data[$liq->id]['descuento'] = round(0,2);
            $data[$liq->id]['recargo'] = round(0,2);
            foreach($valorinteres as $vi){
                if($vi->year == $data[$liq->id]['year']){
                    $data[$liq->id]['interes'] = round(($liq->total_payment * $vi->percentage)/100, 2);
                }
            }
            $data[$liq->id]['total'] = round($liq->total_payment + $data[$liq->id]['interes'],2);
            return $data;
        });
        return response()->json(['estado' => 'ok','Liquidation'=>$DatosLiquidacion]);
    }

    public function getLiquidationpago(Request $r){
        $checkLiquidacion = $r->checkLiquidacion;
        $Liquidation = new Collection([]);
        $contador = 0;
        $totalapagar = 0;
        for($i=0;$i<count($checkLiquidacion);$i++){
            $contador++;
            $liq = Liquidation::where('id',$checkLiquidacion[$i])->get();
            $datos = $liq->map(function($item,$key){
                $valorinteres = Interes::all();
                $data[$item->id]['id'] = $item->id;
                $data[$item->id]['liquidation_number'] = $item->liquidation_number;
                $data[$item->id]['liquidation_code'] = $item->liquidation_code;
                $data[$item->id]['total_payment'] = $item->total_payment;
                $data[$item->id]['status'] = $item->status;
                $data[$item->id]['year'] = $item->year;
                $data[$item->id]['propietario'] = $item->establishment->people_entities_owner->name;
                $data[$item->id]['establisment_name'] = $item->establishment->name;
                $data[$item->id]['descuento'] = round(0,2);
                $data[$item->id]['recargo'] = round(0,2);
                foreach($valorinteres as $vi){
                    if($vi->year == $data[$item->id]['year']){
                        $data[$item->id]['interes'] = round(($item->total_payment * $vi->percentage)/100, 2);
                    }
                }
                $data[$item->id]['total'] = round($item->total_payment + $data[$item->id]['interes'],2);
                return $data;
            });
            $Liquidation[$i] = $datos[0];
            //$Liquidation[$i] = Liquidation::with(['establishment'])->where('id',$checkLiquidacion[$i])->get();
        }
        return response()->json(['Liquidation' => $Liquidation,'estado' => 'ok']);

    }

    public function getLiquidationdetalle(Request $r){
        //$Liquidation = Liquidation::find($request->establishment_id_2);
        $Liquidation = Liquidation::with(['establishment'])->where('id',$r->liquidacion_id)->get();
        $DatosLiquidacion = $Liquidation->map(function ($liq) {
            $valorinteres = Interes::all();
            $data[$liq->id]['id'] = $liq->id;
            $data[$liq->id]['liquidation_number'] = $liq->liquidation_number;
            $data[$liq->id]['liquidation_code'] = $liq->liquidation_code;
            $data[$liq->id]['total_payment'] = $liq->total_payment;
            $data[$liq->id]['status'] = $liq->status;
            $data[$liq->id]['fecha'] = $liq->created_at;
            $data[$liq->id]['year'] = $liq->year;
            $data[$liq->id]['propietario'] = $liq->establishment->people_entities_owner->name.' '.$liq->establishment->people_entities_owner->last_name;
            $data[$liq->id]['representante'] = $liq->establishment->people_entities_legal_representative->name.' '.$liq->establishment->people_entities_legal_representative->last_name;
            $data[$liq->id]['establisment_name'] = $liq->establishment->name;
            $data[$liq->id]['cc_ruc'] = $liq->establishment->people_entities_establishment->cc_ruc;
            $data[$liq->id]['descuento'] = round(0,2);
            $data[$liq->id]['recargo'] = round(0,2);
            foreach($valorinteres as $vi){
                if($vi->year == $data[$liq->id]['year']){
                    $data[$liq->id]['interes'] = round(($liq->total_payment * $vi->percentage)/100, 2);
                }
            }
            $data[$liq->id]['total'] = round($liq->total_payment + $data[$liq->id]['interes'],2);
            $data[$liq->id]['liquidation_rubro'] = $liq->liquidations_rubros;
            return $data;
        });
        return response()->json(['estado' => 'ok','Liquidation'=>$DatosLiquidacion]);

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
