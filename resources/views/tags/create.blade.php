@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Contenido</h1>
@stop

@section('content')
<form action="/tags" method="POST" enctype="multipart/form-data">.
@csrf
  <div class="mb-3">
    <label for="tag">Tag</label>
    <input type="text" name="tag" id="tag" class="form-control" placeholder="Tag" required tabindex="1">
  </div>
  <div class="mb-3">
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" required>
  </div>
  <div class="mb-3">
    <label for="operacion">Operacion</label>
    <input type="text" name="operacion" id="operacion" class="form-control" placeholder="Operacion" required>
  </div>
  <div class="mb-3">
    <label for="ubicacion">Ubicacion</label>
    <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ubicacion" required>
  </div>
  <div class="mb-3">
    <label for="ct">CT</label>
            <input type="text" name="ct" id="ct" class="form-control" placeholder="CT" required>
  </div>
  <div class="mb-3">
    <label for="planta">Planta</label>
            <input type="text" name="planta" id="planta" class="form-control" placeholder="Planta" required>
  </div>
  <div class="mb-3">
    <label for="area">Area</label>
            <input type="text" name="area" id="area" class="form-control" placeholder="Area" required>
  </div>
  

  <div class="grid grid-cols-1 mt-5 mx-7">
    <img id="imagenSeleccionada" style="max-height: 300px;">
</div>

<div class="grid grid-cols-1 mt-5 mx-7">
<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
    <div class='flex items-center justify-center w-full'>
        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
            <div class='flex flex-col items-center justify-center pt-7'>

            <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
            </div>
            <!-- class hidden es para que no aparesca la leyenda de seleccione el archivo -->
       <input name="foto" id="foto" type='file' class="form-control"/>
        </label>
    </div>
</div>


  <a href="/tags" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
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
