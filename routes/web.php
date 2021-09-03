<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Form\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

//Route::get('listagem-usuario', [UserController::class,'listUser']);

//Route::get('usuarios', [TestController::class,'listAllUsers'])->name('users.listAll');
Route::get('teste/novo', [TestController::class,'formAddUser'])->name('users.formAddUser');
//Route::get('usuarios/editar/{user}', [TestController::class,'formEditUser'])->name('users.formEditUser');
//Route::get('usuarios/{user}', [TestController::class,'listUser'])->name('users.list');


/*VERBO POST*/

Route::post('usuarios/store', [TestController::class,'storeUSer'])->name('users.store');

/*VERBO PUT/PATCH*/

//Route::put('usuarios/edit/{user}', [TestController::class,'editUSer'])->name('users.edit');

/*VERBO DELETE*/

//Route::delete('usuarios/delete/{user}', [TestController::class,'deleteUser'])->name('users.delete');


/* --- ---- ---*/

//Route::get('/', [PostController::class,'showForm']);
Route::post('/debug', [PostController::class,'debug'])->name('debug');

/* RELATIONSHIP */

Route::get('/usuario/{id}', [UserController::class,'show']);
Route::get('/endereco/{address}', [AddressController::class,'show']);
Route::get('/artigo/{post}', [PostController::class,'show']);
Route::get('/categoria/{category}', [CategoryController::class,'show']);

Route::get('/user/{id}', function ($id) {
    return new UserCollection(User::findOrFail($id));
});

/* ACL - PERMISSIONS */

Route::resource('products', ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
