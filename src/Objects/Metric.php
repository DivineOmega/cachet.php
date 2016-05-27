<?php

namespace DivineOmega\CachetPHP\Objects;

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

    public function delete()
    {
        $this->cachetInstance->guzzleClient->delete('metrics/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders()]);
    }

    public function save()
    {
        $queryParams = [];

        $queryParams['name'] = $this->name;
        $queryParams['description'] = $this->description;
        $queryParams['suffix'] = $this->suffix;
        $queryParams['display_chart'] = $this->display_chart;

        $this->cachetInstance->guzzleClient->put('metrics/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders(),
            'query' => $queryParams, ]);
    }

    public function createMetricPoint($data)
    {
        return MetricPointFactory::create($this->cachetInstance, $this, $data);
    }
}
