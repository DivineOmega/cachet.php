<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;

abstract class MetricFactory
{
    public static function getAll(CachetInstance $cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'metrics', $sort, $order);
    }

    public static function create(CachetInstance $cachetInstance, $data)
    {
        return CachetElementFactory::create($cachetInstance, 'metrics', $data);
    }
}
