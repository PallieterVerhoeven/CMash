<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;

/**
 * Class ControllerBase
 *
 * @package App\Controllers
 */
class ControllerBase extends Controller
{
    /**
     * @var
     */
    protected $start;

    /**
     * @return bool
     */
    public function beforeExecuteRoute()
    {
        $this->start = microtime(true);

        return true;
    }

    /**
     * @param      $jsonData
     * @param int  $statusCode
     *
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function returnJson($jsonData, $statusCode = 200)
    {
        $this->view->disable();
        $this->response->setStatusCode($statusCode);
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setContent($jsonData);
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Access-Control-Expose-Headers', 'Authorization');

        return $this->response;
    }

}