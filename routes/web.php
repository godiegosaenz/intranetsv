<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\configuracion\UserController;
use App\Http\Controllers\configuracion\RolesController;
use App\Http\Controllers\configuracion\UserRolesController;
use App\Http\Controllers\configuracion\UserPermissionsController;

Route::get('/', [LoginController::class, 'index'])->name('show.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
Route::post('/users/datatables', [UserController::class, 'datatables'])->name('users.datatables');

Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}', [RolesController::class, 'show'])->name('roles.show');
Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RolesController::class, 'delete'])->name('roles.delete');
Route::post('/roles/datatables', [RolesController::class, 'datatables'])->name('roles.datatable');

Route::post('/usersroles/{user}', [UserRolesController::class, 'store'])->name('usersroles.store');
Route::post('/userspermissions/{user}', [UserPermissionsController::class, 'store'])->name('userpermissions.store');

/*Route::prefix('admin')->group(function () {

});*/
