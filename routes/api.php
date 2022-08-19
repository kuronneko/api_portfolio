<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:api')->group( function(){
    Route::resource('persona', \App\Http\Controllers\PersonaController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
    Route::resource('project', \App\Http\Controllers\ProjectController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
    Route::put('persona/status/{persona}', [App\Http\Controllers\PersonaController::class, 'status'])->name('persona.status');
    Route::put('project/status/{project}', [App\Http\Controllers\ProjectController::class, 'status'])->name('project.status');
});
//Route::get('persona/status/active', [App\Http\Controllers\PersonaController::class, 'getActivePersona'])->name('persona.get_active_persona');
Route::get('persona/get/{email}', [App\Http\Controllers\PersonaController::class, 'getActivePersona'])->name('persona.get_active_persona');
//Route::resource('persona', \App\Http\Controllers\PersonaController::class)->only(['show']);




