<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [UserController::class, 'index']);

Route::post('/posts ', [UserController::class, 'store']);

Route::get('/posts/{id}', [UserController::class, 'show']);

Route::put('/posts/{id}', [UserController::class, 'update']);

Route::delete('/posts/{id}', [UserController::class, 'destroy']);
