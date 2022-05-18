<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;

use App\Models\Film_actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class busquedaController extends Controller
{
    public function buscarActor(Request $request)
    {
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $titulo = $request->titulo;
        if ($nombre)
        {
            $actor = DB::table('actor')
                ->where('first_name', 'LIKE', '%'.$nombre.'%');
        }
        if($apellido)
        {
            $actor->where('last_name', 'LIKE', '%'.$apellido.'%');
        }
        if($titulo)
        {

        }
        //dd($actor->get());

        if (isset($request->nombre)||isset($request->apellido)) {
            $actores = Actor::where('first_name', 'LIKE', '%' . $request->nombre . '%')
                ->where('last_name', 'LIKE', '%' . $request->apellido . '%')
                ->get();
            return view('showSearchActors', compact('actores'));
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

        $peliculas=Actor::find($id)
            ->films()
            ->get();
        //dd($peliculas);

        return view( 'peliculas_actores', compact('peliculas'));
    }



}
