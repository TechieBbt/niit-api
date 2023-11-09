<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NiitController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('home', [NiitController::class, 'index']);

Route::post('niits', [NiitController::class, 'createNiit']);

Route::get('niits', [NiitController::class, 'allNiit']);

Route::put('niits/{id}', [NiitController::class, 'updateNiit']);

Route::delete('niits/{id}', [NiitController::class, 'deleteNiit']);

Route::post('register', [RegisteredUserController::class, 'register']);