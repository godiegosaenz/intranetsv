<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\configuracion\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [LoginController::class, 'index'])->name('show.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('show.users');
Route::get('/users/create', [UserController::class, 'create'])->name('create.users');
Route::post('/users/store', [UserController::class, 'store'])->name('store.users');
Route::post('/users/datatables', [UserController::class, 'datatables'])->name('datatables.users');
/*Route::prefix('admin')->group(function () {

});*/
