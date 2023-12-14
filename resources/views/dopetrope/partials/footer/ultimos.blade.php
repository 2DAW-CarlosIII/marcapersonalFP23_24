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

        @for ( $i = 0; $i < 5; $i++)
        <li>
            <span class="date">Nota: <strong>{{ $arrayProyectos[$i]->calificacion }}</strong></span>
            <h3><a href="#">{{ $arrayProyectos[$i]->nombre }}</a></h3>
            <p> <a href="http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]->dominio }}">
                http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]->dominio }}
                </a>
            </p>
        </li>
        @endfor
    </ul>
</section>
