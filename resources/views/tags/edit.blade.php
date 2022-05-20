@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edirar Registro</h1>
@stop

@section('content')

<form action="{{ route ('tags.update', $tag->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

  <div class="mb-3">
    <label for="tag" class="form-label">Tag</label>
    <input type="text" name="tag" id="tag" class="form-control" value="{{$tag->tag}}">
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$tag->descripcion}}" placeholder="Descripcion" required>
  </div>
  <div class="mb-3">
    <label for="operacion" class="form-label">Operacion</label>
    <input id="operacion" name="operacion" type="text" class="form-control" value="{{$tag->operacion}}" placeholder="Operacion" required>
  </div>
  <div class="mb-3">
    <label for="ubicacion" class="form-label">Ubicacion</label>
    <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{$tag->ubicacion}}" placeholder="Ubicacion" required>
  </div>
  <div class="mb-3">
    <label for="ct" class="form-label">CT</label>
    <input type="text" name="ct" id="ct" class="form-control" value="{{$tag->ct}}" placeholder="CT" required>
  </div>
  <div class="mb-3">
    <label for="planta" class="form-label">Planta</label>
    <input type="text" name="planta" id="planta" class="form-control" value="{{$tag->planta}}" placeholder="Planta" required>
  </div>
  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input type="text" name="area" id="area" class="form-control" value="{{$tag->area}}" >
  </div>


  <div class="grid grid-cols-1 mt-5 mx-7">
  <!--  <img src="storage/images/planta/{{ $tag->foto }}" width="20%" id="imagenSeleccionada"> -->
    <img src="{{asset('storage/images/planta/'.$tag->foto) }}" width="30%" id="imagenSeleccionada">
</div>

<div class="grid grid-cols-1 mt-5 mx-7">
<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
    <div class='flex items-center justify-center w-full'>
        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
            <div class='flex flex-col items-center justify-center pt-7'>
         <!--   <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>-->
            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
            </div>
        <input name="foto" id="foto" type='file' class="hidden" />

        </label>
    </div>
</div>


  <a href="/tags" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function readImage (input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imagenSeleccionada').attr('src', e.target.result); // Renderizamos la imagen
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#foto").change(function () {
        // Código a ejecutar cuando se detecta un cambio de archivO
        readImage(this);
      });
    </script>
@stop
