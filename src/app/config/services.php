<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlResolver;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

//new Whoops\Provider\Phalcon\WhoopsServiceProvider();

$di->setShared('router', function () {
    return require __DIR__ . '/routes.php';
});

$di->setShared('config', function () use ($config) {
    return $config;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

$di->set('view', function () {
    return new Phalcon\Mvc\View();
});

$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('App\Controllers');

    // Error handler
    $eventsManager = new \Phalcon\Events\Manager();
    $eventsManager->attach("dispatch:beforeException", function ($event, $dispatcher, \Exception $exception) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode([
                             'code'    => $exception->getCode(),
                             'message' => $exception->getMessage(),
                             'file'    => $exception->getFile(),
                             'line'    => $exception->getLine(),
                             'trace'   => $exception->getTraceAsString()
                         ]);

        return false;
    });
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

$di->setShared('swagger', function () use ($config) {
    return $config->get('swagger')->toArray();
});