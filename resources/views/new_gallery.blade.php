@extends('admin_plantilla')
    @section('content_control')
                <h1 class="display-3 text-center">Registrar Nueva Galeria</h1><br>
                <div class="contenedor-form">
                        <form  action="/registro_gallery"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input  name="nombre"  class="inputs form-control" id="nombre_id"  type="text" placeholder="Nombre de la publicación">
                        {{-- <input  name="fecha"  class="inputs form-control" id="fecha"  type="date" placeholder="Fecha de publicación"> --}}
                        <textarea name="desc" class="inputs form-control"placeholder="Digite la Descripcion"></textarea>
                        <div class="inputs input-group mb-3 filec">
                                <div class="custom-file">
                                  <input type="file" class="inputs custom-file-input" name="myFile[]"multiple id="myFile">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                        </div>
                        <div class="grupo-botones">
                            <button type="submit" class="inputs btn btn-primary">Registrar Producto</button>
                            <a href="/admin/gallery" class="inputs btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                    <div id="preview" class="preview">
                            <div id="carouselExampleControls" class="carousel slide"  data-ride="carousel">


                                    <div id="carousel_id" class="carousel-inner">
                                            <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{ asset('images/empty-img.png') }}">
                                            </div>
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
    @endsection
