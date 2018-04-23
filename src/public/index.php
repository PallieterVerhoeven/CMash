<?php

error_reporting(E_ALL);
date_default_timezone_set('UTC');

use Phalcon\Mvc\Application;

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . '/../app/config/config.php';

    /**
     * Read auto-loader
     */
    include __DIR__ . '/../app/config/loader.php';

    /**
     * Read services
     */
    include __DIR__ . '/../app/config/services.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    echo $application->handle()->getContent();
} catch (\Exception $e) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['message' => $e->getMessage()]);
}
