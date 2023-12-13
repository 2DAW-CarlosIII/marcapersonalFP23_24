<section>
    <header>
        <h2>Mejores proyectos Marca Personal FP</h2>
    </header>
    <ul class="dates">

        @php $arrayProyectos = \App\Models\Proyecto::mejoresProyectos(5); @endphp

        @for ( $i = 0; $i < count($arrayProyectos); $i++)
            <li>
                <span class="date">Nota: <strong>{{ $arrayProyectos[$i]->calificacion }}</strong></span>
                <h3><a href="{{ $arrayProyectos[$i]->dominio }}">{{ $arrayProyectos[$i]->nombre }}</a></h3>
                <p> <a href="http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]->calificacion }}">
                    http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]->nombre }}
                    </a>
                </p>
            </li>
        @endfor
    </ul>
</section>
