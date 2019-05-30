@extends('admin_plantilla')
@section('content_control')
<div class="producto-content">
    <div id="preview_carousel" class="preview_carousel">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">


            <div id="carousel_id" class="carousel-inner">
                @foreach ($producto->producto_imagenes as $item)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{$item->path_img}}">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <div class="info-producto">
        <h1 class="text-capitalize">{{$producto->nombre}}</h2>
            <h5><span>Precio:</span> {{$producto->precio}}</h4>

                <ul>
                    <li class="text-capitalize"><span>Tipo:</span>
                        {{$producto->tipo->nombre}}
                    </li>
                </ul>

                <p>{{$producto->descripcion}}</p>
    </div>
    <div class="grupo-prefer">
        <a href="/editar_producto/{{$producto->id}}" class="btn botones-prefer">Editar</a><a href="#"
            class="btn btn-danger" onclick="alerta({{$producto->id}})">eliminar</a>
    </div>
</div>
<div class="comments">

</div>
<script>
    $(document).ready(function() {
                    $('#carouselExampleControls').carousel();
                    $('.carousel-item').first().addClass('active');
    });
    function alerta(id) {
        var opcion = confirm("¿Desea eliminar este libro?");
        if (opcion == true) {
            window.location.href = '/eliminar_producto/' + id;
        }

    }

</script>
@endsection
