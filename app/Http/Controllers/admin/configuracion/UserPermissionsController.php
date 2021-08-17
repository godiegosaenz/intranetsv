<?php

namespace App\Http\Controllers\admin\configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
//use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Cookie;

class UserPermissionsController extends Controller
{
    public function store(User $user, Request $request){

        $tabusuario =cookie('tabusuario', '3');
        if($request->has('btnAsignarPermisos')){
            //Cache::put('tabusuario', 3);
            $user->syncPermissions($request->only('permisions'));
            return back()->withInput()->with('status','Permisos asignados con exito')->cookie($tabusuario);
        }else{
            //Cache::put('tabusuario', 3);
            $user->revokePermissionTo($request->only('permisions'));
            return back()->withInput()->with('status','Permisos quitados con exito')->cookie($tabusuario);
        }

    }
}
