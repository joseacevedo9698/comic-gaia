
@extends('admin_plantilla')

@section('content_control')
    <table id="libros_table" class="table table-striped table-bordered" style="border: none; " >
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Volumen</th>
                <th>Autor</th>
                <th>Genero</th>
                <th>Editorial</th>
                <th><a class="btn btn-success" href="/registro">Registrar</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{$libro->titulo->Nombre}}</td>
                    <td>{{$libro->volumen}}</td>
                    <td>
                        @foreach ($libro->autors as $item)
                            {{$item->Nombre}}.
                        @endforeach
                    </td>
                    <td>
                        @foreach ($libro->generos as $item)
                            {{$item->Nombre}}.
                        @endforeach
                    </td>
                    <td>{{$libro->editorial->Nombre}}</td>
                    <td>
                        <div class="grupo-botones">
                            <a href="/editar_libro/{{$libro->id}}" class="btn btn-primary">Editar</a>
                            <a href="#"  onclick="alerta({{$libro->id}})" class=" btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script>
        $(document).ready( function () {
            $('#libros_table').DataTable({
                "pageLength": 5,
                ordering:  true,
                "lengthChange": true,
                responsive: true,
                "scrollX": false
            });
        });

        function alerta(id){
            var opcion = confirm("¿Desea eliminar este libro?");
            if (opcion == true) {
                window.location.href='/eliminar_libro/'+id;
	        }
            
        }
            
</script>

@if (isset($respuesta_resgistro))
    @if ($respuesta_resgistro)
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Registro guardado correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endif
@endif

@if (isset($respuesta_actualizacion))
    @if ($respuesta_actualizacion)
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Registro actualizado correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endif
@endif

@if (isset($respuesta_eliminacion))
    @if ($respuesta_eliminacion)
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Registro eliminado correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endif
@endif