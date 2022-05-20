<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actores = Actor::orderBy('actor_id','desc')->get();
            //->orderBy('actor_id', 'desc'); //Me da error al intentar ordenarlo de manera descendente
        return view('showAllActors', compact('actores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crearActor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Actor::create([
            'first_name' => $request->first_name,
            'last_name'=> $request->last_name]);

        //cuidado con eso
        /*Actor::create([
           'first_name'=> $request->firstname,
           'last_name'=> $request->firstname ,
        ]);*/
        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actor = Actor::find($id);
        if ($actor){
            return view('editActor', compact('actor'));
        }else{
            session()->flash('error','Ha ocurrido un error');
            return redirect()->back();
        }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$actor = Actor::find($id);
        if($actor){
            $actor->first_namme = '...',
            $actor->last_namme = '...',
            $actor->save();
//controlar id
        }else{
            //...
        }*/
        $actor = Actor::find($id);
        if ($actor){
            $actor->first_name = $request->first_name;
            $actor->last_name = $request->last_name;
            $actor->save();
            //update($request->all()); //Esto es peligroso
            return redirect()->route('inicio');
        }else{
            session()->flash('error','Ha ocurrido un error');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor = Actor::find($id);
        if($actor){
            $actor->delete();
            return redirect()->back(); // aqui hace redireccion get
        }else{

            session()->flash('error','Ha ocurrido un error');
            return redirect()->back();
        }
        //Mucho texto return redirect()->action([ActorController::class, 'index']);
        //return redirect()->route('inicio');//Aprovecha los name de las rutas :)
    }
}
