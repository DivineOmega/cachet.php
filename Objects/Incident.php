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
        $cachetInstance->guzzleClient->delete('incidents/'.$this->id, ['headers' => $cachetInstance->getAuthHeaders()]);
    }
}
