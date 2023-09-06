<?php

namespace App\Http\Controllers\admin\configuracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PersonEntity;
use Illuminate\Support\Facades\Cookie;
use App\Events\UserWasCreated;
use Illuminate\Support\Facades\Auth;

//use Yajra\lavarel_datatables_oracle\DataTables;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users->all();
    }

    public function index(Request $r,User $User){

        $this->authorize('view', $User);
        Cookie::queue('tabusuario', '1');
        return view('configuracion.user', [
            'users' => $this->users,
        ]);
    }

    public function create(Request $r,User $User,$id = null){
        $this->authorize('create', $User);
        if($id != null){
            $PersonEntityData = PersonEntity::where('id', $id)->first();
        }else{
            $PersonEntityData = new PersonEntity();
        }
        //dd($PersonEntityData);
        $user = new User();
        $roles = Role::pluck('name','id');
        return view('configuracion.userCreate',compact('user','roles','PersonEntityData'));
    }

    public function store(SaveUserRequest $request){
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->status = $request->status;
        $User->password = bcrypt($request->password);
        $User->people_entities_id = $request->people_entities_id;
        $User->save();
        return redirect()->route('users.edit', ['user' => $User])->with('status', 'El usuario '.$request->name.' se ha registrado satisfactoriamente');
    }

    public function show(User $user){
        $roles =  $user->getRoleNames();
        $rolPermissionuser = $user->getPermissionsViaRoles()->pluck('name','id');
        $permissions = Permission::all();
        $roluser = $user->getRoleNames();
        $permissionsuser = $user->permissions->pluck('name','id');
        return view('configuracion.userShow',[
            'user' => $user,
            'roles' => $roles,
            'permission' => $permissions,
            'roluser' => $roluser,
            'PermissionRole' => $rolPermissionuser,
            'PermissionUser' => $permissionsuser
        ]);
    }

    public function edit(Request $request,User $User){
        $this->authorize('edit', $User);
        $PersonEntityData = PersonEntity::where('id', $User->people_entities_id)->first();
        $roles = Role::all()->pluck('name','id');
        $rolPermissionuser = $User->getPermissionsViaRoles()->pluck('name','id');
        $roluser = $User->getRoleNames();
        $permissionsuser = $User->permissions->pluck('name','id');
        return view('configuracion.userEdit',
                    ['user' => $User,
                    'roluser' => $roluser,
                    'roles' => $roles,
                    'Permission' => Permission::all(),
                    'PermissionRole' => $rolPermissionuser,
                    'PermissionUser' => $permissionsuser,
                    'PersonEntityData' => $PersonEntityData
        ]);
    }

    public function update(User $user,UpdateUserRequest $request){
        $user->update($request->validated());

        $tabusuario = cookie('tabusuario', '1');
        //Cache::put('tabusuario', 1);
        return back()->with('status',  'El usuario '.$request->name.' se ha actualizado satisfactoriamente')->cookie($tabusuario);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('status',  'El usuario se ha eliminado');
    }

    public function datatables(Request $request){
        if ($request->ajax()) {
            //$userAutenticado = User::find(auth()->user()->id);
            //dd($userAutenticado);
            //if($userAutenticado->isAdministrator()){
                $users = User::with(['person_entity'])->get();
            //}else{
            //    $users = User::where('id', auth()->user()->id)->get();
            //}

            return Datatables($users)
                    ->addColumn('cc_ruc', function ($users) {
                        $cc_ruc = $users->person_entity->cc_ruc;
                        return $cc_ruc;
                    })
                    ->addColumn('name_person', function ($users) {
                        $name = $users->person_entity->name;
                        return $name;
                    })
                    ->addColumn('lastname_person', function ($users) {
                        $name = $users->person_entity->last_name;
                        return $name;
                    })
                    ->addColumn('action', function ($users) {
                        $buttons = '<a href="'.route('users.show',['user' => $users]).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> ';
                        $buttons .= '<a href="'.route('users.edit',['user' => $users]).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> ';
                        $buttons .= '<a onclick="deleteMessage('.$users->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }
}
