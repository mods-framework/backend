<?php

return [
    'mod_backend' => [
        'name' => 'Backend',
        'type' => 'module',
        'providers' => [
            Mods\Backend\BackendServiceProvider::class,
            Mods\Backend\AuthRouteServiceProvider::class,
            Mods\Backend\RouteServiceProvider::class,
        ],
        'aliases' => [
        ],
        'depends' => [
            'mod_theme'
        ],
        'autoload' => [
            'psr-4' => [
                'Mods\\Backend\\' => realpath(__DIR__.'/src/')
            ]
        ]
    ]
];
