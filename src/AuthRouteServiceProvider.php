<?php

namespace Mods\Backend;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as IlluminateServiceProvider;

class AuthRouteServiceProvider extends IlluminateServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Mods\Backend\Http\Controllers';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }


    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {       
        $this->mapBackendWebRoutes($router);
    }


    /**
     * Define the "backend web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    private function mapBackendWebRoutes(Router $router)
    {
        $router->group([
            'middleware' => config('backend.middleware', ['web']),
            'prefix' => config('backend.prefix', 'admin'),
            'as' => 'backend.'
        ], function ($router) {
            $this->registerBackendRoutes($router);
        });
    }

    /**
     * Define the "backend web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function registerBackendRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace
        ], function ($router) {
            require __DIR__.'/../routes/auth.php';
        });
    }
}
