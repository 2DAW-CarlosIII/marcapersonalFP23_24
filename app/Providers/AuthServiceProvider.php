<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Curriculo;
use App\Models\FamiliaProfesional;
use App\Models\Idioma;
use App\Policies\CurriculoPolicy;
use App\Policies\FamiliaProfesionalPolicy;
use App\Policies\IdiomaPolicy;
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
        Idioma::class => IdiomaPolicy::class,
        FamiliaProfesional::class => FamiliaProfesionalPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
