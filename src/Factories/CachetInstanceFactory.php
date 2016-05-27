<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;

abstract class CachetInstanceFactory
{
    public static function create($baseUrl, $apiToken)
    {
        return new CachetInstance($baseUrl, $apiToken);
    }
}
