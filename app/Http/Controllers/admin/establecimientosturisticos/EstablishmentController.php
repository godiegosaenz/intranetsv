<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\PersonEntity;
use App\Http\Requests\StoreEstablishmentRequest;
use App\models\TouristActivity;
use App\models\Establishments;
use App\models\EstablishmentClassification;
use App\models\Country;
use App\models\EstablishmentCategory;
use App\Models\Requirement;
use App\Models\EstablishmentRequirement;

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
    public function create(Request $request,$id = null)
    {
        $PersonEntityData = new PersonEntity();
        $establishmentData = new Establishments();
        $touristActivity = TouristActivity::all();
        $establishmentClassification = new EstablishmentClassification();
        $establishmentCategory = new EstablishmentCategory();
        $register = 'no';
        $requirementEstablishment = '';

        if($id != null){
            $register = 'yes';
            $establishmentData = Establishments::with(['tourist_activities','establishments_classifications','people_entities_establishment','people_entities_owner','people_entities_legal_representative'])->where('id', $id)->first();
            $establishmentClassification = EstablishmentClassification::where('tourist_activity_id',$establishmentData->tourist_activity_id)->get();
            $establishmentCategory = EstablishmentClassification::find($establishmentData->classification_id)->establishments_categories;
            $requirementEstablishment = Establishments::find($establishmentData->id)->requirements;
        }

        return view('tourism.establishmentCreate', compact('establishmentData','touristActivity','establishmentClassification','PersonEntityData','establishmentCategory','register','requirementEstablishment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreEstablishmentRequest $request)
    {
        $establishmentData = new Establishments();
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
        $establishmentData->status = true;
        $establishmentData->has_requeriment = false;
        if($request->has_sewer != null){
            $establishmentData->has_sewer = true;
        }else{
            $establishmentData->has_sewer = false;
        }
        if($request->has_sewage_treatment_system != null){
            $establishmentData->has_sewage_treatment_system = true;
        }else{
            $establishmentData->has_sewage_treatment_system = false;
        }

        if($request->has_sewage_treatment_system != null){
            $establishmentData->has_septic_tank = true;
        }else{
            $establishmentData->has_septic_tank = false;
        }
        if($request->is_patrimonial != null){
            $establishmentData->is_patrimonial = true;
        }else{
            $establishmentData->is_patrimonial = false;
        }

        $establishmentData->owner_id = $request->owner_id;
        $establishmentData->legal_representative_id = $request->legal_representative_id;
        if($request->selectedValue == 'm'){
            $establishmentData->is_main = true;
            $establishmentData->is_branch = false;
        }else{
            $establishmentData->is_branch = true;
            $establishmentData->is_main = false;
        }
        $establishmentData->establishment_id = $request->establishment_id;
        $establishmentData->username = auth()->user()->email;
        $establishmentData->save();

        $requirementTouristActivity = TouristActivity::find($establishmentData->tourist_activity_id)->requirements;
        if(isset($requirementTouristActivity)){
            foreach ($requirementTouristActivity as $rta){
                $requerimentsEstablishment = EstablishmentRequirement::create([
                    'requirement_id' => $rta->id,
                    'establishment_id' => $establishmentData->id
                ]);
            }
        }


        $respuesta = ["saved" => "ok", "id" => $establishmentData->id];

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

    public function datatables(){
        $Establishments = Establishments::with(['tourist_activities','establishments_classifications','people_entities_establishment','people_entities_owner','people_entities_legal_representative','requirements'])->get();
        return Datatables($Establishments)
                ->editColumn('status', function ($Establishments) {
                    if($Establishments->status == true){
                        return '<span class="badge bg-success">Activo</span>';
                    }else{
                        return '<span class="badge bg-success">Inactivo</span>';
                    }
                })
                ->addColumn('tourist_activity', function ($Establishments) {
                    return $Establishments->tourist_activities->name;
                })
                ->addColumn('classification', function ($Establishments) {
                    return $Establishments->establishments_classifications->name;
                })
                ->addColumn('category', function ($Establishments) {
                    $establishmentCategory = EstablishmentCategory::find($Establishments->classification_id);
                    return $establishmentCategory->name;
                })
                ->addColumn('action', function ($Establishments) {
                    //$id = $PersonEntityDataTemp->get('id');
                    $buttons = '<a onclick="" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i></a>';
                    return $buttons;
                })
                ->rawColumns(['status','action'])
                ->make(true);
    }

    public function datatablesPersonas(Request $request){
        if ($request->ajax()) {
            //$peopleEntitiesdata = PersonEntity::find(auth()->user()->id);

            $PersonEntityDataTemp = PersonEntity::where('status','1')->get();


            return Datatables($PersonEntityDataTemp)
                    ->addColumn('action', function ($PersonEntityDataTemp) {
                        //$id = $PersonEntityDataTemp->get('id');
                        $buttons = '<a onclick="selectedPersonEntity('.$PersonEntityDataTemp->id.')" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i></a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }
}
