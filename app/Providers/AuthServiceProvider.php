<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Actividad;
use App\Policies\ActividadPolicy;
use App\Models\Competencia;
use App\Policies\CompetenciaPolicy;
use App\Models\Ciclo;
use App\Models\CicloEstudiado;
use App\Policies\CicloEstudiantePolicy;
use App\Policies\CicloPolicy;
use App\Models\Curriculo;
use App\Policies\CurriculoPolicy;
use App\Models\Empresa;
use App\Policies\EmpresaPolicy;
use App\Models\FamiliaProfesional;
use App\Policies\FamiliaProfesionalPolicy;
use App\Models\Idioma;
use App\Models\IdiomaConocido;
use App\Policies\IdiomaEstudiantePolicy;
use App\Models\Participante;
use App\Policies\IdiomaPolicy;
use App\Models\Proyecto;
use App\Policies\ProyectoPolicy;
use App\Models\Reconocimiento;
use App\Policies\ReconocimientoPolicy;
use App\Models\User;
use App\Policies\ParticipantePolicy;
use App\Policies\UsersPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Actividad::class => ActividadPolicy::class,
        Ciclo::class => CicloPolicy::class,
        Competencia::class => CompetenciaPolicy::class,
        Curriculo::class => CurriculoPolicy::class,
        Empresa::class => EmpresaPolicy::class,
        FamiliaProfesional::class => FamiliaProfesionalPolicy::class,
        Idioma::class => IdiomaPolicy::class,
        Proyecto::class => ProyectoPolicy::class,
        Reconocimiento::class => ReconocimientoPolicy::class,
        Participante::class => ParticipantePolicy::class,
        User::class => UsersPolicy::class,
        CicloEstudiado::class => CicloEstudiantePolicy::class,
        IdiomaConocido::class => IdiomaEstudiantePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
