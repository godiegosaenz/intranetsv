<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreUserRoleRequest;

class UserRolesController extends Controller
{
    public function store(User $user,StoreUserRoleRequest $request){
        //Cache::put('tabusuario', 2);
        $tabusuario =cookie('tabusuario', '2');
        $user->syncRoles($request->validated());
        return back()->withInput()->with('status','Rol asignado con exito')->cookie($tabusuario);
    }
}
