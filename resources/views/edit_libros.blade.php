@extends('admin_plantilla')
    @section('content_control')
                <h1 class="display-3 text-center">Editar Libro</h1>
                @isset($datos)
                <div class="contenedor-form">
                        <form  action="/actualizar/update"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $datos->id }}" type="text">
                            <input  name="titulo_id"  value="{{$datos->titulo->Nombre}}" class="inputs form-control" id="titulo_id"  type="text" placeholder="Titulo">
                            <input class="inputs form-control"
                            @foreach ($datos->autors as $item)
                                value = "{{$item->Nombre}}"
                            @endforeach
                            name="autor_id"  id="autor_id" type="text" placeholder="Autor">
                            <input class="inputs form-control" name="dibujante_id"
                            @foreach ($datos->dibujantes as $item)
                                value = "{{$item->Nombre}}"
                            @endforeach
                            id="dibujante_id" type="text" placeholder="Dibujante">
                            <select class="inputs form-control "name="tipo_id"  required>
                                <option value="" disabled>Seleccione el tipo</option>
                                @foreach ($tipo as $g)
                                    @if ($g->id == $datos->tipo->id)
                                        <option value="{{$g->id}}" selected>{{$g->Nombre}}</option>
                                    @else
                                    <option value="{{$g->id}}">{{$g->Nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="genero_id" class="inputs form-control">
                                {{$ident=-1}}
                                <option value="" disabled selected>Seleccione el genero</option>
                                @foreach ($genero as $g)

                                    @foreach ($datos->generos as $item)
                                        @if ($g->id == $item->id)
                                            <option value="{{$g->id}}" selected>{{$g->Nombre}}</option>
                                            $ident=$g->id;
                                            @break
                                        @endif
                                    @endforeach
                                    @if (($g->id != $ident))
                                            <option value="{{$g->id}}">{{$g->Nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input class="inputs form-control" name="editorial_id" value="{{$datos->editorial->Nombre}}"  id="editorial_id" type="text" placeholder="Editorial">
                            <select name="idioma_id" class="inputs form-control">
                                <option value="" disabled selected>Seleccione el idioma</option>
                                @foreach ($idioma as $g)
                                    @if ($g->id == $datos->idioma->id)
                                        <option value="{{$g->id}}" selected>{{$g->Nombre}}</option>
                                    @else
                                    <option value="{{$g->id}}">{{$g->Nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input class="inputs form-control" type="date" name="ano_public" value="{{ $datos->ano_public }}"  id="ano_public" placeholder="Fecha de publicacion">
                            <input class="inputs form-control" type="number" name="volumen" value="{{$datos->volumen}}"  id="volumen" placeholder="Volumen">
                            <textarea name="sinopsis" class="inputs form-control"placeholder="Digite sinopsis" >{{$datos->sinopsis}}</textarea>
                            <input class="inputs form-control" type="number" name="ejemplares" id="ejemplares" value="{{$datos->ejemplares}}"  placeholder="Ejemplares">
                            <div class="inputs input-group mb-3 filec">
                                    <div class="custom-file">
                                      <input type="file" class="inputs custom-file-input" name="myFile" id="myFile">
                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                            </div>
                            <div class="grupo-botones">
                                    <button type="submit" class="inputs btn btn-primary">Editar Libro</button>
                                    <a href="/admin" class="inputs btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                        <div id="preview">
                            @if (!empty($datos->img_path))
                                <img src="{{ $datos->img_path }}" alt="">
                            @else
                                <img src="{{ asset('images/empty-img.png') }}" alt="">
                            @endif
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
                @endisset
                @if (!isset($datos))
                    <h1>Libro no encontrado en la base de datos</h1>
                @endif
    @endsection
