<?php

namespace DivineOmega\CachetPHP\Objects;

class Incident extends ModelBase
{
    public $id;
    public $name;
    public $message;
    public $status;
    public $visible;
    public $component_id;

    public function delete()
    {
        $this->cachetInstance->guzzleClient->delete('incidents/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders()]);
    }

    public function save()
    {
        $queryParams = [];

        $queryParams['name'] = $this->name;
        $queryParams['message'] = $this->message;
        $queryParams['status'] = $this->status;
        $queryParams['visible'] = $this->visible;
        $queryParams['component_id'] = $this->component_id;

        $this->cachetInstance->guzzleClient->put('incidents/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders(),
            'query' => $queryParams, ]);
    }
}
