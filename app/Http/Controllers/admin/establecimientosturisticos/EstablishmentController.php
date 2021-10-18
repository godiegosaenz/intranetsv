<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\PersonEntity;
use App\Http\Requests\StoreEstablishmentRequest;
use App\models\touristActivity;
use App\models\Estableshments;
use Illuminate\Support\Arr;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tourism.establishment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PersonEntityData = new PersonEntity();
        $touristActivity = touristActivity::all();

        return view('tourism.establishmentCreate', compact('PersonEntityData','touristActivity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreEstablishmentRequest $request)
    {
        $establishmentData = new Estableshments();
        $establishmentData->name = $request->name;
        $establishmentData->start_date = $request->start_date;
        $establishmentData->registry_number = $request->registry_number;
        $establishmentData->cadastral_registry = $request->cadastral_registry;
        $establishmentData->organization_type= $request->organization_type;
        $establishmentData->local= $request->local;
        $establishmentData->web_page= $request->web_page;
        $establishmentData->email= $request->email;
        $establishmentData->phone= $request->phone;
        $establishmentData->tourist_activity_id= $request->tourist_activity_id;
        $establishmentData->classification_id= $request->classification_id;
        $establishmentData->category_id= $request->category_id;
        //no validados
        $establishmentData->status = "2";
        $establishmentData->has_sewer = $request->has_sewer;
        $establishmentData->has_sewage_treatment_system = $request->has_sewage_treatment_system;
        $establishmentData->has_septic_tank = $request->has_septic_Tank;
        $establishmentData->is_patrimonial = $request->is_patrimonial;
        $establishmentData->username = auth()->user()->email;

        $respuesta = ["status" => "200"];

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
