<?php

namespace DivineOmega\CachetPHP\Models;

use DivineOmega\CachetPHP\CachetInstance;

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

    protected static function getApiType()
    {
        return 'incidents';
    }

    /**
     * @param string|Incident $incident
     * @param string $update_id
     * @param CachetInstance $cachetInstance
     * @return static
     */
    static function fromId($incident, $update_id, CachetInstance $cachetInstance){
        if($incident instanceof Incident) $incident = $incident->id;

        return parent::fromId($incident.'/updates/'.$update_id, $cachetInstance);
    }

    public function getId()
    {
        return $this->incident.'/updates/'.$this->id;
    }
}
