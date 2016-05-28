<?php

namespace DivineOmega\CachetPHP\Models;

use DivineOmega\CachetPHP\CachetInstance;

class MetricPoint extends ModelBase
{
    public $id;
    public $value;
    public $metric = null;

    public function __construct(Metric $metric, $row = [], CachetInstance $cachetInstance = null)
    {
        $this->metric = $metric;

        parent::__construct($row, $cachetInstance);
    }

    protected function getParams()
    {
        $queryParams = [];

        $queryParams['value'] = $this->value;

        return $queryParams;
    }

    protected static function getApiType()
    {
        return 'metrics';
    }

    public function getId()
    {
        return $this->metric->id.'/points/'.$this->id;
    }
}
