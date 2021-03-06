<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\Objects\CachetInstance;

abstract class CachetInstanceFactory
{
    public function create($baseUrl, $apiToken)
    {
        return new CachetInstance($baseUrl, $apiToken);
    }
}
