@php
$arrayProyectos = [
    [
        'docente_id' => 1,
        'nombre' => 'Tecnologías de la Información',
        'dominio' => 'TecnologiaInformacion',
        'metadatos' => [
            'fecha_inicio' => '2023-01-15',
            'fecha_fin' => '2023-05-30',
            'calificacion' => 9.5
        ]
    ],
    [
        'docente_id' => 1,
        'nombre' => 'Diseño Gráfico',
        'dominio' => 'DisenyoGrafico',
        'metadatos' => [
            'fecha_inicio' => '2023-02-10',
            'fecha_fin' => '2023-06-20',
            'calificacion' => 4.0
        ]
    ],
    [
        'docente_id' => 2,
        'nombre' => 'Electrónica',
        'dominio' => 'Electronica',
        'metadatos' => [
            'fecha_inicio' => '2023-03-05',
            'fecha_fin' => '2023-07-15',
            'calificacion' => 9.2
        ]
    ],
    [
        'docente_id' => 2,
        'nombre' => 'Ingeniería Civil',
        'dominio' => 'IngenieriaCivil',
        'metadatos' => [
            'fecha_inicio' => '2023-04-20',
            'fecha_fin' => '2023-08-25',
            'calificacion' => 7.8
        ]
    ],
    [
        'docente_id' => 3,
        'nombre' => 'Gastronomía',
        'dominio' => 'Gastronomia',
        'metadatos' => [
            'fecha_inicio' => '2023-05-10',
            'fecha_fin' => '2023-09-30',
            'calificacion' => 8.5
        ]
    ],
    [
        'docente_id' => 3,
        'nombre' => 'Medicina',
        'dominio' => 'Medicina',
        'metadatos' => [
            'fecha_inicio' => '2023-06-15',
            'fecha_fin' => '2023-10-30',
            'calificacion' => 9.0
        ]
    ],
    [
        'docente_id' => 3,
        'nombre' => 'Mecatrónica',
        'dominio' => 'Mecatronica',
        'metadatos' => [
            'fecha_inicio' => '2023-07-10',
            'fecha_fin' => '2023-11-20',
            'calificacion' => 8.7
        ]
    ],
    [
        'docente_id' => 4,
        'nombre' => 'Arquitectura',
        'dominio' => 'Arquitectura',
        'metadatos' => [
            'fecha_inicio' => '2023-08-05',
            'fecha_fin' => '2023-12-15',
            'calificacion' => 8.9
        ]
    ],
    [
        'docente_id' => 4,
        'nombre' => 'Automoción',
        'dominio' => 'Automocion',
        'metadatos' => [
            'fecha_inicio' => '2023-09-10',
            'fecha_fin' => '2024-01-20',
            'calificacion' => 8.2
        ]
    ],
    [
        'docente_id' => 4,
        'nombre' => 'Turismo',
        'dominio' => 'Turismo',
        'metadatos' => [
            'fecha_inicio' => '2023-10-15',
            'fecha_fin' => '2024-02-28',
            'calificacion' => 9.4
        ]
    ],
];
@endphp

<section>
    <header>
        <h2>Mejores proyectos Marca Personal FP</h2>
    </header>
    <ul class="dates">
        @foreach ( $arrayProyectos as $proyecto)
        <li>
            <span class="date">Nota: <strong>{{ $proyecto['metadatos']['calificacion'] }}</strong></span>
            <h3><a href="#">{{ $proyecto['nombre'] }}</a></h3>
            <p> <a href="http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}">
                http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}
                </a>
            </p>
        </li>
        @endforeach
        {{--<li>
            <span class="date">Jan <strong>27</strong></span>
            <h3><a href="#">Lorem dolor sit amet veroeros</a></h3>
            <p> <a href="http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}">
                http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}
                </a>
            </p>
        </li>
        <li>
            <span class="date">Jan <strong>23</strong></span>
            <h3><a href="#">Ipsum sed blandit nisl consequat</a></h3>
            <p>Blandit phasellus lorem ipsum dolor tempor sapien tortor hendrerit adipiscing feugiat lorem.</p>
        </li>
        <li>
            <span class="date">Jan <strong>15</strong></span>
            <h3><a href="#">Magna tempus lorem feugiat</a></h3>
            <p>Dolore consequat sed phasellus lorem sed etiam nullam dolor etiam sed amet sit consequat.</p>
        </li>
        <li>
            <span class="date">Jan <strong>12</strong></span>
            <h3><a href="#">Dolore tempus ipsum feugiat nulla</a></h3>
            <p>Feugiat lorem dolor sed nullam tempus lorem ipsum dolor sit amet nullam consequat.</p>
        </li>
        <li>
            <span class="date">Jan <strong>10</strong></span>
            <h3><a href="#">Blandit tempus aliquam?</a></h3>
            <p>Feugiat sed tempus blandit tempus adipiscing nisl lorem ipsum dolor sit amet dolore.</p>
        </li>
        --}}
    </ul>
</section>
