<?php

namespace DivineOmega\CachetPHP\Objects;

use DivineOmega\CachetPHP\Factories\MetricPointFactory;

class Metric
{
    private $cachetInstance = null;

    public function __construct($cachetInstance, $row)
    {
        $this->cachetInstance = $cachetInstance;

        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getAllMetricPoints($sort = null, $order = null)
    {
        return MetricPointFactory::getAll($this->cachetInstance, $this, $sort, $order);
    }

    public function delete()
    {
        $this->cachetInstance->guzzleClient->delete('metrics/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders()]);
    }
}
