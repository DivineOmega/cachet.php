<?php

namespace DivineOmega\CachetPHP\Models;

use DivineOmega\CachetPHP\CachetInstance;

abstract class ModelBase
{
    protected $cachetInstance = null;

    public function __construct($row, CachetInstance $cachetInstance = null)
    {
        $this->cachetInstance = $cachetInstance;

        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }
}
