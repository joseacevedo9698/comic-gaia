@extends('admin_plantilla')
    @section('content_control')
                <div class="contenedor-form">
                    <form  action="/registro/insertion"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input  name="titulo_id"  class="inputs form-control" id="titulo_id"  type="text" placeholder="Titulo">
                        <input class="inputs form-control" name="autor_id"  id="autor_id" type="text" placeholder="Autor">
                        <input class="inputs form-control" name="dibujante_id"  id="dibujante_id" type="text" placeholder="Dibujante">
                        <select class="inputs form-control "name="tipo_id" required>
                            <option value="" disabled selected>Seleccione el tipo</option>
                            @foreach ($tipo as $g)
                                <option value="{{$g->id}}">{{$g->Nombre}}</option>
                            @endforeach
                        </select>
                        <select name="genero_id" class="inputs form-control">
                            <option value="" disabled selected>Seleccione el genero</option>
                            @foreach ($genero as $g)
                                <option value="{{$g->id}}">{{$g->Nombre}}</option>
                            @endforeach
                        </select>
                        <input class="inputs form-control" name="editorial_id"  id="editorial_id" type="text" placeholder="Editorial">
                        <select name="idioma_id" class="inputs form-control">
                            <option value="" disabled selected>Seleccione el idioma</option>
                            @foreach ($idioma as $g)
                                <option value="{{$g->id}}">{{$g->Nombre}}</option>
                            @endforeach
                        </select>
                        <input class="inputs form-control" type="date" name="ano_public"  id="ano_public" placeholder="Fecha de publicacion">
                        <input class="inputs form-control" type="number" name="volumen"  id="volumen" placeholder="Volumen">
                        <textarea name="sinopsis" class="inputs form-control"placeholder="Digite sinopsis"></textarea>
                        <input class="inputs form-control" type="number" name="ejemplares" id="ejemplares"  placeholder="Ejemplares">
                        <div class="inputs input-group mb-3 filec">
                                <div class="custom-file">
                                  <input type="file" class="inputs custom-file-input" name="myFile" id="myFile">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                        </div>
                        <div class="grupo-botones">
                            <button type="submit" class="inputs btn btn-primary">Registrar</button>
                        <a href="/admin" class="inputs btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                    <div id="preview">
                        <img src="{{ asset('images/empty-img.png') }}" alt="">
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $("#titulo_id").easyAutocomplete({
                adjustWidth:false,  
                url: function(search) {
                    return "{{route('titulo.fetch')}}?search=" + search;
                },
                getValue: "nombre",
                list: {
                    maxNumberOfElements: 5,
                    match: {
                        enabled: true
                    }
                }
                });
    
                $("#autor_id").easyAutocomplete({
                url: function(search) {
                    return "{{route('autor.fetch')}}?search=" + search;
                },
                getValue: "nombre",
                list: {
                    maxNumberOfElements: 5,
                    match: {
                        enabled: true
                    }
                }
                });
    
                $("#dibujante_id").easyAutocomplete({
                adjustWidth: false,
                url: function(search) {
                    return "{{route('dibujante.fetch')}}?search=" + search;
                },
                getValue: "nombre",
                list: {
                    maxNumberOfElements: 5,
                    match: {
                        enabled: true
                    }
                }
                });
    
                $("#editorial_id").easyAutocomplete({
                url: function(search) {
                    return "{{route('editorial.fetch')}}?search=" + search;
                },
                getValue: "nombre",
                list: {
                    maxNumberOfElements: 5,
                    match: {
                        enabled: true
                    }
                }

                });
    
    
    
                document.getElementById("myFile").onchange = function(e) {
                    let reader = new FileReader();
                  
                  reader.onload = function(){
                    let preview = document.getElementById('preview'),
                            image = document.createElement('img');
                
                    image.src = reader.result;
                    
                    preview.innerHTML = '';
                    preview.append(image);
                  };
                 
                  reader.readAsDataURL(e.target.files[0]);
                }
                </script>
    
    @endsection

            