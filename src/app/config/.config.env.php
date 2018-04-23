<?php

return [
    'application' => [
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'baseUri'        => '/',
    ],
    'swagger'     => [
        'path'        => __DIR__ . '/../../app',
        'host'        => 'localhost:8082',
        'schemes'     => ['https'],
        'basePath'    => '/',
        'version'     => '1.0',
        'title'       => 'Seated Ticketing Api',
        'description' => 'Seated Ticketing Api',
        'email'       => 'pallieter.verhoeven@cmtelecom.com',
        'jsonUri'     => '/docs',
    ]
];