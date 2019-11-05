@extends('index.plantilla_principal')
    @section('contenido-index')
    <div class="header">
        <div class="frase-portada">
          <span>Los cómics tiene vida con aroma a café</span>
          <p>
            Somos la primera HEMEROTECA GEEK CAFÉ de la ciudas+d, donde
            encontraras mas de 800 cómics disponible para leer totalmente
            gratis, acompañado de un buen café.
          </p>
        </div>
      </div>
      <div class="destacado">
        <h1>Destacado</h1>
        <div class="box-group">
            @component('layouts.box')
                @slot('path', 'images/card1.jpg')
                @slot('title', 'Charlas Domingueras')
                @slot('content', 'Leer mas')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/card2.jpg')
                @slot('title', 'Charla sobre Creacion de mundos')
                @slot('content', 'Leer mas')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/card3.jpg')
                @slot('title', 'Taller de Estimulación Cognitiva')
                @slot('content', 'Leer mas')
                @slot('link','#')
            @endcomponent
        </div>
      </div>
      <div class="separador">
        <div class="background-separador"></div>
        <div class="contenido-separador">
          <span></span>
        </div>
      </div>
      <div class="fotos">
        <h1>Nuestras Fotos</h1>
        <div class="box-group">
            @component('layouts.box')
                @slot('path', 'images/foto1.jpg')
                @slot('title', 'Foto1')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto2.jpg')
                @slot('title', 'Foto2')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto3.jpg')
                @slot('title', 'Foto3')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
        </div>
        <div class="box-group">
            @component('layouts.box')
                @slot('path', 'images/foto4.jpg')
                @slot('title', 'Foto4')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto5.jpg')
                @slot('title', 'Foto5')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto6.jpg')
                @slot('title', 'Foto6')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
        </div>
        <div class="box-group">
            @component('layouts.box')
                @slot('path', 'images/foto7.jpg')
                @slot('title', 'Foto7')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto8.jpg')
                @slot('title', 'Foto8')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto9.jpg')
                @slot('title', 'Foto9')
                @slot('content', 'Ver')
                @slot('link','#')
            @endcomponent
        </div>
        <h5>Cargar más...</h1>
      </div>
      <div class="separador">
        <div class="background-separador"></div>
        <div class="contenido-separador">
          <span></span>
        </div>
      </div>
      <div class="mapa">
         <div id="twitch-embed"></div>

        <!-- Load the Twitch embed script -->
        <script src="https://embed.twitch.tv/embed/v1.js"></script>
    
        <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
        <script type="text/javascript">
            new Twitch.Embed("twitch-embed", {
                width: 854,
                height: 480,
                channel: "kenriusaky"
            });
        </script>
      </div>


      </div>
    @endsection
