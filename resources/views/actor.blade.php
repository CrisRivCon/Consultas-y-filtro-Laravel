@extends('welcome')
@section('tabla')
    <div class="row mt-3 p-md-2 table-responsive-md" id="tabla">
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
                    {{--<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editar_actor">Editar</a>
                                <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#eliminar_actor">Eliminar</a>--}}
                        <form method="POST" action="{{route('actorPelicula', $actor->actor_id)}}">
                            @csrf
                                <button class="btn btn-light" data-toggle="modal" data-target="#ver_peliculas">Ver Peliculas</button>
                        </form>
    {{--</div>
</div>
</div>--}}
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
