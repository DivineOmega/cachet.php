<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;

abstract class SubscriberFactory
{
    public static function getAll(CachetInstance $cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'subscribers', $sort, $order, true);
    }

    public static function create(CachetInstance $cachetInstance, $data)
    {
        return CachetElementFactory::create($cachetInstance, 'subscribers', $data);
    }
}
