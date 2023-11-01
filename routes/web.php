<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\ContactController;

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
    return view('home');
});

Route::get('/quienessomos', function () {
    return view('contribuidores/view');
});

Route::get('/creaunproyecto', function () {
    return view('proyectista');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('proyectista.store', [ContactController::class, 'store'])->name('proyectista.store');

Route::post('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleCallback');
//Route::post('/proyectista', [\App\Http\Controllers\Firebase\ContactController::class, 'store'])->name('proyectista.store');
