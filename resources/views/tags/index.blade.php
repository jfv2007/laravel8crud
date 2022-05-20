@extends('adminlte::page')

@section('title', 'CRUD con laravel 8')

@section('content_header')
    <h1>Lista de tags</h1>
@stop

@section('content')
<a href="tags/create" class="btn btn-primary mb-3">CREAR</a>

<table id="tags" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
        <tr>
            <th scope="col" style="display: none;">ID</th>
            <th scope="col">foto</th>
            <th scope="col">Tag</th>
            <th scope="col">Descripción</th>
            <th scope="col">operacion</th>
            <th scope="col">ubicacion</th>
            <th scope="col">CT</th>
            <th scope="col">Planta</th>
            <th scope="col">Area</th>
            <th scope="col">Acciones</th>
        </tr>
</thead>
    <tbody>
        @foreach ($tags as $tag)
        <tr>
            <td style="display: none;" >{{ $tag->id}}/td>
            <td><img src="storage/images/planta/{{$tag->foto}}" width="50" class="img-thumbnail rounded-circle"></td>
            <td>{{$tag->tag}}</td>
            <td>{{$tag->descripcion}}</td>
            <td>{{$tag->operacion}}</td>
            <td>{{$tag->ubicacion}}</td>
            <td>{{$tag->ct}}</td>
            <td>{{$tag->planta}}</td>
            <td>{{$tag->area}}</td>
            <td>
                <form action="{{ route ('tags.destroy',$tag->id)}}" method="POST">
                <a href="/tags/{{$tag->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    @stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>

$(document).ready(function() {
    $('#tags').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );

</script>
@stop
