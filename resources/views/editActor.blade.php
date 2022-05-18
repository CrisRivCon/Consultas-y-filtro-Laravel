@extends('welcome')
@section('tabla')

        @if($actor->count()> 0)
        <div class="row mt-3 justify-content-md-around bg-light" id="formulario">
            <form class="m-3" method="POST" action="{{route('actualizarActor', $actor->actor_id)}}">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="text-muted" for="validationDefault01">First name</label>
                        <input type="text" class="form-control bg-info text-white" name="first_name" value="{{$actor->first_name}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Last name</label>
                        <input type="text" class="form-control bg-info text-white" name="last_name" value="{{$actor->last_name}}" required>
                    </div>
                </div>
               {{-- <div class="custom-file">
                    <input type="file" class="custom-file-input bg-info text-white" name="file" id="modal_form_img" accept="image/*" required>
                    <label id="modal_preview" class="custom-file-label bg-info text-white preview" for="file" >Selecciona una imagen...</label>
                </div>--}}
                <div class="text-center">
                <button type="submit" id="actualizar-actor" class="btn btn-info">Actualizar</button>
                </div>
            </form>
        </div>
        @endif

@endsection
