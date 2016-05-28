<?php

namespace DivineOmega\CachetPHP\Models;

class IncidentUpdate extends ModelBase
{
    public $id;
    public $status;
    public $message;
    public $incident;

    protected function getParams(){
        $queryParams = [];

        $queryParams['incident'] = $this->incident;
        $queryParams['message'] = $this->message;
        $queryParams['status'] = $this->status;

        return $queryParams;
    }

    protected function getApiType()
    {
        return 'incidents';
    }

    public function getId()
    {
        return $this->incident.'/updates/'.$this->id;
    }
}
