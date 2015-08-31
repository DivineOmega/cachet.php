<?php

namespace DivineOmega\CachetPHP\Objects;

class Incident
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
            'query' => $queryParams]);
    }
}
