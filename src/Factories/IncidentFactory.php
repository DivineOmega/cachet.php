<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;

abstract class IncidentFactory
{
    public static function getAll(CachetInstance $cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'incidents', $sort, $order);
    }

    public static function create(CachetInstance $cachetInstance, $data)
    {
        return CachetElementFactory::create($cachetInstance, 'incidents', $data);
    }
}
