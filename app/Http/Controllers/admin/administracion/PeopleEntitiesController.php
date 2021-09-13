<?php

namespace App\Http\Controllers\admin\administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonEntity;
use App\Models\Country;
use App\Models\Province;
use App\Models\Canton;
use App\Models\Parish;
use App\Http\Requests\StorePersonEntityRequest;
use App\Http\Requests\UpdatePersonEntityRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Arr;

class PeopleEntitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.peopleentities');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CountryData = Country::all();
        $ProvinceData = new Province();
        $CantonData = new Canton();
        $ParishData = new Parish();
        if(Cookie::get('country_id') !== null){
            $ProvinceData = Province::where('country_id',Cookie::get('country_id'))->get();
        }
        $PersonEntityData = new PersonEntity();

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
        return view('admin.peopleentitiesCreate', compact('PersonEntityData','CountryData','ProvinceData','CantonData','ParishData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonEntityRequest $request)
    {
        if($request->type == "1"){
            $validationComplete = Arr::add($request->validated(),'is_person','1') ;
        }else{
            $validationComplete = Arr::add($request->validated(),'is_person','0') ;
        }
        //dd($validationComplete);
        $personcreate = PersonEntity::create($validationComplete);
        return redirect()->route('peopleentities.create')->with('status', 'El registro fue exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PersonEntity = PersonEntity::with(['countries','provinces','cantons','parishes'])->find($id);
        return view('admin/peopleentitiesShow',compact('PersonEntity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonEntity $PersonEntity)
    {
        $CountryData = Country::all();
        $ProvinceData = Province::where('country_id',$PersonEntity->country_id)->get();
        $CantonData = Canton::where('province_id',$PersonEntity->province_id)->get();
        $ParishData = Parish::where('canton_id',$PersonEntity->canton_id)->get();
        return view('admin.peopleentitiesEdit',compact('PersonEntity','CountryData','ProvinceData','CantonData','ParishData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonEntityRequest $request, PersonEntity $PersonEntity)
    {
        if($request->type == "1"){
            $validationComplete = Arr::add($request->validated(),'is_person','1') ;
        }else{
            $validationComplete = Arr::add($request->validated(),'is_person','0') ;
        }
        $PersonEntity->update($validationComplete);
        return back()->with('status',  'El usuario '.$request->name.' se ha actualizado satisfactoriamente');
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

    public function datatables(Request $request){
        if ($request->ajax()) {
            //$peopleEntitiesdata = PersonEntity::find(auth()->user()->id);

            $PersonEntityData = PersonEntity::all();

            //$PersonEntityData = Arr::add($PersonEntityDataTemp,'formRequestPeople', '1');
            return Datatables($PersonEntityData)
                    ->addColumn('action', function ($PersonEntityData) {
                        $buttons = '<a href="'.route('peopleentities.show',['PersonEntity' => $PersonEntityData]).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a> ';
                        $buttons .= '<a href="'.route('peopleentities.edit',['PersonEntity' => $PersonEntityData]).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Editar</a> ';
                        $buttons .= '<a onclick="deleteMessage('.$PersonEntityData->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Eliminar</a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }

    public function getPersonEntity($id) {
        $PersonEntityData = PersonEntity::with(['Countries','provinces','cantons','parishes'])->where('id', $id)->first();
        return $PersonEntityData;
    }
}
