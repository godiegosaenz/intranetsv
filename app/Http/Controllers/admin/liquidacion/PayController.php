<?php

namespace App\Http\Controllers\admin\liquidacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Liquidation;
use App\Models\Interes;
use App\Models\Pay;
use App\Models\PayRubro;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PayController extends Controller
{
    //
    public function index(){
        return view('liquidation.pay');
    }

    public function store(Request $r){
        DB::beginTransaction();
        try {
        $checkLiquidacion = $r->checkLiquidacion;
        $respuesta = array();
        for($i=0;$i<count($checkLiquidacion);$i++){
            $liq = Liquidation::with(['establishment','liquidations_rubros'])->where('id',$checkLiquidacion[$i])->get();
            $datos = $liq->map(function($item,$key){
                $Pay = new Pay();
                $valorinteres = Interes::all();
                $Pay->payment_day = Carbon::now()->format('Y-m-d');
                $Pay->status = true;
                $Pay->user = Auth()->user()->email;
                $Pay->value = round($item->total_payment + $Pay->interest,2);
                $Pay->discount = round(0,2);
                $Pay->surcharge = round(0,2);
                foreach($valorinteres as $vi){
                    if($vi->year == $item->year){
                        $Pay->interest = round(($item->total_payment * $vi->percentage)/100, 2);
                    }
                }
                $Pay->observation = '';
                $Pay->name_person = $item->establishment->people_entities_owner->name.' '.$item->establishment->people_entities_owner->last_name;
                $Pay->voucher_number = $item->id;
                $Pay->personentity_id = $item->establishment->people_entities_owner->id;
                $Pay->liquidation_id = $item->id;
                $Pay->save();
                foreach($item->liquidations_rubros as $lr){
                    $PayRubro = new PayRubro();
                    $PayRubro->rubro_id = $lr->pivot->rubro_id;
                    $PayRubro->pay_id = $Pay->id;
                    $PayRubro->value = $lr->pivot->value;
                    $PayRubro->save();
                }
                $affected = DB::table('liquidations')
                ->where('id', $item->id)
                ->update(['status' => 1]);

                return $Pay->id;
            });
        }
        $respuesta['estado'] = 'ok';
        $respuesta['datos'] = $datos;
        $respuesta['enlace'] = route("pay.voucher",$datos[0]);
        DB::commit();
        return response()->json($respuesta);

        } catch (\Exception $e) {
            DB::rollback();
            $datos['estado'] = 'error';
            //$datos['message'] = $e->getMessage();
          return response()->json($datos);
        }

    }

    public function voucher($id){
        $Pay = Pay::find($id);
        $data = [
            'title' => 'Comprobante de pago',
            'date' => date('m/d/Y'),
            'Pay' => $Pay
        ];

        $pdf = PDF::loadView('reports.comprobantePago', $data);

        return $pdf->download('comprobante-'.$id.'.pdf');
    }
}
