<?php
namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\Factories\CachetElementFactory;

abstract class IncidentFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        return CachetElementFactory::getAll($cachetInstance, 'incidents', $sort, $order);
    }
    
}