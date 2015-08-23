<?php

namespace DivineOmega\CachetPHP\Factories;

abstract class ComponentFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'components', $sort, $order);
    }
}
