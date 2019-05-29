@extends('index.plantilla_principal')
    @section('contenido-index')
    <div class="header">
        <div class="frase-portada">
          <span>Los cómics tiene vida con aroma a café</span>
          <p>
            Somos la primera HEMEROTECA GEEK CAFÉ de la ciudad, donde
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
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/card2.jpg')
                @slot('title', 'Charla sobre Creacion de mundos')
                @slot('content', 'Leer mas')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/card3.jpg')
                @slot('title', 'Taller de Estimulación Cognitiva')
                @slot('content', 'Leer mas')
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
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto2.jpg')
                @slot('title', 'Foto2')
                @slot('content', 'Ver')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto3.jpg')
                @slot('title', 'Foto3')
                @slot('content', 'Ver')
            @endcomponent
        </div>
        <div class="box-group">
            @component('layouts.box')
                @slot('path', 'images/foto4.jpg')
                @slot('title', 'Foto4')
                @slot('content', 'Ver')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto5.jpg')
                @slot('title', 'Foto5')
                @slot('content', 'Ver')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto6.jpg')
                @slot('title', 'Foto6')
                @slot('content', 'Ver')
            @endcomponent
        </div>
        <div class="box-group">
            @component('layouts.box')
                @slot('path', 'images/foto7.jpg')
                @slot('title', 'Foto7')
                @slot('content', 'Ver')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto8.jpg')
                @slot('title', 'Foto8')
                @slot('content', 'Ver')
            @endcomponent
            @component('layouts.box')
                @slot('path', 'images/foto9.jpg')
                @slot('title', 'Foto9')
                @slot('content', 'Ver')
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
        <h1>¿Quieres venir?</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.5198496454823!2d-74.82288418563736!3d10.99956879217036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef42db2afd05df7%3A0xac6beca02c162ae6!2sTierra+de+C%C3%B3mics!5e0!3m2!1ses-419!2sco!4v1557775162645!5m2!1ses-419!2sco" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
      </div>
    @endsection
