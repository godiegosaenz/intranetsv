<?php

namespace App\Http\Controllers\admin\configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parish;

class ParishController extends Controller
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
    public function show(Request $request)
    {
        $id = $request->canton_id;
        $cookie_parish = $request->cookie('parish_id');
        $ParishData = Parish::where('canton_id',$id)->get();
        $ParishOption = '<option value="">Seleccione Parroquia</option>';
        foreach($ParishData as $Parish){
            if($cookie_parish != null){
                if($cookie_parish == $Parish->id){
                    $ParishOption .= '<option value="'.$Parish->id.'" selected>'.$Parish->name.' - '.$Parish->type.'</option>';
                }else{
                    $ParishOption .= '<option value="'.$Parish->id.'">'.$Parish->name.' - '.$Parish->type.'</option>';
                }
            }
            $ParishOption .= '<option value="'.$Parish->id.'">'.$Parish->name.' - '.$Parish->type.'</option>';
        }
        return $ParishOption;
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
