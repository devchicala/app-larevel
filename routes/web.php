<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Form\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/*VERBO GET*/
Route::get('listagem-usuario', [UserController::class,'listUser']);

Route::get('usuarios', [TestController::class,'listAllUsers'])->name('users.listAll');
Route::get('usuarios/novo', [TestController::class,'formAddUser'])->name('users.formAddUser');
Route::get('usuarios/editar/{user}', [TestController::class,'formEditUser'])->name('users.formEditUser');
Route::get('usuarios/{user}', [TestController::class,'listUser'])->name('users.list');

/*VERBO POST*/
Route::post('usuarios/store', [TestController::class,'storeUSer'])->name('users.store');

/*VERBO PUT/PATCH*/
Route::post('usuarios/edit/{user}', [TestController::class,'editUSer'])->name('users.edit');