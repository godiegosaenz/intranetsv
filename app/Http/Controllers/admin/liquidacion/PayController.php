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
use Illuminate\Support\Facades\Validator;
use PDF;

class PayController extends Controller
{
    //
    public function index(){
        return view('liquidation.pay');
    }

    public function store(Request $r){
        $respuesta = array();
        $attributes = [
            'value' => 'Valor a cobrar',
        ];
        $validator = Validator::make($r->all(), [
            'value' => 'required'
        ],[],$attributes);

        if ($validator->fails()) {
            $respuesta['estado'] = 'validacion';
            $respuesta['validator'] = $validator->errors();
            return $respuesta;
        }

        DB::beginTransaction();
        try {
        $checkLiquidacion = $r->checkLiquidacion;
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

    public function datatables(Request $request){
        if ($request->ajax()) {
            //$peopleEntitiesdata = PersonEntity::find(auth()->user()->id);

            $Pay = Pay::all();


            return Datatables($Pay)
                    ->editColumn('user', function($Pay){
                        return $Pay->UserName;
                    })
                    ->addColumn('year', function($Pay){
                        return $Pay->liquidation->year;
                    })
                    ->addColumn('liquidation_code', function($Pay){
                        return $Pay->liquidation->liquidation_code;
                    })
                    ->addColumn('establecimiento_name', function($Pay){
                        return $Pay->liquidation->establishment->name;
                    })
                    ->addColumn('propietario', function($Pay){
                        return $Pay->liquidation->establishment->people_entities_owner->name.' '.$Pay->liquidation->establishment->people_entities_owner->last_name;
                    })
                    ->addColumn('imprimir', function ($Pay) {
                        $buttons = '';
                        $buttons .= '<a href="'.route("pay.voucher",$Pay->id).'" class="btn btn-secondary btn-sm"><i class="far fa-file-pdf"></i></a>';

                        return $buttons;
                    })
                    ->editColumn('status', function ($Pay) {
                        $buttons = '';
                        if($Pay->status== 1){
                            $buttons .= '<span class="float-right badge bg-success">PROCESADO</span>';
                        }else{
                            $buttons .= '<span class="float-right badge bg-danger">ANULADO</span>';
                        }

                        return $buttons;
                    })
                    ->addColumn('action', function ($Pay) {
                        $buttons = '';
                        $buttons .= '<a onclick="selectDetalle('.$Pay->id.')" class="btn btn-primary btn-sm" ><i class="fas fa-folder"></i></a>';

                        return $buttons;
                    })
                    ->rawColumns(['status','imprimir','action'])
                    ->make(true);
        }
    }

    public function getPaymentDetail(Request $r){
        //$Liquidation = Liquidation::find($request->establishment_id_2);
        $Pay = Pay::with(['liquidation'])->where('id',$r->pay_id)->get();
        $DatosPago = $Pay->map(function ($liq) {
            $data[$liq->id]['liquidation_number'] = $liq->liquidation->liquidation_number;
            $data[$liq->id]['liquidation_code'] = $liq->liquidation->liquidation_code;
            $data[$liq->id]['total_payment'] = $liq->liquidation->total_payment;
            $data[$liq->id]['status'] = $liq->liquidation->status;
            $data[$liq->id]['fecha'] = $liq->liquidation->created_at;
            $data[$liq->id]['year'] = $liq->liquidation->year;
            $data[$liq->id]['propietario'] = $liq->liquidation->establishment->people_entities_owner->name.' '.$liq->liquidation->establishment->people_entities_owner->last_name;
            $data[$liq->id]['representante'] = $liq->liquidation->establishment->people_entities_legal_representative->name.' '.$liq->liquidation->establishment->people_entities_legal_representative->last_name;
            $data[$liq->id]['establisment_name'] = $liq->liquidation->establishment->name;
            $data[$liq->id]['cc_ruc'] = $liq->liquidation->establishment->people_entities_establishment->cc_ruc;
            //datos de pagos
            $data[$liq->id]['id'] = $liq->id;
            $data[$liq->id]['payment_day'] = $liq->payment_day;
            if($liq->status == 1){
                $data[$liq->id]['statusPay'] = 'Procesado';
            }else{
                $data[$liq->id]['statusPay'] = 'Anulado';
            }
            $data[$liq->id]['user'] = $liq->user;
            $data[$liq->id]['value'] = $liq->value;
            $data[$liq->id]['discount'] = $liq->discount;
            $data[$liq->id]['surcharge'] = $liq->surcharge;
            $data[$liq->id]['interest'] = $liq->interest;
            $data[$liq->id]['observation'] = $liq->observation;
            $data[$liq->id]['name_person'] = $liq->name_person;
            $data[$liq->id]['voucher_number'] = $liq->voucher_number;
            $data[$liq->id]['personentity_id'] = $liq->personentity_id;
            $data[$liq->id]['liquidation_id'] = $liq->liquidation_id;

            return $data;
        });
        return response()->json(['estado' => 'ok','pay'=>$DatosPago]);
    }

    public function cancel(Request $r){
        //estado de un pago
        //1 pagado
        //0 anulado
        $Pay = Pay::find($r->pay_id);
        $Pay->status = 2;
        $Pay->save();
        $Liquidation = Liquidation::find($Pay->liquidation_id);
        $Liquidation->status = 2;
        $Liquidation->save();
        $data = array('estado' => 'ok','message' => '¡Informacion!. Pago fue anulado con exito.');
        return response()->json($data);
    }
}
