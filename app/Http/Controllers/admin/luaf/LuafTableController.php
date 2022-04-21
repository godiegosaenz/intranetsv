<?php

namespace App\Http\Controllers\admin\luaf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\TouristActivity;
use App\models\LuafTable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use App\models\EstablishmentClassification;
use App\models\EstablishmentCategory;
use App\Models\ClassificationCategory;

class LuafTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $LuafTable = LuafTable::all();
        $touristActivity = TouristActivity::all();
        $establishmentClassification = new EstablishmentClassification();
        $establishmentCategory = new EstablishmentCategory();

        if(session('validacion') == true){
            $establishmentClassification = EstablishmentClassification::where('tourist_activity_id',session('tourist_activity_id'))->get();
            $classificationcategory = ClassificationCategory::select('category_id')->where('classification_id',session('classification_id'))->get()->toArray();
            $establishmentCategory = EstablishmentCategory::whereIn('id',$classificationcategory)->get();
        }
        Cookie::queue('tourist_activity_id', '');
        Cookie::queue('classification_id', '');
        Cookie::queue('category_id', '');

        return view('luaf.luafCreate',compact('touristActivity','LuafTable','establishmentClassification','establishmentCategory'));
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
        $attributes = [
            'tourist_activity_id' => 'Actividad turistica',
            'classification_id' => 'Clasificacion',
            'category_id' => 'Categoria',
            'percentage' => 'Porcentaje',
            'year' => 'Año',
        ];
        $validator = Validator::make($request->all(), [
            'tourist_activity_id' => 'required|numeric',
            'classification_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'percentage' => 'required|numeric',
            'year' => [
                'required',
                'numeric',
                'digits:4',
                function ($attribute, $value, $fail) use($request) {
                    $contador = LuafTable::where([
                                                    ['tourist_activity_id', '=', $request->tourist_activity_id],
                                                    ['classification_id', '=', $request->classification_id],
                                                    ['category_id', '=', $request->category_id],
                                                    ['year', '=', $value],
                                                ])
                                                ->count();
                    if ($contador > 0) {
                        $fail('Ya existe esa combinacion para el año '.$value);
                    }
                },
            ],
        ],[],$attributes);

        if ($validator->fails()) {
            Cookie::queue('tourist_activity_id', $request->tourist_activity_id);
            Cookie::queue('classification_id', $request->classification_id);
            Cookie::queue('category_id', $request->category_id);
            return redirect()->route('luaf.index')
                        ->withErrors($validator)
                        ->withInput()
                        ->with(['err' => 'Error de validacion en uno de los campos',
                                'validacion' => true,
                                'tourist_activity_id' => $request->tourist_activity_id,
                                'classification_id' => $request->classification_id
                            ]);
        }

        $luaf = new LuafTable();
        $luaf->tourist_activity_id = $request->tourist_activity_id;
        $luaf->classification_id = $request->classification_id;
        $luaf->category_id = $request->category_id;
        $luaf->percentage = $request->percentage;
        $luaf->year = $request->year;
        $luaf->observacion = $request->observacion;
        $luaf->save();
        return redirect()->route('luaf.index')->with('status', 'Datos registrados');
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

    public function documentation(){
        return view('luaf.documentation');
    }
}
