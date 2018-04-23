<?php

namespace App\Collections;

use League\Fractal\Resource\Collection;

class StatisticsCollection extends CollectionBase
{
    protected static function renderCollection($data, $depth, $options = null)
    {
        return new Collection($data, function ($data) {
            return [
                'ip'          => $_SERVER['SERVER_ADDR'],
                'port'        => $_SERVER['SERVER_PORT'],
                'hostname'    => gethostname(),
                'processTime' => $data->processTime,
                'loadAverage' => implode(' ', sys_getloadavg())
            ];
        });
    }
}