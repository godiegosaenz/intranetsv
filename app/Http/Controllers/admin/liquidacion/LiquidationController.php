<?php

namespace App\Http\Controllers\admin\liquidacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Liquidation;
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
}
