<?php

namespace DivineOmega\CachetPHP\Factories;

abstract class MetricFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'metrics', $sort, $order);
    }
    
    public function create($cachetInstance, $data)
    {
        return CachetElementFactory::create($cachetInstance, 'metrics', $data);
    }
}
