<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;
use DivineOmega\CachetPHP\Client\IApiClient;

abstract class CachetInstanceFactory
{
    public static function create(IApiClient $client)
    {
        return new CachetInstance($client);
    }
}
