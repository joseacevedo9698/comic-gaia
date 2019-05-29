@extends('admin_plantilla')

@section('content_control')
    <table id="product_table" class=" table table-striped table-bordered table-hover" style="border: none; " >
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th><a class="btn btn-success" href="/registro/producto">Registrar</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->tipo->nombre}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>
                        <div class="grupo-botones">
                            <a href="/view_producto/{{$producto->id}}" class="btn btn-success">ver</a>
                            <a href="/editar_producto/{{$producto->id}}" class="btn btn-primary">Editar</a>
                            <a href="#"  onclick="alerta({{$producto->id}})" class=" btn btn-danger">Eliminar</a>
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
            var table = $('#product_table').DataTable({
                "pageLength": 5,
                ordering:  true,
                "lengthChange": true,
                responsive: true,
                "scrollX": false
            });

            table.rows('.important').select();
        });

        function alerta(id){
            var opcion = confirm("¿Desea eliminar este Producto?");
            if (opcion == true) {
                window.location.href='/eliminar_producto/'+id;
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
