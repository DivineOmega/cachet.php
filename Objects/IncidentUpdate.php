<?php

namespace DivineOmega\CachetPHP\Objects;

use DivineOmega\CachetPHP\Factories\MetricPointFactory;

class IncidentUpdate
{
    private $cachetInstance = null;

    public function __construct($cachetInstance, $row)
    {
        $this->cachetInstance = $cachetInstance;

        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }

    public function delete()
    {
        $this->cachetInstance->guzzleClient->delete('incidents/'.$this->incident_id.'/updates/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders()]);
    }

    public function save()
    {
        $queryParams = [];

        $queryParams['status'] = $this->status;
        $queryParams['message'] = $this->message;

        $this->cachetInstance->guzzleClient->put('incidents/'.$this->incident_id.'/updates/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders(),
            'query' => $queryParams, ]);
    }

}
