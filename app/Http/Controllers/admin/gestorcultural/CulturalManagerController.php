<?php

namespace App\Http\Controllers\admin\gestorcultural;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CulturalManager;
use App\Models\PersonEntity;
use App\Models\ScopeActivity;
use App\Models\TypeActivity;
use Illuminate\Support\Facades\Validator;

class CulturalManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CulturalManager = CulturalManager::with('people_entities','scope_activity','type_activity')->get();
        foreach ($CulturalManager as $person) {
            $person->people_entities->push($person->people_entities->load(['countries']));
            $person->people_entities->push($person->people_entities->load(['provinces']));
            $person->people_entities->push($person->people_entities->load(['cantons']));
            $person->people_entities->push($person->people_entities->load(['parishes']));
        }
        return view('admin/culturalmanager',compact('CulturalManager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id = null)
    {
        if($id != null){
            $PersonEntityData = PersonEntity::with(['Countries','provinces','cantons','parishes'])->where('id', $id)->first();
        }else{
            $PersonEntityData = new PersonEntity();
        }

        $CulturalManager = new CulturalManager();
        $ScopeActivity = ScopeActivity::all();
        $TypeActivity = TypeActivity::all();
        return view('admin/culturalmanagerCreate', compact('CulturalManager','ScopeActivity','TypeActivity','PersonEntityData'));
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
            'name' => 'nombre',
            'status' => 'estado',
            'type_activities_id' => 'Tipo de activadad',
            'scope_activities_id' => 'Ambito de actividad',
            'people_entities_id' => 'Persona/empresa',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
            'type_activities_id' => 'required',
            'scope_activities_id' => 'required',
            'people_entities_id' => 'required|unique:App\Models\CulturalManager,people_entities_id',
        ],[],$attributes);

        if ($validator->fails()) {
            return redirect()->route('culturalmanagers.create',['id' => $request->people_entities_id])
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
        //dd($validated);
        $saveCulturalManager = new CulturalManager();
        $saveCulturalManager->name = $validated['name'];
        $saveCulturalManager->status = $validated['status'];
        $saveCulturalManager->type_activities_id = $validated['type_activities_id'];
        $saveCulturalManager->scope_activities_id = $validated['scope_activities_id'];
        $saveCulturalManager->people_entities_id = $validated['people_entities_id'];
        $saveCulturalManager->save();

        return redirect()->route('culturalmanagers.create')->with('status', 'Gestor cultural agregado con exito');;


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

    public function datatablesPersonas(Request $request){
        if ($request->ajax()) {
            //$peopleEntitiesdata = PersonEntity::find(auth()->user()->id);

            $PersonEntityData = PersonEntity::all();

            //$PersonEntityData = Arr::add($PersonEntityDataTemp,'formRequestPeople', '1');
            return Datatables($PersonEntityData)
                    ->addColumn('action', function ($PersonEntityData) {
                        $buttons = '<a onclick="selectedPersonEntity('.$PersonEntityData->id.')" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i></a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }
}
