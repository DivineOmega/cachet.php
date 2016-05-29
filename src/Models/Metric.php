<?php

namespace DivineOmega\CachetPHP\Models;

use DivineOmega\CachetPHP\Factories\MetricPointFactory;

class Metric extends ModelBase
{
    public $id;
    public $name;
    public $description;
    public $suffix;
    public $display_chart;

    public function getAllMetricPoints($sort = null, $order = null)
    {
        return MetricPointFactory::getAll($this->cachetInstance, $this, $sort, $order);
    }

    protected static function getApiType()
    {
        return 'metrics';
    }

    public function getId()
    {
        return $this->id;
    }
}
