<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserPermissionsController extends Controller
{
    public function store(User $user, Request $request){
        $user->syncPermissions($request->only('permisions'));
        return back()->withInput();
    }
}
