<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Ciclo;
use App\Models\Curriculo;
use App\Policies\CicloPolicy;
use App\Models\Actividad;
use App\Policies\CurriculoPolicy;
use App\Policies\ActividadPolicy;
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
