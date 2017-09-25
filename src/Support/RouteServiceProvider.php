<?php

namespace Mods\Backend\Support;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as IlluminateServiceProvider;

abstract class RouteServiceProvider extends IlluminateServiceProvider
{
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
            'middleware' => config('backend.middleware', ['web', 'backend']),
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
    }
}
