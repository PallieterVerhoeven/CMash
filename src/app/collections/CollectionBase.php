<?php

namespace App\Collections;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

abstract class CollectionBase
{
    abstract protected static function renderCollection($model, $depth, $options = []);

    public static function transform($model, $array = true, $depth = true, $options = [])
    {
        $model = (is_object($model)) ? [$model] : $model;

        // Render output resource
        if ($model === null) {
            return null;
        } elseif ($depth > 0) {
            // Lower one level
            $depth--;
            $resource = static::renderCollection($model, $depth, $options);
        } else {
            return $model;
        }

        $manager  = new Manager();
        $resource = $manager->createData($resource)->toArray()['data'];

        return $array ? $resource : $resource[0] ?? [];
    }

    protected static function intOrNull($value)
    {
        return ($value === null) ? $value : (int)$value;
    }

}