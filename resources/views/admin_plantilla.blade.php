<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin_plantilla.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro_style.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/easy-autocomplete.themes.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery.easy-autocomplete.min.js')}}"></script>
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <div class="sidebar">
            <ul>
                <li class="tittle-side"><a href="#"><img src="{{ asset('images/Icons/007-menu.png') }}" alt=""><span>Opciones</span></a></li>
                <li><a href="/admin/libros"><img src="{{ asset('images/Icons/001-open-book.png') }}" alt=""><span>Libros</span></a></li>
                <li><a href="/admin/products"><img src="{{ asset('images/Icons/002-fast-food.png') }}" alt=""><span>Productos</span></a></li>
                <li><a href="#"><img src="{{ asset('images/Icons/003-rating.png') }}" alt=""><span>Reseñas</span></a></li>
                <li><a href="#"><img src="{{ asset('images/Icons/004-convention.png') }}" alt=""><span>Eventos</span></a></li>
                <li><a href="/admin/gallery"><img src="{{ asset('images/Icons/005-gallery.png') }}" alt=""><span>Galeria</span></a></li>
                <li><a href="#"><img src="{{ asset('images/Icons/006-contact.png') }}" alt=""><span>Contacto</span></a></li>
                <li class="tittle-side settings"><a href="#"><img src="{{ asset('images/Icons/008-settings.png') }}" alt=""><span>Preferencias</span></a></li>
            </ul>
        </div>

        <div class="content">
            <div class="sidebar_sup">
                    <form action="{{route('logout')}}" method="POST">
                        {{ csrf_field() }}
                        <button>Salir</button>
                    </form>
            </div>
            <div class="content-gen">
                    @yield('content_control')
            </div>
        </div>
    </div>

</body>
</html>
