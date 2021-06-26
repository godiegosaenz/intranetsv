<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cookie;
use App\Events\UserWasCreated;


//use Yajra\lavarel_datatables_oracle\DataTables;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users->all();
    }

    public function index(){

        Cookie::queue('tabusuario', '1');
        return view('configuracion.user', [
            'users' => $this->users,
        ]);
    }

    public function create(){
        return view('configuracion.userCreate',[
            'user' => new User(),
            'roles' => Role::pluck('name','id')
        ]);
    }

    public function store(SaveUserRequest $request){
        $registerUser = Arr::add($request->validated(),'password',bcrypt($request->dni.$request->lastname));
        $usercreate = User::create($registerUser);
        UserWasCreated::dispatch($usercreate,$usercreate->password);
        return redirect()->route('users.edit', ['user' => $usercreate])->with('status', 'El usuario '.$request->name.' se ha registrado satisfactoriamente');
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

    public function edit(User $user, Request $request){
        $this->authorize('edit', $user);
        $roles = Role::all()->pluck('name','id');
        $rolPermissionuser = $user->getPermissionsViaRoles()->pluck('name','id');
        $roluser = $user->getRoleNames();
        $permissionsuser = $user->permissions->pluck('name','id');
        return view('configuracion.userEdit',
                    ['user' => $user,
                    'roluser' => $roluser,
                    'roles' => $roles,
                    'Permission' => Permission::all(),
                    'PermissionRole' => $rolPermissionuser,
                    'PermissionUser' => $permissionsuser
        ]);
    }

    public function update(User $user,UpdateUserRequest $request){
        $user->update($request->validated());
        $tabusuario =cookie('tabusuario', '1');
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

            $users = User::where('id',auth()->user()->id)->get();

            return Datatables($users)
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
