{
    "id": 1,
    "name": "admin",
    "nombre": "Dawn",
    "apellidos": "Runolfsson",
    "email": "admin@marcapersonalfp.es",
    "email_verified_at": "2024-01-25T10:53:02.000000Z",
    "created_at": "2024-01-25T10:53:02.000000Z",
    "updated_at": "2024-01-25T10:53:02.000000Z",
    "avatar": "https://source.unsplash.com/random/200x200/?persona",
    "sobre_mi": "Desarrolladora web con experiencia en la creación de sitios web interactivos y modernos. En constante búsqueda de nuevas tendencias.",
    "curriculo": {
    "id": 1,
    "user_id": 1,
    "video_curriculum": "Ds8lRXWfoPE",
    "created_at": "2024-01-25T10:53:02.000000Z",
    "updated_at": "2024-01-25T10:53:02.000000Z",
    "pdf_curriculum": null
    },
    "idiomas": [
        {
            "id": 2,
            "alpha2":"EN",
            "native_name": "Inglés",
            "created_at": null,
            "updated_at": null,
            "nivel": "B2",
            "certificado": 1
            },
        {
        "id": 4,
        "alpha2":"DE",
        "native_name": "Alemán",
        "created_at": null,
        "updated_at": null,
        "nivel": "A2",
        "certificado": 0
    },
    {
        "id": 28,
        "alpha2":"SR",
        "native_name": "Serbio",
        "created_at": null,
        "updated_at": null,
        "nivel": "A1",
        "certificado": 0
        }

    ],
    "actividades": [
    {
    "id": 2,
    "docente_id": 2,
    "nombre": "F.P. Sin Barreras",
    "insignia": "fab fa-opera",
    "created_at": "2024-01-25T10:53:02.000000Z",
    "updated_at": "2024-01-25T10:53:02.000000Z",
    "laravel_through_key": 1,
    "reconocimientos": [
    {
    "id": 1,
    "estudiante_id": 1,
    "actividad_id": 2,
    "documento": "https://drive.google.com/document/d/KPkTFrB1nub",
    "docente_validador": null,
    "fecha": "05/12/2022",
    "created_at": "2024-01-25T10:53:02.000000Z",
    "updated_at": "2024-01-25T10:53:02.000000Z"
    }
    ],
    "competencias": []
    }
    ],
    "proyectos": [
    {
    "id": 10,
    "docente_id": 4,
    "nombre": "Turismo",
    "dominio": "Turismo",
    "metadatos": "a:3:{s:12:\"fecha_inicio\";s:10:\"2023-10-15\";s:9:\"fecha_fin\";s:10:\"2024-02-28\";s:12:\"calificacion\";d:9.4;}",
    "created_at": "2024-01-25T10:53:03.000000Z",
    "updated_at": "2024-01-25T10:53:03.000000Z",
    "calificacion": 3,
    "fichero": null,
    "pivot": {
    "estudiante_id": 1,
    "proyecto_id": 10
    },
    "ciclos": [
    {
    "id": 34,
    "codCiclo": "SECO1",
    "codFamilia": "COM",
    "familia_id": 6,
    "grado": "BÁSICA",
    "nombre": "Profesional Básico en Servicios Comerciales",
    "created_at": null,
    "updated_at": null,
    "pivot": {
    "proyecto_id": 10,
    "ciclo_id": 34
    },
    "familia_profesional": {
    "id": 6,
    "codigo": "COM",
    "nombre": "COMERCIO Y MARKETING",
    "created_at": null,
    "updated_at": null
    }
    },
    {
    "id": 117,
    "codCiclo": "PEES1",
    "codFamilia": "IMP",
    "familia_id": 15,
    "grado": "BÁSICA",
    "nombre": "Profesional Básico en Peluquería y Estética",
    "created_at": null,
    "updated_at": null,
    "pivot": {
    "proyecto_id": 10,
    "ciclo_id": 117
    },
    "familia_profesional": {
    "id": 15,
    "codigo": "IMP",
    "nombre": "IMAGEN PERSONAL",
    "created_at": null,
    "updated_at": null
    }
    },
    {
    "id": 166,
    "codCiclo": "EPCI2",
    "codFamilia": "SEA",
    "familia_id": 22,
    "grado": "G.M.",
    "nombre": "Técnico en Emergencias y Protección Civil",
    "created_at": null,
    "updated_at": null,
    "pivot": {
    "proyecto_id": 10,
    "ciclo_id": 166
    },
    "familia_profesional": {
    "id": 22,
    "codigo": "SEA",
    "nombre": "SEGURIDAD Y MEDIO AMBIENTE",
    "created_at": null,
    "updated_at": null
    }
    }
    ],
    "estudiantes": [
    {
    "id": 1,
    "name": "admin",
    "nombre": "Dawn",
    "apellidos": "Runolfsson",
    "email": "admin@marcapersonalfp.es",
    "email_verified_at": "2024-01-25T10:53:02.000000Z",
    "created_at": "2024-01-25T10:53:02.000000Z",
    "updated_at": "2024-01-25T10:53:02.000000Z",
    "avatar": null,
    "pivot": {
    "proyecto_id": 10,
    "estudiante_id": 1
    }
    }
    ]
    }
    ],
    "competencias": [],
    "ciclos": [
        {
            "id": 34,
            "codCiclo": "SECO1",
            "codFamilia": "COM",
            "familia_id": 6,
            "grado": "B\u00c1SICA",
            "nombre": "Profesional B\u00e1sico en Servicios Comerciales",
            "created_at": null,
            "updated_at": null,
            "pivot": {
                "proyecto_id": 10,
                "ciclo_id": 34
            },
            "familia_profesional": {
                "id": 6,
                "codigo": "COM",
                "nombre": "COMERCIO Y MARKETING",
                "created_at": null,
                "updated_at": null
            }
        },
        {
            "id": 117,
            "codCiclo": "PEES1",
            "codFamilia": "IMP",
            "familia_id": 15,
            "grado": "B\u00c1SICA",
            "nombre": "Profesional B\u00e1sico en Peluquer\u00eda y Est\u00e9tica",
            "created_at": null,
            "updated_at": null,
            "pivot": {
                "proyecto_id": 10,
                "ciclo_id": 117
            },
            "familia_profesional": {
                "id": 15,
                "codigo": "IMP",
                "nombre": "IMAGEN PERSONAL",
                "created_at": null,
                "updated_at": null
            }
        },
        {
            "id": 166,
            "codCiclo": "EPCI2",
            "codFamilia": "SEA",
            "familia_id": 22,
            "grado": "G.M.",
            "nombre": "T\u00e9cnico en Emergencias y Protecci\u00f3n Civil",
            "created_at": null,
            "updated_at": null,
            "pivot": {
                "proyecto_id": 10,
                "ciclo_id": 166
            },
            "familia_profesional": {
                "id": 22,
                "codigo": "SEA",
                "nombre": "SEGURIDAD Y MEDIO AMBIENTE",
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}