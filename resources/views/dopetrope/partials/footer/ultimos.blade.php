<section>
    <header>
        <h2>Mejores proyectos Marca Personal FP</h2>
    </header>
    <ul class="dates">

        @php $arrayProyectos = \App\Models\Proyecto::mejoresProyectos(5); @endphp

        @foreach ( $arrayProyectos  as $proyecto)
            <li>
                <span class="date">Nota: <strong>{{ $proyecto->calificacion }}</strong></span>
                <h3><a href="{{ $proyecto->dominio }}">{{ $proyecto->nombre }}</a></h3>
                <p> <a href="http://github.com/2DAW-CarlosIII/{{ $proyecto->calificacion }}">
                    http://github.com/2DAW-CarlosIII/{{ $proyecto->nombre }}
                    </a>
                </p>
            </li>
        @endforeach
    </ul>
</section>
