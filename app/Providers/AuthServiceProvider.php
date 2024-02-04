<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Actividad;
use App\Policies\ActividadPolicy;
use App\Models\Competencia;
use App\Policies\CompetenciaPolicy;
use App\Models\Ciclo;
use App\Policies\CicloPolicy;
use App\Models\Curriculo;
use App\Policies\CurriculoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Curriculo::class => CurriculoPolicy::class,
        Competencia::class => CompetenciaPolicy::class,
        Ciclo::class => CicloPolicy::class,
        Actividad::class => ActividadPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
