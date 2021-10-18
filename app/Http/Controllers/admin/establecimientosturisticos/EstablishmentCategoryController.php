<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstablishmentCategory;
use App\Models\EstablishmentClassification;

class EstablishmentCategoryController extends Controller
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
        $cookie_Category = $request->cookie('establishment_category_id');
        $EstablishmentCategoryData = EstablishmentClassification::find($id)->establishments_categories()->orderBy('id')->get();
        $EstablishmentCategoryDataOption = '<option value="">Seleccione Categoria</option>';
        foreach($EstablishmentCategoryData as $Category){
            if($cookie_Category != null){
                if($cookie_Category == $Category->id){
                    $EstablishmentCategoryDataOption .= '<option value="'.$Category->id.'" selected>'.$Category->name.'</option>';
                }else{
                    $EstablishmentCategoryDataOption .= '<option value="'.$Category->id.'">'.$Category->name.'</option>';
                }
            }else{
                $EstablishmentCategoryDataOption .= '<option value="'.$Category->id.'">'.$Category->name.'</option>';
            }

        }
        return $EstablishmentCategoryDataOption;
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
