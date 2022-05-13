@extends('welcome')
@section('tabla')
    <div class="row mt-3 p-md-2 table-responsive-md" id="tabla">
        @if($peliculas->count()> 0)
        <table class="table table-hover table-striped  table-info p-md-3 m-3 m-md-2 text-white">
            <thead class="bg-info">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">año</th>
{{--                <th scope="col" class="text-center">Opciones</th>--}}
            </tr>
            </thead>
            <tbody id="cuerpo_tabla">
    @foreach ($peliculas as $pelicula)
                <tr>
                    <th scope="row"></th>
                    <td >{{$pelicula->title}}</td>
                    <td >{{$pelicula->release_year}}</td>
                    {{--<td class="text-center">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editar_actor">Editar</a>
                                    <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#eliminar_actor">Eliminar</a>
                                    <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#ver_peliculas">Ver Peliculas</a>
                                </div>
                            </div>
                        </div>
                    </td>--}}
                </tr>

    @endforeach
        </tbody>
    </table>
    @else
            <p class="text-white">No hay coincidencias.</p>
    </div>
    @endif

@endsection
