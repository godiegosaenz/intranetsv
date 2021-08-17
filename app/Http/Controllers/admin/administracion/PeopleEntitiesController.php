<?php

namespace App\Http\Controllers\admin\administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonEntity;

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
        $PersonEntityData = new PersonEntity();
        return view('admin.peopleentitiesCreate', compact('PersonEntityData'));
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

    public function datatables(Request $request){
        if ($request->ajax()) {
            //$peopleEntitiesdata = PersonEntity::find(auth()->user()->id);
            $PersonEntityData = PersonEntity::all();
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
}
