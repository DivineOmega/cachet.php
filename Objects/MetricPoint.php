<?php

namespace DivineOmega\CachetPHP\Objects;

class MetricPoint
{
    private $cachetInstance = null;
    private $metric = null;

    public function __construct($cachetInstance, $metric, $row)
    {
        $this->cachetInstance = $cachetInstance;
        $this->metric = $metric;

        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }
}
