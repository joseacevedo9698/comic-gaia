@extends('admin_plantilla')
    @section('content_control')
        <div class="libro-content">
                @if (!empty($libro->img_path))
                    <img src="{{ $libro->img_path }}" alt="">
                @else
                <img src="{{ asset('images/empty-img.png') }}" alt="{{$libro->titulo->Nombre}}">
                @endif
            <div class="info-libro">
                <h1 class="text-capitalize">{{$libro->titulo->Nombre}}</h2>
                <h5>Ejemplares disponibles: {{$libro->ejemplares}}</h4>

                <ul>
                    <li class="text-capitalize"><span>Autores:</span>
                        @foreach ($libro->autors as $item)
                            {{$item->Nombre}}.
                        @endforeach
                    </li>
                    <li><span>Dibujante:</span> Justin Ponsor</li>
                    <li><span>Editorial:</span> Marvel</li>
                <li class="text-capitalize"><span>publicación: {{$libro->ano_public}}</span>

                    </li>
                <li class="text-capitalize"><span>Volumen:</span> {{$libro->volumen}}</li>
                    <li class="text-capitalize"><span>Genero:</span>
                        @foreach ($libro->generos as $item)
                            {{$item->Nombre}}.
                        @endforeach
                    </li>
                </ul>

                <p >{{$libro->sinopsis}}</p>
            </div>
            <div class="grupo-prefer">
                    <a href="/editar_libro/{{$libro->id}}" class="btn botones-prefer">Editar</a><a href="#" class="btn btn-danger" onclick="alerta({{$libro->id}})">eliminar</a>
            </div>
        </div>
        <div class="comments">

        </div>
        <script>

            function alerta(id){
                var opcion = confirm("¿Desea eliminar este libro?");
                if (opcion == true) {
                    window.location.href='/eliminar_libro/'+id;
                }

            }
        </script>
    @endsection
