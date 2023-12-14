@php
$arrayProyectos= array();
$arrayProyectos = \App\Models\Proyecto::mejoresProyectos(5); @endphp
{{-- TODO Falta implementar ordenar por las mejores clasificación
    Realizado por Jose J, Maria del Mar Marin, Jose Alejandro, Carlos.
--}}
<section>
    <header>
        <h2>Mejores proyectos Marca Personal FP</h2>
    </header>
    <ul class="dates">

        @foreach ($arrayProyectos  as $proyecto)
        <li>
            <span class="date">Nota: <strong>{{ $proyecto->calificacion }}</strong></span>
            <h3><a href="#">{{ $proyecto->nombre }}</a></h3>
            <p> <a href="http://github.com/2DAW-CarlosIII/{{ $proyecto->dominio }}">
                http://github.com/2DAW-CarlosIII/{{ $proyecto->dominio }}
                </a>
            </p>
        </li>
        @endforeach
    </ul>
</section>
