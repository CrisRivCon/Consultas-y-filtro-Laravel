@extends('welcome')
@section('tabla')
    <form method="POST" action="{{route('buscar')}}">
        @csrf
        <div class="row bg-info text-light pt-3 pb-3 justify-center mx-0">
            <div class="actores col-6">
                <p> Actor</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="nombre" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Apellido</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="apellido" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="input-group m-2 justify-center" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-light">Buscar</button>
            </div>
        </div>
    </form>
    <div class="row mt-3 p-md-2 table-responsive-md" id="tabla">
        @if(session()->has('error'))
            <p style="color:red">{{ session()->get('error') }}</p>
        @endif
        @if($actores->count()> 0)
        <table class="table table-hover table-striped  table-info p-md-3 m-3 m-md-2 text-white">
            <thead class="bg-info">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col" class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody id="cuerpo_tabla">
    @foreach ($actores as $actor)
                <tr>
                    <th scope="row">{{$actor->actor_id}}</th>
                    <td >{{$actor->first_name}}</td>
                    <td >{{$actor->last_name}}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <form method="get" action="{{route('mostrarActor', $actor->actor_id)}}">
                                    @csrf
                                    <button class="dropdown-item btn btn-light">Editar</button>
                                </form>
                                <a class="dropdown-item btn btn-light" href="{{route('eliminarActor',$actor->actor_id)}}">Eliminar</a>
                             {{--   <form method="POST" action="{{route('eliminarActor', $actor->actor_id)}}">
                                    {{ @method_field('DELETE') }}
                                    @csrf
                                    <button class="dropdown-item btn btn-light">Eliminar</button>
                                </form>--}}
                                <a class="dropdown-item btn btn-light" href="{{route('actorPelicula', $actor->actor_id)}}">Ver peliculas</a>

                                {{--<form method="POST" action="{{route('actorPelicula', $actor->actor_id)}}">
                                    @csrf
                                    <button class="dropdown-item btn btn-light">Ver Peliculas</button>
                                </form>--}}
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        @else
        <p class="text-white">No hay coincidencias.</p>
    </div>
    @endif

@endsection
