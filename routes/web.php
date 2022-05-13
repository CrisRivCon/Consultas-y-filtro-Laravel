<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\busquedaController;

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

Route::get('/', [busquedaController::class, 'inicio'])->name('inicio');
/*Route::get('/test', function(){
    return 'hola';
})->name('inicio');*/

Route::post('buscar/{nombre?}', [BusquedaController::class, 'buscarActor'])->name('buscar');


Route::post('buscar/peliculas/{id?}', [BusquedaController::class, 'buscarPeliculaActor'])->name('actorPelicula');
