<?php

namespace Mods\Backend;

use Mods\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class BackendServiceProvider extends ServiceProvider
{

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'backend' => Http\Middleware\Authenticate::class,
        'backend_guest' => Http\Middleware\RedirectIfAuthenticated::class,         
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->loadViewsFrom(__DIR__.'/../view', 'backend');
        $this->loadAssetsFrom(__DIR__.'/../assets', 'backend', 'backend');


        $this->loadTranslationsFrom(__DIR__.'/../lang', 'backend');

        $this->publishes([
           __DIR__.'/../lang' => resource_path('lang/vendor/backend'),
        ]);


        $this->mergeRecursiveConfigFrom(
            __DIR__.'/../config/auth.php', 'auth'
        );

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $router = $this->app['router'];

        foreach ($this->routeMiddleware as $key => $middleware) {
            $router->aliasMiddleware($key, $middleware);
        }
    }
}
