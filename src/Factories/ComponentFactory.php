<?php

namespace DivineOmega\CachetPHP\Factories;

abstract class ComponentFactory
{
    public static function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'components', $sort, $order);
    }

    public static function create($cachetInstance, $data)
    {
        return CachetElementFactory::create($cachetInstance, 'components', $data);
    }
}
