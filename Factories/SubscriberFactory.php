<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\Objects\Subscriber;

abstract class SubscriberFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'subscribers', $sort, $order, true);
    }
    
    public function create($cachetInstance, $data)
    {
        return CachetElementFactory::create($cachetInstance, 'subscribers', $data);
    }
}
