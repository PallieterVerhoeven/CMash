<?php

$router = new Phalcon\Mvc\Router(false);

$router->removeExtraSlashes(true);

/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="api.host.com",
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="CMash API",
 *         description="Api description...",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="contact@mysite.com"
 *         ),
 *         @SWG\License(
 *             name="Private License",
 *             url="URL to the license"
 *         )
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="Find out more about my website",
 *         url="http..."
 *     )
 * )
 */
$router->add('/docs/index', [
    'namespace'  => 'Igsem\Docs\Controllers',
    'controller' => 'docs',
    'action'     => 'docs'
]);

$router->add('/docs', [
    'namespace'  => 'Igsem\Docs\Controllers',
    'controller' => 'docs',
    'action'     => 'index'
]);

////////////
/// Hash ///
////////////
$hash = new \Phalcon\Mvc\Router\Group(
    [
        'namespace'  => 'App\Controllers',
        'controller' => 'hash',
    ]
);

$hash->setPrefix('/cmash');

/**
 *
 * @SWG\POST(
 *   path="/cmash/v1.0/hash/create",
 *   summary="Create hash",
 *   tags={"Hash"},
 *   produces={"application/json"},
 * @SWG\Response(
 *     response=200,
 *     description="OK"
 *   )
 * )
 * @return string
 */
$hash->addPost('/v1.0/hash/create', [
    'action' => 'createHash'
]);

/**
 *
 * @SWG\POST(
 *   path="/cmash/v1.0/hash/validate",
 *   summary="Create hash",
 *   tags={"Hash"},
 *   produces={"application/json"},
 * @SWG\Response(
 *     response=200,
 *     description="OK"
 *   )
 * )
 * @return string
 */
$hash->addPost('/v1.0/hash/validate', [
    'action' => 'validateHash',
]);

$router->mount($hash);

return $router;
