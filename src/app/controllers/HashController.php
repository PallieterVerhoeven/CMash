<?php

namespace App\Controllers;

use App\Collections\hashCollection;
use Phalcon\Security;

class HashController extends ControllerBase
{

    public function createHashAction()
    {
        $data                          = $this->request->getJsonRawBody();
        $data->hash                    = (new Security())->hash($data->input, $data->workFactor);
        $data->statistics              = new \stdClass();
        $data->statistics->processTime = round(microtime(true) - $this->start, 3);

        return $this->returnJson(json_encode(hashCollection::transform($data, false, 3)), 200);
    }

    public function validateHashAction()
    {
        $data                          = $this->request->getJsonRawBody();
        $data->valid                   = (new Security())->checkHash($data->input, $data->hash);
        $data->statistics              = new \stdClass();
        $data->statistics->processTime = round(microtime(true) - $this->start, 3);

        return $this->returnJson(json_encode(hashCollection::transform($data, false, 3)), 200);
    }

}
