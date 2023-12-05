<?php

use App\Http\Controllers\Firebase\ContactController;
use App\Http\Controllers\MiBosquePersonalController;
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
Route::get('/mision', function () {
    return view('mision');
});

Route::get('/creaunproyecto', function () {
    return view('proyectista');
})->middleware(['auth', 'admin.email.check']);


Route::get('/mi_bosque_personal', [MiBosquePersonalController::class, 'mostrarBosquePersonal'])
    ->middleware('auth')
    ->name('mi_bosque_personal');


Route::get('/verUbicacion/{firebaseId}', [MiBosquePersonalController::class, 'verUbicacion'])
    ->middleware('auth')
    ->name('verUbicacion');



Route::get('/donar/{id}', [ProyectistaController::class, 'mostrarArbol'])->name('mostrarArbol');

Route::get('/verproyectos', [ProyectistaController::class, 'mostrarProyectos']);


Route::get('/gestionar', [ProyectistaController::class, 'gestionarProyectos'])
    ->middleware(['auth', 'admin.email.check']);

Route::get('/editar/{proyectoId}', [ProyectistaController::class, 'editarProyecto'])
    ->middleware(['auth', 'admin.email.check']);

Route::post('/editar/{proyectoId}', [ProyectistaController::class, 'editarProyecto'])
    ->middleware(['auth', 'admin.email.check']);
Route::post('/donar/{proyectoId}', [ProyectistaController::class, 'guardarDonacion'])->name('guardarDonacion');



Auth::routes();
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('proyectista.store',[ContactController::class, 'create']);
Route::post('proyectista.store',[ContactController::class, 'store']);


Route::post('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleCallback');
//Route::post('/proyectista', [\App\Http\Controllers\Firebase\ContactController::class, 'store'])->name('proyectista.store');
