<?php
namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\Factories\CachetElementFactory;

abstract class ComponentFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'components', $sort, $order);
    }
    
}