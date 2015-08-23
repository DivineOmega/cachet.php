<?php

namespace DivineOmega\CachetPHP\Factories;

abstract class IncidentFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'incidents', $sort, $order);
    }
}
