<?php

namespace App\Http\Controllers\admin\configuracion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use DataTables;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('configuracion.role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.roleCreate',
                    [
                        'roles' => new Role,
                        'permissions' => Permission::all()
                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datavalidate = $request->validate([
            'name' => 'bail|required|unique:Spatie\Permission\Models\Role,name',
        ]);

        $role = Role::create($datavalidate);
        $role->syncPermissions($request->permisions);
        return redirect('/roles/create')->with('status', 'El Rol '.$role->name.' se ha registrado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $rolespermission = $role::findByName($role->name)->permissions;
        $permisos = Permission::pluck('name','id');
        return view('configuracion.roleEdit',[
                    'role' => $role,
                    'permissions' => $permisos,
                    'rolepermission' => $rolespermission
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role,Request $request)
    {
        $datavalidate = $request->validate([
            'name' => [
                        'bail',
                        'required',
                        Rule::unique('roles')->ignore($role->id)]
        ]);

        $role->update($datavalidate);
        $role->syncPermissions($request->permisions);
        return redirect()->route('roles.edit', ['role' => $role])->with('status',  'El Rol '.$request->name.' y sus permisos se ha actualizado satisfactoriamente');
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
            if($request->role == '') {
                $rolespermission = Permission::all();
            }else{
                $rolespermission = Role::findByName($request->role)->permissions;
            }

            return Datatables($rolespermission)
                    ->make(true);
        }
    }
}
