<!DOCTYPE html>
<html lang="en">
<head>
    <link
      href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i"
      rel="stylesheet"
    />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="expires" content="-1" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> --}}
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery.easy-autocomplete.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/index-styles.css')}}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
</head>
<body>
  <div class="content">
    <ul>
      <li><a href="/libros"> Comics</a></li>
      <li><a href="#"> Eventos</a></li>
      <li><a href="#"> Cafeteria</a></li>
      <li id="home">
        <img src="{{ asset('images/icono2.png') }}" alt="" />
      </li>
      <li><a href="#"> Galeria</a></li>
      <li><a href="#"> Reseñas</a></li>
      <li><a href="#"> Contacto</a></li>
    </ul>
    @yield('contenido-index')

</div>
        <div class="footer">
            <div class="background-separador"></div>
            <div class="contenido-footer">
                <div class="info-local">
                    <span>Tierra de Comics - Funpropelco</span>
                    <span>Cra 43 # 84-95</span>
                    <span>Barranquilla - Atlantico</span>
                    <span>301 565 8767</span>
                  </div>
                  <img src="{{ asset('images/logo-nombre.png') }}" alt="">
                  <div class="redes">
                      <span>@Tierradecomicsbaq</span>
                      <span>@Tierradecomicsbaq</span>
                  </div>
            </div>


</body>
</html>
