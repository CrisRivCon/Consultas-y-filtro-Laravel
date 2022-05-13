<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class busquedaController extends Controller
{
    public function buscarActor(Request $request)
    {
        //dd($request->nombre);
        $actores = Actor::where('first_name', 'LIKE', '%'.$request->nombre.'%')
            ->where('last_name', 'LIKE', '%'.$request->apellido.'%')
            ->get();
        return view('actor', compact('actores'));
    }
}
