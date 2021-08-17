<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\configuracion\UserController;
use App\Http\Controllers\admin\configuracion\RolesController;
use App\Http\Controllers\admin\configuracion\UserRolesController;
use App\Http\Controllers\admin\configuracion\UserPermissionsController;
use App\Http\Controllers\admin\administracion\PeopleEntitiesController;


Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('guest');

Route::prefix('admin')->group(function (){
    //Rutas de inicio de sesion
    Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //Rutas de home de administracion
    Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
    //Rutas de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
    Route::post('/users/datatables', [UserController::class, 'datatables'])->name('users.datatables');
    //Rutas de Roles
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index')->middleware('auth');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create')->middleware('auth');
    Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RolesController::class, 'show'])->name('roles.show')->middleware('auth');
    Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit')->middleware('auth');
    Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RolesController::class, 'delete'])->name('roles.delete');
    Route::post('/roles/datatables', [RolesController::class, 'datatables'])->name('roles.datatable');

    Route::post('/usersroles/{user}', [UserRolesController::class, 'store'])->name('usersroles.store');
    Route::post('/userspermissions/{user}', [UserPermissionsController::class, 'store'])->name('userpermissions.store');

    Route::get('/peopleentities', [PeopleEntitiesController::class, 'index'])->name('peopleentities.index')->middleware('auth');
    Route::get('/peopleentities/create', [PeopleEntitiesController::class, 'create'])->name('peopleentities.create')->middleware('auth');
    Route::get('/peopleentities/{PersonEntity}', [PeopleEntitiesController::class, 'show'])->name('peopleentities.show')->middleware('auth');
    Route::get('/peopleentities/{PersonEntity}/edit', [PeopleEntitiesController::class, 'edit'])->name('peopleentities.edit')->middleware('auth');
    Route::post('/peopleentities/datatables', [PeopleEntitiesController::class, 'datatables'])->name('peopleentities.datatables');
    Route::post('/peopleentities', [PeopleEntitiesController::class, 'store'])->name('peopleentities.store');
});
