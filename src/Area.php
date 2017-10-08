<?php

namespace Mods\Backend;

use Mods\Foundation\Contracts\AreaResolver;
use Illuminate\Contracts\Foundation\Application;

class Area implements AreaResolver
{
    /**
     * @{inherite}
     */
    public function owns(Application $app)
    {
        
        // If Area is set using .env file
        
        if (env('APP_AREA')) {
            $this->setApplicationArea($app);
            return true;
        }

        // We will not be able to detect the area until the router is matched.
        // So we add a Illuminate\Routing\Events\RouteMatched listener and
        // when the router is matched we set the area for the application
        // until then the area will be 'frontend'

        $app['events']->listen('Illuminate\Routing\Events\RouteMatched', function ($event) use ($app) {
            if ($app['router']->is('backend.*')) {
                $this->setApplicationArea($app);
            }
        });
        return false;
    }


    protected function setApplicationArea(Application $app)
    {
        $app['area'] = 'backend';
        $app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \Mods\Backend\Exceptions\Handler::class
        );
    }
}
