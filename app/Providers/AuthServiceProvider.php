<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Curriculo;
use App\Models\Reconocimiento;
use App\Policies\CurriculoPolicy;
use App\Policies\ReconocimientoPolicy;
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
        Reconocimiento::class => ReconocimientoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
