<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use App\Models\Regra;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\RegraPolicy;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Força o HTTPS se o ambiente não for 'local'
    if ($this->app->environment('production', 'staging')) {
        URL::forceScheme('https');
    }

        if (!App::runningInConsole()) {
            $permissao = Regra::all();
            view()->share('permissao', $permissao);
        }
    }
}
