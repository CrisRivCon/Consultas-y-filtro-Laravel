<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\busquedaController;
use App\Http\Controllers\ActorController;

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

Route::get('/', [ActorController::class, 'index'])->name('inicio');
/*Route::get('/test', function(){
    return 'hola';
})->name('inicio');*/

Route::post('buscar/{nombre?}/{apellido?}/{titulo?}/{ano?}', [BusquedaController::class, 'buscarActor'])->name('buscar');


Route::get('buscar/peliculas/{id?}', [BusquedaController::class, 'buscarPeliculaActor'])->name('actorPelicula');

Route::get('eliminar/{id}', [ActorController::class, 'destroy'])->name('eliminarActor');
//Para eliminar utilizar el método get

Route::get('editar/{id}', [ActorController::class, 'edit'])->name('mostrarActor');
Route::post('actualizar/{id}', [ActorController::class, 'update'])->name('actualizarActor');
Route::get('crear-actor', [ActorController::class, 'create'])->name('crearActor');
Route::post('guardar/', [ActorController::class, 'store'])->name('guardarActor');


