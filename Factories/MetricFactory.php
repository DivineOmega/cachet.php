<?php
namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\Factories\CachetElementFactory;

abstract class MetricFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'metrics', $sort, $order);
    }
    
}