<?php

namespace App\Collections;

use League\Fractal\Resource\Collection;

class hashCollection extends CollectionBase
{
    protected static function renderCollection($data, $depth, $options = null)
    {
        return new Collection($data, function ($data) use ($depth) {
            return [
                'input'      => $data->input,
                'hash'       => $data->hash,
                'valid'      => $data->valid ?? null,
                'workFactor' => $data->workFactor ?? null,
                'statistics' => StatisticsCollection::transform($data->statistics, true, $depth)
            ];
        });
    }

}