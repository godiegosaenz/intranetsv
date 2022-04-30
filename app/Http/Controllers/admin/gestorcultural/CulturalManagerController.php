<?php

namespace App\Http\Controllers\admin\gestorcultural;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CulturalManager;
use App\Models\PersonEntity;
use App\Models\ScopeActivity;
use App\Models\TypeActivity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use App\Models\Country;
use App\Models\Province;
use App\Models\Canton;
use App\Models\Parish;
use Illuminate\Validation\Rule;

class CulturalManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CulturalManager = CulturalManager::with('people_entities','scope_activity','type_activity','countries','provinces','cantons','parishes')->get();
        return view('admin/culturalmanager',compact('CulturalManager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $CountryData = Country::all();
        $ProvinceData = new Province();
        $CantonData = new Canton();
        $ParishData = new Parish();
        $PersonEntityData = new PersonEntity();
        if(Cookie::get('country_id') !== null){
            $ProvinceData = Province::where('country_id',Cookie::get('country_id'))->get();
        }
        if(Cookie::get('province_id') !== null){
            $CantonData = Canton::where('province_id',Cookie::get('province_id'))->get();
        }
        if(Cookie::get('canton_id') !== null){
            $ParishData = Parish::where('canton_id',Cookie::get('canton_id'))->get();
        }

        Cookie::queue('country_id', '');
        Cookie::queue('province_id', '');
        Cookie::queue('canton_id', '');
        Cookie::queue('parish_id', '');


        $CulturalManager = new CulturalManager();
        $ScopeActivity = ScopeActivity::all();
        $TypeActivity = TypeActivity::all();
        return view('admin.culturalmanagerCreate', compact('CulturalManager','ScopeActivity','TypeActivity','PersonEntityData','CountryData','ProvinceData','CantonData','ParishData'));
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
            'status' => 'estado',
            'type_activities_id' => 'Tipo de activadad',
            'scope_activities_id' => 'Ambito de actividad',
            'people_entities_id' => 'Persona/empresa',
            'country_id' => 'Pais',
            'province_id' => 'Privincia',
            'canton_id' => 'Canton',
            'parish_id' => 'Parroquia',
        ];
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'type_activities_id' => 'required',
            'scope_activities_id' => 'required',
            'people_entities_id' => 'required|unique:App\Models\CulturalManager,people_entities_id',
            'country_id' => 'required',
            'province_id' => 'required',
            'canton_id' => 'required',
            'parish_id' => 'required',
        ],[],$attributes);

        if ($validator->fails()) {
            //$people_entities_id = $request->people_entities_id;
            Cookie::queue('country_id', $request->country_id);
            Cookie::queue('province_id', $request->province_id);
            Cookie::queue('canton_id', $request->canton_id);
            Cookie::queue('parish_id', $request->parish_id);
            return back()->withErrors($validator)->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
        $saveCulturalManager = new CulturalManager();
        $saveCulturalManager->status = $validated['status'];
        $saveCulturalManager->type_activities_id = $validated['type_activities_id'];
        $saveCulturalManager->scope_activities_id = $validated['scope_activities_id'];
        $saveCulturalManager->people_entities_id = $validated['people_entities_id'];
        $saveCulturalManager->country_id = $validated['country_id'];
        $saveCulturalManager->province_id = $validated['province_id'];
        $saveCulturalManager->canton_id = $validated['canton_id'];
        $saveCulturalManager->parish_id = $validated['parish_id'];
        $saveCulturalManager->save();

        return redirect()->route('culturalmanagers.create')->with('status', 'Gestor cultural agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CulturalManager $CulturalManager)
    {
        return view('admin.culturalmanagerShow', compact('CulturalManager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CulturalManager $CulturalManager)
    {
        $CountryData = Country::all();
        $ProvinceData = Province::where('country_id',$CulturalManager->country_id)->get();
        $CantonData = Canton::where('province_id',$CulturalManager->province_id)->get();
        $ParishData = Parish::where('canton_id',$CulturalManager->canton_id)->get();
        $PersonEntityData = new PersonEntity();


        Cookie::queue('country_id', '');
        Cookie::queue('province_id', '');
        Cookie::queue('canton_id', '');
        Cookie::queue('parish_id', '');

        $ScopeActivity = ScopeActivity::all();
        $TypeActivity = TypeActivity::all();
        return view('admin.culturalmanagerEdit', compact('CulturalManager','ScopeActivity','TypeActivity','PersonEntityData','CountryData','ProvinceData','CantonData','ParishData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CulturalManager $CulturalManager, Request $request)
    {
        $attributes = [
            'status' => 'estado',
            'type_activities_id' => 'Tipo de activadad',
            'scope_activities_id' => 'Ambito de actividad',
            'people_entities_id' => 'Persona/empresa',
            'country_id' => 'Pais',
            'province_id' => 'Privincia',
            'canton_id' => 'Canton',
            'parish_id' => 'Parroquia',
        ];
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'type_activities_id' => 'required',
            'scope_activities_id' => 'required',
            'people_entities_id' => ['bail','required',Rule::unique('App\Models\CulturalManager')->ignore($CulturalManager)],
            'country_id' => 'required',
            'province_id' => 'required',
            'canton_id' => 'required',
            'parish_id' => 'required',
        ],[],$attributes);

        if ($validator->fails()) {
            //$people_entities_id = $request->people_entities_id;
            Cookie::queue('country_id', $request->country_id);
            Cookie::queue('province_id', $request->province_id);
            Cookie::queue('canton_id', $request->canton_id);
            Cookie::queue('parish_id', $request->parish_id);
            return back()->withErrors($validator)->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
        $CulturalManager->update($validated);
        /*$saveCulturalManager = CulturalManager();
        $saveCulturalManager->status = $validated['status'];
        $saveCulturalManager->type_activities_id = $validated['type_activities_id'];
        $saveCulturalManager->scope_activities_id = $validated['scope_activities_id'];
        $saveCulturalManager->people_entities_id = $validated['people_entities_id'];
        $saveCulturalManager->country_id = $validated['country_id'];
        $saveCulturalManager->province_id = $validated['province_id'];
        $saveCulturalManager->canton_id = $validated['canton_id'];
        $saveCulturalManager->parish_id = $validated['parish_id'];
        $saveCulturalManager->save();*/

        return redirect()->route('culturalmanagers.edit',$CulturalManager)->with('status', 'Gestor cultural actualizado con exito');

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
