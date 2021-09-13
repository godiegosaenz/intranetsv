<?php

namespace App\Http\Controllers\admin\configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canton;

class CantonController extends Controller
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
        $cookie_canton = $request->cookie('canton_id');
        $CantonData = Canton::where('province_id',$id)->get();
        $CantonOption = '<option value="">Seleccione Canton</option>';
        foreach($CantonData as $Canton){
            if($cookie_canton != null){
                if($cookie_canton == $Canton->id){
                    $CantonOption .= '<option value="'.$Canton->id.'" selected>'.$Canton->name.'</option>';
                }else{
                    $CantonOption .= '<option value="'.$Canton->id.'">'.$Canton->name.'</option>';
                }
            }else{
                $CantonOption .= '<option value="'.$Canton->id.'">'.$Canton->name.'</option>';
            }

        }
        return $CantonOption;
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
