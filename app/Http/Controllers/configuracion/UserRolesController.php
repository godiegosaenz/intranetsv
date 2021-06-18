<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserRolesController extends Controller
{
    public function store(User $user,Request $request){
        $validacion = $request->validateWithBag('erolesusers',[
            'role' => 'bail|required',
        ]);
        Cache::put('tabusuario', 2);
        $user->syncRoles($validacion);
        return back()->withInput()->with('status','Rol asignado con exito');
    }
}
