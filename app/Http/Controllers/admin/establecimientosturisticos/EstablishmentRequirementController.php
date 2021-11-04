<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstablishmentRequirement;
use App\Models\Establishments;

class EstablishmentRequirementController extends Controller
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
        request()->validate([
            'InputFile'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
          ]);

        if($request->file('InputFile')){
            $file = $request->file('InputFile')->store('public/documents');
            $EstablishmentRequirement = EstablishmentRequirement::where('requirement_id',$request->requirement_id)
                                                                ->where('establishment_id',$request->establishment_id)
                                                                ->update(['upload'=> true, 'file_path' => $file]);
            //$EstablishmentRequirement->file_path = $file->file_path;
            return Response()->json([
                "success" => true,
                "file" => $file
            ]);
        }

        return Response()->json([
            "success" => false,
            "file" => ''
        ]);

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

    public function datatables(Request $request, $id = null){
        //$PersonEntityData = PersonEntity::all();
        $requirementEstablishment = Establishments::find($id)->requirements;
        return Datatables($requirementEstablishment)
                ->addColumn('status',function($requirementEstablishment){
                    $respuesta = '';
                    if($requirementEstablishment->pivot->upload == true){
                        $respuesta = '<span class="badge bg-success">Completado</span>';
                    }else{
                        $respuesta = '<span class="badge bg-danger">Pendiente</span>';
                    }

                    return $respuesta;
                })

                ->addColumn('action', function ($requirementEstablishment) {
                    $buttons = '<button type="button" id="btnModal'.$requirementEstablishment->id.'" class="btn btn-primary" onclick="viewmodal'.$requirementEstablishment->id.'()"><i class="fas fa-paperclip"></i></button>';
                    $buttons .= '<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
                    if($requirementEstablishment->pivot->upload == true){
                        $buttons .= '<a href="'.$requirementEstablishment->file_path.'" class="btn btn-secondary"><i class="fas fa-info"></i></a>';
                    }
                    return $buttons;
                })
                ->rawColumns(['status','action'])
                ->make(true);
    }
}
