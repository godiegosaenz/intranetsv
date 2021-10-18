<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstablishmentClassification;

class EstablishmentClassificationController extends Controller
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
    public function show($id, Request $request)
    {
        $cookie_Classification = $request->cookie('establishment_classification_id');
        $EstablishmentClassificationData = EstablishmentClassification::where('tourist_activity_id',$id)->get();
        $EstablishmentClassificationDataOption = '<option value="">Seleccione Clasificacion</option>';
        foreach($EstablishmentClassificationData as $Classificacion){
            if($cookie_Classification != null){
                if($cookie_Classification == $Classificacion->id){
                    $EstablishmentClassificationDataOption .= '<option value="'.$Classificacion->id.'" selected>'.$Classificacion->name.'</option>';
                }else{
                    $EstablishmentClassificationDataOption .= '<option value="'.$Classificacion->id.'">'.$Classificacion->name.'</option>';
                }
            }else{
                $EstablishmentClassificationDataOption .= '<option value="'.$Classificacion->id.'">'.$Classificacion->name.'</option>';
            }

        }
        return $EstablishmentClassificationDataOption;
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
