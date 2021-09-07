<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\configuracion\UserController;
use App\Http\Controllers\admin\configuracion\RolesController;
use App\Http\Controllers\admin\configuracion\UserRolesController;
use App\Http\Controllers\admin\configuracion\UserPermissionsController;
use App\Http\Controllers\admin\administracion\PeopleEntitiesController;
use App\Http\Controllers\admin\gestorcultural\CulturalManagerController;
use App\Http\Controllers\admin\configuracion\ProvincesController;
use App\Http\Controllers\admin\configuracion\CantonController;
use App\Http\Controllers\admin\configuracion\ParishController;
use App\Models\CulturalManager;

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
    Route::put('/peopleentities/{PersonEntity}', [PeopleEntitiesController::class, 'update'])->name('peopleentities.update');
    Route::post('/peopleentities/{id}/get', [PeopleEntitiesController::class, 'getPersonEntity'])->name('peopleentities.get');

    Route::post('/provinces/{id}', [ProvincesController::class, 'show'])->name('provinces.show')->middleware('auth');
    Route::post('/cantons/{id}', [CantonController::class, 'show'])->name('cantons.show')->middleware('auth');
    Route::post('/parishes/{id}', [ParishController::class, 'show'])->name('parishes.show')->middleware('auth');

    Route::get('/culturalmanagers', [CulturalManagerController::class, 'index'])->name('culturalmanagers.index')->middleware('auth');
    Route::get('/culturalmanagers/create/{id?}', [CulturalManagerController::class, 'create'])->name('culturalmanagers.create')->middleware('auth');
    Route::get('/culturalmanagers/{CulturalManager}', [CulturalManagerController::class, 'show'])->name('culturalmanagers.show')->middleware('auth');
    Route::get('/culturalmanagers/{CulturalManager}/edit', [CulturalManagerController::class, 'edit'])->name('culturalmanagers.edit')->middleware('auth');
    Route::post('/culturalmanagers/datatablesPersonas', [CulturalManagerController::class, 'datatablesPersonas'])->name('culturalmanagers.datatablesPersonas');
    Route::post('/culturalmanagers', [CulturalManagerController::class, 'store'])->name('culturalmanagers.store')->middleware('auth');

    Route::get('/countries', function(){
        return CulturalManager::with(['people_entities'])->get();
    });
});
