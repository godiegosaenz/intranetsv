<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\PersonEntity;
use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Requests\UpdateEstablishmentRequest;
use App\models\TouristActivity;
use App\models\Establishments;
use App\models\EstablishmentClassification;
use App\models\EstablishmentCategory;
use App\Models\Requirement;
use App\Models\EstablishmentRequirement;
use App\Models\ClassificationCategory;
use Illuminate\Support\Facades\Cookie;
use App\Models\Country;
use App\Models\Province;
use App\Models\Canton;
use App\Models\Parish;
use App\Models\AreaApplication;
use App\Models\TypeRoom;
use App\Models\TravelHotelDetail;
use App\Models\Services;
use Illuminate\Support\Facades\Validator;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Establishments $Establishments)
    {
        $this->authorize('view', $Establishments);
        return view('tourism.establishment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Establishments $Establishments,$id = null)
    {
        $this->authorize('create', $Establishments);
        $PersonEntityData = new PersonEntity();
        $Establishments = new Establishments();
        $touristActivity = TouristActivity::all();
        $establishmentClassification = new EstablishmentClassification();
        $establishmentCategory = new EstablishmentCategory();
        $register = 'no';
        $requirementEstablishment = '';
        $CountryData = Country::all();
        $ProvinceData = new Province();
        $CantonData = new Canton();
        $ParishData = new Parish();
        $AreaApplication = AreaApplication::all();
        $TypeRoom = TypeRoom::all();
        $Services = Services::all();
        if($id != null){
            $register = 'yes';
            $Establishments = Establishments::with(['tourist_activities','establishments_classifications','people_entities_establishment','people_entities_owner','people_entities_legal_representative','establishment_services','rooms_hotels','establishments_categories'])->where('id', $id)->first();
            //$Establishments = Establishments::find($id);
            $establishmentClassification = EstablishmentClassification::where('tourist_activity_id',$Establishments->tourist_activity_id)->get();
            $requirementEstablishment = Establishments::find($Establishments->id)->requirements;
            $classificationcategory = ClassificationCategory::select('category_id')->where('classification_id',$Establishments->classification_id)->get()->toArray();
            $establishmentCategory = EstablishmentCategory::whereIn('id',$classificationcategory)->get();
            $ProvinceData = Province::where('country_id',$Establishments->country_id)->get();
            $CantonData = Canton::where('province_id',$Establishments->province_id)->get();
            $ParishData = Parish::where('canton_id',$Establishments->canton_id)->get();
        }else{
            if(Cookie::get('tourist_activity_id') !== null){
                $establishmentClassification = EstablishmentClassification::where('tourist_activity_id',Cookie::get('tourist_activity_id'))->get();
            }
            if(Cookie::get('classification_id') !== null){
                //$establishmentCategory = EstablishmentCategory::with('establishments_classifications')->find(Cookie::get('classification_id'));
                //dd($establishmentCategory);
                $classificationcategory = ClassificationCategory::select('category_id')->where('classification_id',Cookie::get('classification_id'))->get()->toArray();
                $establishmentCategory = EstablishmentCategory::whereIn('id',$classificationcategory)->get();
            }

            if(Cookie::get('country_id') != null){
                $ProvinceData = Province::where('country_id',Cookie::get('country_id'))->get();
            }
            if(Cookie::get('province_id') != null){
                $CantonData = Canton::where('province_id',Cookie::get('province_id'))->get();
            }
            if(Cookie::get('canton_id') != null){
                $ParishData = Parish::where('canton_id',Cookie::get('canton_id'))->get();
            }

        }

        Cookie::queue('country_id', '');
        Cookie::queue('province_id', '');
        Cookie::queue('canton_id', '');
        Cookie::queue('parish_id', '');


        Cookie::queue('step', '');
        Cookie::queue('tourist_activity_id', '');
        Cookie::queue('classification_id', '');
        Cookie::queue('category_id', '');

        return view('tourism.establishmentCreate2', compact('Establishments','touristActivity','establishmentClassification','PersonEntityData','establishmentCategory','register','requirementEstablishment','CountryData','ProvinceData','CantonData','ParishData','AreaApplication','TypeRoom','Services'));
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
        //step 1
        if($request->owner_id_2 != null){
            $establishmentData->owner_id = $request->owner_id_2;
        }

        if($request->legal_representative_id_2 != null){
            $establishmentData->legal_representative_id = $request->legal_representative_id_2;
        }
        $establishmentData->establishment_id = $request->establishment_id_2;
        //step 2
        $establishmentData->name = $request->name;
        $establishmentData->establishment_type= $request->establishment_type;
        $establishmentData->local= $request->local;
        if($request->registry_number != null){
            $establishmentData->registry_number = $request->registry_number;
        }
        if($request->cadastral_registry != null){
            $establishmentData->cadastral_registry = $request->cadastral_registry;
        }
        $establishmentData->status= $request->status;
        $establishmentData->start_date = $request->start_date;
        if($request->franchise_chain != null){
            $establishmentData->franchise_chain= $request->franchise_chain;
        }
        $establishmentData->email= $request->email;
        if($request->web_page != null){
            $establishmentData->web_page= $request->web_page;
        }
        $establishmentData->phone= $request->phone;
        $establishmentData->observation= $request->observation;

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

        if($request->has_septic_tank != null){
            $establishmentData->has_septic_tank = true;
        }else{
            $establishmentData->has_septic_tank = false;
        }
        if($request->is_patrimonial != null){
            $establishmentData->is_patrimonial = true;
        }else{
            $establishmentData->is_patrimonial = false;
        }
        //step 3
        $establishmentData->country_id = $request->country_id;
        $establishmentData->province_id = $request->province_id;
        $establishmentData->canton_id = $request->canton_id;
        $establishmentData->parish_id = $request->parish_id;
        $establishmentData->main_street = $request->main_street;

        if($request->number_establishment != null){
            $establishmentData->number_establishment = $request->number_establishment;
        }
        if($request->secondary_street != null){
            $establishmentData->secondary_street = $request->secondary_street;
        }

        $establishmentData->location_reference = $request->location_reference;
        //step 4
        $establishmentData->total_number_male_employees = $request->total_number_male_employees;
        $establishmentData->total_number_male_manager = $request->total_number_male_manager;
        $establishmentData->total_number_administrative_men = $request->total_number_administrative_men;
        $establishmentData->total_number_male_receptionists = $request->total_number_male_receptionists;
        $establishmentData->total_number_male_rooms = $request->total_number_male_rooms;
        $establishmentData->total_number_male_restaurant = $request->total_number_male_restaurant;
        $establishmentData->total_number_male_bars = $request->total_number_male_bars;
        $establishmentData->total_number_male_cook = $request->total_number_male_cook;
        $establishmentData->total_number_male_concierge = $request->total_number_male_concierge;
        $establishmentData->total_number_male_other = $request->total_number_male_other;

        $establishmentData->total_number_female_employees = $request->total_number_female_employees;
        $establishmentData->total_number_female_manager = $request->total_number_female_manager;
        $establishmentData->total_number_administrative_woman = $request->total_number_administrative_woman;
        $establishmentData->total_number_female_receptionists = $request->total_number_female_receptionists;
        $establishmentData->total_number_female_rooms = $request->total_number_female_rooms;
        $establishmentData->total_number_female_restaurant = $request->total_number_female_restaurant;
        $establishmentData->total_number_female_bars = $request->total_number_female_bars;
        $establishmentData->total_number_female_cook = $request->total_number_female_cook;
        $establishmentData->total_number_female_concierge = $request->total_number_female_concierge;
        $establishmentData->total_number_female_other = $request->total_number_female_other;

        $establishmentData->username = auth()->user()->email;
        $establishmentData->register = '1';
        $establishmentData->save();

        Cookie::queue('tab', 1);

        return redirect()->route('establishments.edit',['id' => $establishmentData->id])->with(['register' => $establishmentData->register,'status' => 'El registro fue exitoso']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Establishments $Establishment)
    {
        return view('tourism.establishmentShow',compact('Establishment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Establishments $Establishments,$id)
    {
        $this->authorize('edit', $Establishments);
        $PersonEntityData = new PersonEntity();
        $Establishments = new Establishments();
        $touristActivity = TouristActivity::all();
        $establishmentClassification = new EstablishmentClassification();
        $establishmentCategory = new EstablishmentCategory();
        $register = 'no';
        $requirementEstablishment = '';
        $CountryData = Country::all();
        $ProvinceData = new Province();
        $CantonData = new Canton();
        $ParishData = new Parish();
        $AreaApplication = AreaApplication::all();
        $TypeRoom = TypeRoom::all();
        $Services = Services::all();
        if($id != null){
            $register = 'yes';
            $Establishments = Establishments::with(['tourist_activities','establishments_classifications','people_entities_establishment','people_entities_owner','people_entities_legal_representative','establishment_services','rooms_hotels','establishments_categories'])->where('id', $id)->first();
            //$Establishments = Establishments::find($id);
            $establishmentClassification = EstablishmentClassification::where('tourist_activity_id',$Establishments->tourist_activity_id)->get();
            $requirementEstablishment = Establishments::find($Establishments->id)->requirements;
            $classificationcategory = ClassificationCategory::select('category_id')->where('classification_id',$Establishments->classification_id)->get()->toArray();
            $establishmentCategory = EstablishmentCategory::whereIn('id',$classificationcategory)->get();
            $ProvinceData = Province::where('country_id',$Establishments->country_id)->get();
            $CantonData = Canton::where('province_id',$Establishments->province_id)->get();
            $ParishData = Parish::where('canton_id',$Establishments->canton_id)->get();
        }else{
            if(Cookie::get('tourist_activity_id') !== null){
                $establishmentClassification = EstablishmentClassification::where('tourist_activity_id',Cookie::get('tourist_activity_id'))->get();
            }
            if(Cookie::get('classification_id') !== null){
                //$establishmentCategory = EstablishmentCategory::with('establishments_classifications')->find(Cookie::get('classification_id'));
                //dd($establishmentCategory);
                $classificationcategory = ClassificationCategory::select('category_id')->where('classification_id',Cookie::get('classification_id'))->get()->toArray();
                $establishmentCategory = EstablishmentCategory::whereIn('id',$classificationcategory)->get();

            }
        }

        Cookie::queue('country_id', '');
        Cookie::queue('province_id', '');
        Cookie::queue('canton_id', '');
        Cookie::queue('parish_id', '');


        Cookie::queue('step', '');
        Cookie::queue('tourist_activity_id', '');
        Cookie::queue('classification_id', '');
        Cookie::queue('category_id', '');

        return view('tourism.establishmentCreate2', compact('Establishments','touristActivity','establishmentClassification','PersonEntityData','establishmentCategory','register','requirementEstablishment','CountryData','ProvinceData','CantonData','ParishData','AreaApplication','TypeRoom','Services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstablishmentRequest $request,Establishments $Establishments)
    {
        //step 1
        if($request->owner_id_2 != null){
            $Establishments->owner_id = $request->owner_id_2;
        }

        if($request->legal_representative_id_2 != null){
            $Establishments->legal_representative_id = $request->legal_representative_id_2;
        }
        $Establishments->establishment_id = $request->establishment_id_2;
        //step 2
        $Establishments->name = $request->name;
        $Establishments->establishment_type= $request->establishment_type;
        $Establishments->local= $request->local;
        if($request->registry_number != null){
            $Establishments->registry_number = $request->registry_number;
        }
        if($request->cadastral_registry != null){
            $Establishments->cadastral_registry = $request->cadastral_registry;
        }
        $Establishments->status= $request->status;
        $Establishments->start_date = $request->start_date;
        if($request->franchise_chain != null){
            $Establishments->franchise_chain= $request->franchise_chain;
        }
        $Establishments->email= $request->email;
        if($request->web_page != null){
            $Establishments->web_page= $request->web_page;
        }
        $Establishments->phone= $request->phone;
        $Establishments->observation= $request->observation;

        $Establishments->has_requeriment = false;

        if($request->has_sewer != null){
            $Establishments->has_sewer = true;
        }else{
            $Establishments->has_sewer = false;
        }
        if($request->has_sewage_treatment_system != null){
            $Establishments->has_sewage_treatment_system = true;
        }else{
            $Establishments->has_sewage_treatment_system = false;
        }

        if($request->has_septic_tank != null){
            $Establishments->has_septic_tank = true;
        }else{
            $Establishments->has_septic_tank = false;
        }
        if($request->is_patrimonial != null){
            $Establishments->is_patrimonial = true;
        }else{
            $Establishments->is_patrimonial = false;
        }
        //step 3
        $Establishments->country_id = $request->country_id;
        $Establishments->province_id = $request->province_id;
        $Establishments->canton_id = $request->canton_id;
        $Establishments->parish_id = $request->parish_id;
        $Establishments->main_street = $request->main_street;

        if($request->number_establishment != null){
            $Establishments->number_establishment = $request->number_establishment;
        }
        if($request->secondary_street != null){
            $Establishments->secondary_street = $request->secondary_street;
        }

        $Establishments->location_reference = $request->location_reference;
        //step 4
        $Establishments->total_number_male_employees = $request->total_number_male_employees;
        $Establishments->total_number_male_manager = $request->total_number_male_manager;
        $Establishments->total_number_administrative_men = $request->total_number_administrative_men;
        $Establishments->total_number_male_receptionists = $request->total_number_male_receptionists;
        $Establishments->total_number_male_rooms = $request->total_number_male_rooms;
        $Establishments->total_number_male_restaurant = $request->total_number_male_restaurant;
        $Establishments->total_number_male_bars = $request->total_number_male_bars;
        $Establishments->total_number_male_cook = $request->total_number_male_cook;
        $Establishments->total_number_male_concierge = $request->total_number_male_concierge;
        $Establishments->total_number_male_other = $request->total_number_male_other;

        $Establishments->total_number_female_employees = $request->total_number_female_employees;
        $Establishments->total_number_female_manager = $request->total_number_female_manager;
        $Establishments->total_number_administrative_woman = $request->total_number_administrative_woman;
        $Establishments->total_number_female_receptionists = $request->total_number_female_receptionists;
        $Establishments->total_number_female_rooms = $request->total_number_female_rooms;
        $Establishments->total_number_female_restaurant = $request->total_number_female_restaurant;
        $Establishments->total_number_female_bars = $request->total_number_female_bars;
        $Establishments->total_number_female_cook = $request->total_number_female_cook;
        $Establishments->total_number_female_concierge = $request->total_number_female_concierge;
        $Establishments->total_number_female_other = $request->total_number_female_other;

        $Establishments->username = auth()->user()->email;
        $Establishments->register = '1';
        $Establishments->save();

        Cookie::queue('tab', 1);

        return redirect()->route('establishments.edit',['id' => $Establishments->id])->with(['register' => $Establishments->register,'status' => 'Se actualizo la información de forma satisfactoria']);
    }

    public function updateTab2(Request $request, $id){
        $attributes = [
            'area_applications_id' => 'Ambito de aplicacion',
            'tourist_activity_id' => 'Tipo de actividad',
            'classification_id' => 'Clasificación',
            'category_id' => 'Categoría',
        ];
        $validator = Validator::make($request->all(), [
            'area_applications_id' => 'required',
            'tourist_activity_id' => 'required',
            'classification_id' => 'required',
            'category_id' => 'required',
        ],[],$attributes);

        if ($validator->fails()) {
            //$people_entities_id = $request->people_entities_id;
            return back()->withErrors($validator)->withInput()->with(['tabEstablishment' => 2,'step' => 1]);
        }
        $validated = $validator->validated();
        $Establishments =  Establishments::find($id);
        $Establishments->area_applications_id = $validated['area_applications_id'];
        $Establishments->tourist_activity_id = $validated['tourist_activity_id'];
        $Establishments->classification_id = $validated['classification_id'];
        $Establishments->category_id = $validated['category_id'];
        $Establishments->save();
        return redirect()->route('establishments.edit',['id' => $Establishments->id])->with(['register' => $Establishments->register,'status' => 'Se actualizaron los datos correctamente', 'tabEstablishment' => 2,'step' => 1]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establishments $Establishments,$id)
    {

    }

    public function datatables(){
        $Establishments = Establishments::with(['tourist_activities','establishments_classifications','people_entities_establishment','people_entities_owner','people_entities_legal_representative','requirements','establishments_categories','Countries','provinces','cantons','parishes','establishments_categories','rooms_hotels','establishment_services'])->where('status',1)->get();
        //$Establishments = Establishments::all();
        return Datatables($Establishments)
                ->editColumn('status', function ($Establishments) {
                    if($Establishments->status == 1){
                        return '<span class="badge bg-success">Abierto</span>';
                    }else{
                        return '<span class="badge bg-danger">Cerrado</span>';
                    }
                })
                /*->editColumn('has_requeriment', function ($Establishments) {
                    if($Establishments->has_requeriment == true){
                        return '<span class="badge bg-success">Completos</span>';
                    }else{
                        return '<span class="badge bg-danger">Pendientes</span>';
                    }
                })*/
                ->addColumn('country', function ($Establishments) {
                    return $Establishments->countries->name;
                })
                ->addColumn('province', function ($Establishments) {
                    return $Establishments->provinces->name;
                })
                ->addColumn('canton', function ($Establishments) {
                    return $Establishments->cantons->name;
                })
                ->addColumn('parish', function ($Establishments) {
                    return $Establishments->parishes->name;
                })
                ->addColumn('EstablishmentTypeName', function ($Establishments) {
                    return $Establishments->EstablishmentTypeName;
                })
                ->addColumn('LocalName', function ($Establishments) {
                    return $Establishments->LocalName;
                })
                ->addColumn('tourist_activity', function ($Establishments) {
                    return $Establishments->tourist_activities->name;
                })
                ->addColumn('classification', function ($Establishments) {
                    return $Establishments->establishments_classifications->name;
                })
                ->addColumn('category', function ($Establishments) {
                    return $Establishments->establishments_categories->name;
                })
                ->addColumn('action', function ($Establishments) {

                    $buttons = '';
                    $buttons .= '<a href="'.route('establishments.show',$Establishments).'" class="btn btn-success btn-sm"><i class="far fa-eye"></i> Ver</a> ';
                    $buttons .= '<a href="'.route('establishments.edit',$Establishments).'" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i> Editar</a>';
                    return $buttons;
                })
                ->rawColumns(['status','has_requeriment','action'])
                ->make(true);
    }

    public function datatablescerrados(){
        $Establishments = Establishments::with(['people_entities_establishment','people_entities_owner','people_entities_legal_representative','requirements','establishments_categories','Countries','provinces','cantons','parishes','rooms_hotels','establishment_services'])->where('status',1)->get();
        //$Establishments = Establishments::all();
        return Datatables($Establishments)
                ->editColumn('status', function ($Establishments) {
                    if($Establishments->status == 1){
                        return '<span class="badge bg-success">Abierto</span>';
                    }else{
                        return '<span class="badge bg-danger">Cerrado</span>';
                    }
                })
                /*->editColumn('has_requeriment', function ($Establishments) {
                    if($Establishments->has_requeriment == true){
                        return '<span class="badge bg-success">Completos</span>';
                    }else{
                        return '<span class="badge bg-danger">Pendientes</span>';
                    }
                })*/
                ->addColumn('country', function ($Establishments) {
                    return $Establishments->countries->name;
                })
                ->addColumn('province', function ($Establishments) {
                    return $Establishments->provinces->name;
                })
                ->addColumn('canton', function ($Establishments) {
                    return $Establishments->cantons->name;
                })
                ->addColumn('parish', function ($Establishments) {
                    return $Establishments->parishes->name;
                })
                ->addColumn('EstablishmentTypeName', function ($Establishments) {
                    return $Establishments->EstablishmentTypeName;
                })
                ->addColumn('LocalName', function ($Establishments) {
                    return $Establishments->LocalName;
                })
                ->addColumn('tourist_activity', function ($Establishments) {
                    return $Establishments->tourist_activities->name;
                })
                ->addColumn('classification', function ($Establishments) {
                    return $Establishments->establishments_classifications->name;
                })
                ->addColumn('category', function ($Establishments) {
                    return $Establishments->establishments_categories->name;
                })
                ->addColumn('action', function ($Establishments) {

                    $buttons = '';
                    $buttons .= '<a href="'.route('establishments.show',$Establishments).'" class="btn btn-success btn-sm"><i class="far fa-eye"></i> Ver</a> ';
                    $buttons .= '<a href="'.route('establishments.edit',$Establishments).'" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i> Editar</a>';
                    return $buttons;
                })
                ->rawColumns(['status','has_requeriment','action'])
                ->make(true);
    }

    public function datatablesEstablishmentLiquidation(){
        $Establishments = Establishments::with(['people_entities_establishment','people_entities_owner','people_entities_legal_representative','requirements','establishments_categories','Countries','provinces','cantons','parishes','rooms_hotels','establishment_services'])->whereIn('status',[2,3])->get();
        //$Establishments = Establishments::all();
        return Datatables($Establishments)
                ->addColumn('ruc', function ($Establishments) {
                    return $Establishments->people_entities_establishment->cc_ruc;
                })
                ->addColumn('action', function ($Establishments) {

                    $buttons = '';
                    $buttons .= '<a onclick="selectEstablishment('.$Establishments->id.',\''.$Establishments->name.'\','.$Establishments->people_entities_establishment->cc_ruc.',\''.$Establishments->people_entities_owner->name.'\')" class="btn btn-primary btn-sm">Seleccionar</a> ';
                    return $buttons;
                })
                ->rawColumns(['status','has_requeriment','action'])
                ->make(true);
    }

    public function datatablesPersonas(Request $request){
        if ($request->ajax()) {
            //$peopleEntitiesdata = PersonEntity::find(auth()->user()->id);

            $PersonEntityDataTemp = PersonEntity::where('status','1')->get();


            return Datatables($PersonEntityDataTemp)
                    ->addColumn('action', function ($PersonEntityDataTemp) {
                        $buttons = '';
                        $buttons .= '<a onclick="selectedPersonEntity('.$PersonEntityDataTemp->id.')" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i></a>';

                        return $buttons;
                    })
                    ->make(true);
        }

    }
}
