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

        /*$peliculas_id = Film_actor::select('film_id')
            ->where('actor_id', $id)
            ->get()
            ->map(function ($peliculas_id){
                return $peliculas_id->film_id;
            });
        //dd($peliculas_id);

        $peliculas = Film:: whereIn('film_id', $peliculas_id)
        ->get();*/
        $peliculas=Actor::find(1)
            ->films()
            //->where('actor_id', $id)
            ->get();

        //dd($peliculas);
        //dd($peliculas);
        return view( 'peliculas_actores', compact('peliculas'));
    }
}
