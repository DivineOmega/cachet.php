<?php

namespace DivineOmega\CachetPHP\Objects;

class MetricPoint extends ModelBase
{
    public $id;
    public $value;
    public $metric = null;

    public function __construct(Metric $metric, $row, CachetInstance $cachetInstance = null)
    {
        $this->metric = $metric;

        parent::__construct($row, $cachetInstance);
    }

    public function delete()
    {
        $this->cachetInstance->guzzleClient->delete('metrics/'.$this->metric->id.'/points/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders()]);
    }

    public function save()
    {
        $queryParams = [];

        $queryParams['value'] = $this->value;

        $this->cachetInstance->guzzleClient->put('metrics/'.$this->metric->id.'/points/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders(),
            'query' => $queryParams, ]);
    }
}
