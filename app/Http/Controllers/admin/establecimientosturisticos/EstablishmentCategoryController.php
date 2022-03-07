<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstablishmentCategory;
use App\Models\EstablishmentClassification;
use App\Models\ClassificationCategory;

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
        //se obtiene las categorias que tienen el id classificacion, se valida en la tabla classificationcategory
        $EstablishmentCategoryDataOption = '<option value="">Seleccione Categoria</option>';
        $classificationcategory = ClassificationCategory::select('category_id')->where('classification_id',$id)->get()->toArray();
        $EstablishmentCategoryData = EstablishmentCategory::whereIn('id',$classificationcategory)->get();
        if(isset($EstablishmentCategoryData)){
            foreach($EstablishmentCategoryData as $Category){
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
