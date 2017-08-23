<?php

return [
    'mod_backend' => [
        'name' => 'Backend',
        'type' => 'module',
        'providers' => [
            Mod\Backend\RouteServiceProvider::class,
        ],
        'aliases' => [
        ],
        'depends' => [
            'mod_theme'
        ],
        'autoload' => [
            'psr-4' => [
                'Mod\\Backend\\' => realpath(__DIR__.'/src/')
            ]
        ]
    ]
];
