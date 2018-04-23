<?php

$loader = new \Phalcon\Loader();

/**
 * Register Files, composer autoloader
 */
$loader->registerFiles(
    [
        __DIR__ . '/../../vendor/autoload.php'
    ]
);

$loader->register();
