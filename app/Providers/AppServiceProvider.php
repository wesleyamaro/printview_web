<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Regra;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\RegraPolicy;
use Illuminate\Support\Facades\Redis;


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
        if (!App::runningInConsole()) {
            $permissao = Regra::all();
            view()->share('permissao', $permissao);
        }
    }
}
