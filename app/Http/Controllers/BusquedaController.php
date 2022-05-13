<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;

use App\Models\Film_actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class busquedaController extends Controller
{
    public function inicio()
    {
        return view('welcome');
    }
    public function buscarActor(Request $request)
    {

        if (isset($request->nombre)||isset($request->apellido)) {
            $actores = Actor::where('first_name', 'LIKE', '%' . $request->nombre . '%')
                ->where('last_name', 'LIKE', '%' . $request->apellido . '%')
                ->get();
            return view('actor', compact('actores'));
        }elseif(isset($request->titulo)||isset($request->año)){
            $peliculas = Film::where('title', 'LIKE', '%' . $request->titulo . '%')
                ->where('release_year', 'LIKE', '%' . $request->año . '%')
                ->get();
            return view('peliculas', compact('peliculas'));
        }else{
            return view('nada');
        }
        //dd($actores->count());

    }
    public function buscarPeliculaActor($id)
    {

        $peliculas_id = Film_actor::select('film_id')
            ->where('actor_id', $id)
            ->get();
        dd($peliculas_id);

        $peliculas = Film:: where('film_id', $peliculas_id->film_id)
        ->get();

        dd($peliculas);
    }
}
