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

    protected function getParams()
    {
        $queryParams = [];

        $queryParams['name'] = $this->name;
        $queryParams['description'] = $this->description;
        $queryParams['suffix'] = $this->suffix;
        $queryParams['display_chart'] = $this->display_chart;

        return $queryParams;
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
