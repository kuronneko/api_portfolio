<?php

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

Route::get('/{pathMatch}', function() {
    return view('welcome');
})->where('pathMatch',".*");

/* Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]); */

/* //protected group routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('{any}', function () { // {any}
        return view('home');
    })->where('any', '.*');
}); */

/* Route::get('{any}', function () { //{any} permite el renderizado de vue app en cualquier url
    return view('home');
})->where('any', '.*'); */
