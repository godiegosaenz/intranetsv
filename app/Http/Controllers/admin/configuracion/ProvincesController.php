<?php

namespace App\Http\Controllers\admin\configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Support\Facades\Cookie;

class ProvincesController extends Controller
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
    public function show($id)
    {
        $cookie_province = Cookie::get('province_id');//Cookie::get('province_id');
        $ProvinceData = Province::where('country_id',$id)->get();
        $ProvinceOption = '<option value="">Seleccione Provincia</option>';
        foreach($ProvinceData as $Province){
            if($cookie_province != null){
                if($cookie_province == $Province->id){
                    $ProvinceOption .= '<option value="'.$Province->id.'" selected>'.$Province->name.'</option>';
                }else{
                    $ProvinceOption .= '<option value="'.$Province->id.'">'.$Province->name.'</option>';
                }
            }else{
                $ProvinceOption .= '<option value="'.$Province->id.'">'.$Province->name.'</option>';
            }
        }
        return $ProvinceOption;
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
