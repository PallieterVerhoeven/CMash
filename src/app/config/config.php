<?php

use Phalcon\Config;

if (file_exists(__DIR__ . '/config.env.php')) {
    return new \Phalcon\Config\Adapter\Php('config.env.php');
}

return new Config(
    [
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
            'title'       => 'CMash Api',
            'description' => 'CMash Api',
            'email'       => 'pallieter.verhoeven@cmtelecom.com',
            'jsonUri'     => '/docs',
        ]
    ]
);
