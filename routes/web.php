<?php

use App\Http\Controllers\Firebase\ContactController;
use App\Http\Controllers\ProyectistaController;
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
    return view('home');
});
Route::get('/quienessomos', function () {
    return view('contribuidores/view');
});

Route::get('/creaunproyecto', function () {
    return view('proyectista');
})->middleware(['auth', 'admin.email.check']);




Route::get('/donar/{id}', [ProyectistaController::class, 'mostrarArbol']);

Route::get('/verproyectos', [ProyectistaController::class, 'mostrarProyectos']);


Route::get('/gestionar', [ProyectistaController::class, 'gestionarProyectos']);



Auth::routes();
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('proyectista.store',[ContactController::class, 'create']);
Route::post('proyectista.store',[ContactController::class, 'store']);


Route::post('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleCallback');
//Route::post('/proyectista', [\App\Http\Controllers\Firebase\ContactController::class, 'store'])->name('proyectista.store');
