<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstableshmentServices;
use App\Models\Establishments;
use Illuminate\Support\Facades\Validator;

class EstablismentServicesController extends Controller
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
    public function store(Request $request,$id)
    {
        $attributes = [
            'services_type' => 'Tipo de Servicio',
            'services_total_beds' => 'Total de mesas',
            'services_total_plazas' => 'Total de plazas',
            'service_id' => 'Servicio',
        ];
        $validator = Validator::make($request->all(), [
            'services_type' => 'required',
            'services_total_beds' => '',
            'services_total_plazas' => '',
            'service_id' => 'required',
        ],[],$attributes);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with(['tabEstablishment' => 2,'step' => 3]);
        }

        $EstableshmentServices = new EstableshmentServices();
        $EstableshmentServices->services_type = $request->services_type;
        if($request->services_total_beds != null){
            $EstableshmentServices->services_total_beds = $request->services_total_beds;
        }else{
            $EstableshmentServices->services_total_beds = 0;

        }
        if($request->services_total_plazas != null){
            $EstableshmentServices->services_total_plazas = $request->services_total_plazas;
        }else{
            $EstableshmentServices->services_total_plazas = 0;

        }
        $EstableshmentServices->service_id = $request->service_id;
        $EstableshmentServices->establishment_id = $id;
        $EstableshmentServices->save();

        return redirect()->route('establishments.create',['id' => $id])->with(['status' => 'Se agregó el servicio al establecimiento.', 'tabEstablishment' => 2,'step' => 3]);

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
        $EstableshmentServices = EstableshmentServices::find($id);
        $EstableshmentServices->delete();
        return back()->with(['status' => 'Se eliminó satisfactoriamente el servicio del establecimiento.', 'tabEstablishment' => 2,'step' => 3]);
    }
}
