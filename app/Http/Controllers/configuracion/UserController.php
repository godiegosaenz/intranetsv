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
use Illuminate\Support\Facades\Cache;

//use Yajra\lavarel_datatables_oracle\DataTables;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users->all();
    }

    public function index(){

        return view('configuracion.user', [
            'users' => $this->users
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
        User::create($registerUser);
        return redirect('/users/create')->with('status', 'El usuario '.$request->name.' se ha registrado satisfactoriamente');
    }

    public function show(User $user){
        $roles =  $user->getRoleNames();
        ///return $roles;
        return view('configuracion.userShow',compact('user'));
    }

    public function edit(User $user, Request $request){
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
        Cache::put('tabusuario', 1);
        return back()->with('status',  'El usuario '.$request->name.' se ha actualizado satisfactoriamente');
    }

    public function destroy(){

    }

    public function datatables(Request $request){
        if ($request->ajax()) {

            $users = $this->users;

            return Datatables($users)
                    ->addColumn('action', function ($users) {
                        $buttons = '<a href="'.route('users.show',['user' => $users]).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> ';
                        $buttons .= '<a href="'.route('users.edit',['user' => $users]).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> ';
                        $buttons .= '<a class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>';
                        return $buttons;
                    })
                    ->make(true);
        }

    }
}
