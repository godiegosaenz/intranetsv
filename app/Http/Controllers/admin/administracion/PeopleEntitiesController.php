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
use Illuminate\Support\Carbon;

class PeopleEntitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PersonEntity $PersonEntity)
    {
        $this->authorize('view', $PersonEntity);
        return view('admin.peopleentities');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PersonEntity $PersonEntity)
    {
        $this->authorize('create', $PersonEntity);
        return view('admin.peopleentitiesCreate', compact('PersonEntity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonEntityRequest $request)
    {
        //return $request->has_disability;
        $old_age = Carbon::parse($request->date_birth)->age;
        $matriz_adicional = array();
        if($request->type == "1"){
            $matriz_adicional['is_person'] = true;
            //$validationComplete = Arr::add($request->validated(),'is_person','1');

        }else{
            $matriz_adicional['is_person'] = false;
            //$validationComplete = Arr::add($request->validated(),'is_person','0');
        }
        if($old_age >= 65){
            $matriz_adicional['old_age'] = true;
            //return $matriz_adicional;
        }else{
            $matriz_adicional['old_age'] = false;
            //return $matriz_adicional;
        }
        if($request->is_required_accounts != null){
            $matriz_adicional['is_required_accounts'] = true;
        }else{
            $matriz_adicional['is_required_accounts'] = false;
        }
        if($request->has_disability != null){
            $matriz_adicional['has_disability'] = true;
        }else{
            $matriz_adicional['has_disability'] = false;
        }

        $matriz_adicional['number_phone2'] = '1231';
        $validationSave = array_merge($request->validated(),$matriz_adicional) ;
        //dd($validationComplete);
        $personcreate = PersonEntity::create($validationSave);
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
        $PersonEntity = PersonEntity::find($id);
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
        $this->authorize('edit', $PersonEntity);
        return view('admin.peopleentitiesEdit',compact('PersonEntity'));
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
        $old_age = Carbon::parse($request->date_birth)->age;
        $matriz_adicional = array();
        if($request->type == "1"){
            $matriz_adicional['is_person'] = true;
            //$validationComplete = Arr::add($request->validated(),'is_person','1');

        }else{
            $matriz_adicional['is_person'] = false;
            //$validationComplete = Arr::add($request->validated(),'is_person','0');
        }
        if($old_age >= 65){
            $matriz_adicional['old_age'] = true;
            //return $matriz_adicional;
        }else{
            $matriz_adicional['old_age'] = false;
            //return $matriz_adicional;
        }
        if($request->is_required_accounts != null){
            $matriz_adicional['is_required_accounts'] = true;
        }else{
            $matriz_adicional['is_required_accounts'] = false;
        }
        if($request->has_disability != null){
            $matriz_adicional['has_disability'] = true;
        }else{
            $matriz_adicional['has_disability'] = false;
        }
        //$matriz_adicional['number_phone2'] = '1231';
        $validationSave = array_merge($request->validated(),$matriz_adicional) ;
        $PersonEntity->update($validationSave);
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

            $PersonEntityData = PersonEntity::where('type', $request->type)->get();

            //$PersonEntityData = Arr::add($PersonEntityDataTemp,'formRequestPeople', '1');
            return Datatables($PersonEntityData)
                    ->addColumn('action', function ($PersonEntityData) {
                        $buttons = '<a href="'.route('peopleentities.show',['PersonEntity' => $PersonEntityData]).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> ';
                        $buttons .= '<a href="'.route('peopleentities.edit',['PersonEntity' => $PersonEntityData]).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> ';
                        $buttons .= '<a onclick="deleteMessage('.$PersonEntityData->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }

    public function getPersonEntity(Request $r) {
        $PersonEntityData = PersonEntity::where('id', $r->id)->first();
        return $PersonEntityData;
    }

    public function datatablesPersonas(Request $request){
        if ($request->ajax()) {
            //$peopleEntitiesdata = PersonEntity::find(auth()->user()->id);

            $PersonEntityData = PersonEntity::where('status',1)->get();

            //$PersonEntityData = Arr::add($PersonEntityDataTemp,'formRequestPeople', '1');
            return Datatables($PersonEntityData)
                    ->editColumn('type', function ($PersonEntityData) {
                        return $PersonEntityData->TypePerson;
                    })
                    ->addColumn('name_tradename', function ($PersonEntityData) {
                        if($PersonEntityData->type == 1){
                            return $PersonEntityData->name;
                        }else{
                            return $PersonEntityData->tradename;
                        }
                    })
                    ->addColumn('last_name_bussines_name', function ($PersonEntityData) {
                        if($PersonEntityData->type == 1){
                            return $PersonEntityData->last_name.' '.$PersonEntityData->maternal_last_name;
                        }else{
                            return $PersonEntityData->bussines_name;
                        }
                    })
                    ->addColumn('action', function ($PersonEntityData) {
                        $buttons = '<a onclick="selectedPersonEntity('.$PersonEntityData->id.',0)" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i></a>';
                        return $buttons;
                    })
                    ->rawColumns(['type_person','name_tradename','last_name_bussines_name','action'])
                    ->make(true);
        }

    }
}
