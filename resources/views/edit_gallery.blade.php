@extends('admin_plantilla')
    @section('content_control')
            @isset($datos)
                <h1 class="display-3 text-center">Editar  Galeria</h1><br>
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ingrese Correctamente los Datos
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
                <div class="contenedor-form">

                        <form  action="/edit_gallery/{{$datos->id}}"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input  name="nombre" value="{{$datos->Nombre}}"  class="inputs form-control" id="nombre_id"  type="text" placeholder="Nombre de la publicación">
                        <textarea name="desc" class="inputs form-control"placeholder="Digite la Descripcion">{{$datos->Description}}</textarea>
                        <input type="hidden" name="id" value="{{ $datos->id }}" type="text">
                        <div class="inputs input-group mb-3 filec">
                                <div class="custom-file">
                                  <input type="file" class="inputs custom-file-input" name="myFile[]"multiple id="myFile">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                        </div>
                        <div class="grupo-botones">
                            <button type="submit" class="inputs btn btn-primary">Editar Galeria</button>
                            <a href="/admin/gallery" class="inputs btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                    <div id="preview" class="preview">
                            <div id="carouselExampleControls" class="carousel slide"  data-ride="carousel">


                                    <div id="carousel_id" class="carousel-inner">
                                        @foreach ($datos->galeria_imagenes as $item)
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
                    // Escuchamos el evento 'change' del input donde cargamos el archivo
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
                 @endisset
                 @if (!isset($datos))
                     <h1>Publicación no encontrada en la base de datos</h1>
                 @endif
    @endsection

