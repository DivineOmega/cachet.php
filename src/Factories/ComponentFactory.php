<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;

abstract class ComponentFactory
{
    public static function getAll(CachetInstance $cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'components', $sort, $order);
    }

    public static function create(CachetInstance $cachetInstance, $data)
    {
        return CachetElementFactory::create($cachetInstance, 'components', $data);
    }
}
