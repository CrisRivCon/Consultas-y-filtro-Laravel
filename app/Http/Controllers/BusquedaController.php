<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;

use App\Models\Film_actor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class busquedaController extends Controller
{
    public function buscarActor(Request $request)
    {
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $actores = DB::table('actor')->select('*');
        if ($nombre || $apellido){
            if($nombre){
                $actores->where('first_name', 'LIKE', '%'.$nombre.'%');
            }
            if($apellido){
                $actores->where('last_name', 'LIKE', '%'.$apellido.'%');
            }
            $actores= $actores->get();
            return view('showSearchActors', compact('actores'));
        }else{
            session()->flash('error','No hay parametros que buscar');
            return redirect()->back();
        }

    }
    public function showPeliculas()
    {
        $peliculas = Film::all();
        return view('showAllFilms', compact('peliculas'));
    }
    public function buscarPelicula(Request $request){
        $titulo = $request->titulo;
        $anno = $request->anno;
        $peliculas = DB::table('film')->select('*');
        if ($titulo || $anno){
            if($titulo){
                $peliculas->where('title', 'LIKE', '%'.$titulo.'%');
            }
            if($anno){
                $peliculas->where('release_year', 'LIKE', '%'.$anno.'%');
            }
            $peliculas= $peliculas->get();
            return view('showSearchFilms', compact('peliculas'));
        }else{
            session()->flash('error','No hay parametros que buscar');
            return redirect()->back();
        }
    }
    public function buscarPeliculaActor($id)
    {
        $peliculas=Actor::find($id)
            ->films()
            ->get();
        //dd($peliculas);

        return view( 'showFilmsActor', compact('peliculas'));
    }



}
