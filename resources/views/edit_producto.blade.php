@extends('admin_plantilla')
    @section('content_control')
                <h1 class="display-3 text-center">Editar Producto</h1><br>
                <div class="contenedor-form">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Ingrese Correctamente los Datos
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                        <form  action="/actualizar_product"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $producto->id }}" type="text">
                        <input value="{{$producto->nombre}}" name="nombre"  class="inputs form-control" id="nombre_id"  type="text" placeholder="Nombre del Producto">
                        <input  name="precio"   value="{{$producto->precio}}" class="inputs form-control" id="precio"  type="number" placeholder="Precio">
                        <select class="inputs form-control "name="tipo" required>
                                <option value="" disabled selected>Seleccione el tipo</option>
                                @foreach ($tipo as $g)
                                    @if ($producto->tipo_id == $g->id)
                                        <option value="{{$g->id}}" selected>{{$g->nombre}}</option>
                                    @else
                                        <option value="{{$g->id}}">{{$g->nombre}}</option>
                                    @endif
                                @endforeach
                        </select>

                        <textarea name="desc"  class="inputs form-control"placeholder="Digite la Descripcion">{{$producto->descripcion}}</textarea>
                        <div class="inputs input-group mb-3 filec">
                                <div class="custom-file">
                                  <input type="file" class="inputs custom-file-input" name="myFile[]"multiple id="myFile">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                        </div>
                        <div class="grupo-botones">
                            <button type="submit" class="inputs btn btn-primary">Actualizar Producto</button>
                            <a href="/admin/products" class="inputs btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                    <div id="preview" class="preview">
                            <div id="carouselExampleControls" class="carousel slide"  data-ride="carousel">


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
<script>

            $(document).ready(function() {
                    $('#carouselExampleControls').carousel();
                    $('.carousel-item').first().addClass('active');



                    $(document).on('change', 'input[type=file]', function(e) {
                    // Obtenemos la ruta temporal mediante el evento

                         var carousel = document.getElementById('carousel_id');
                         carousel.innerHTML='';
                        var input = document.getElementById('myFile');
                        let complemento ='';
                         for (var x = 0; x < input.files.length; x++) {
                            var TmpPath = URL.createObjectURL(e.target.files[x]);
                            $('<div class="carousel-item"><img class="d-block w-100" src="'+TmpPath  +'" alt=""></div>').appendTo('.carousel-inner');
                            $('#carouselExampleControls').carousel();
                            $('.carousel-item').first().addClass('active');
                         }

                    });
            });




</script>

@endsection
