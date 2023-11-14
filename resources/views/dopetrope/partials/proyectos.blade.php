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
    <header class="major">
        <h2>My Portfolio</h2>
    </header>

    <div class="row">

        @for ($i=0; $i<count($arrayProyectos); $i++)

        <div class="col-4 col-6-medium col-12-small">
            <section class="box">
                <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
                <header>
                    <h3>{{ $arrayProyectos[$i]['nombre'] }}</h3>
                </header>
                <p>
                    <a href="http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]['dominio'] }}">
                        http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]['dominio'] }}
                    </a>
                </p>
                <footer>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Más info</a></li>
                    </ul>
                </footer>
            </section>
        </div>

        @endfor

    </div>
</section>
