@extends('admin_plantilla')
    @section('content_control')
        <div class="libro-content">
            <img src="{{ asset('images/prueba1.jpg') }}" alt="">
            <div class="info-libro">
                <h1>Civil War II</h2>
                <h5>Ejemplares disponibles: 5</h4>

                <ul>
                    <li><span>Autores:</span> Brian Bendis </li>
                    <li><span>Dibujante:</span> Justin Ponsor</li>
                    <li><span>Editorial:</span> Marvel</li>
                    <li><span>publicación:</span> Junio 2016 </li>
                    <li><span>Volumen:</span> 1 </li>
                    <li><span>Genero:</span> Superheroes</li>
                </ul>

                <p>El arco argumental fue precedido por una serie conjunta de cómic titulada "Camino a Civil War II". Civil War II también está vinculada a varias series limitadas nuevas que incluye: Civil War II: The Amazing Spider-man, Civil War II: Choosing Sides, Civil War II: Gods of War, Civil War II: Kingpin, Civil War II: Ulysses, y Civil War II: X-Men, los One Shot: Civil War II: The Accused and Civil War II: The Fallen así como varias series en curso. La liberación de la serie estuvo planificada para ser comercializada junto al estreno de la película de Marvel Studios, Capitán América: Guerra Civil.</p>
            </div>
            <div class="grupo-prefer">
                    <a href="#" class="btn botones-prefer">Editar</a><a href="#" class="btn btn-danger">eliminar</a>
            </div>
        </div>
        <div class="comments">
            
        </div>
    @endsection