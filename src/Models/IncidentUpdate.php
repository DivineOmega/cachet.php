<?php

namespace DivineOmega\CachetPHP\Models;

use DivineOmega\CachetPHP\CachetInstance;

class IncidentUpdate extends ModelBase
{
    public $id;
    public $status;
    public $message;
    public $incident;
    public $component_status;

    protected function getModelUrl(){
        return static::getApiType().'/'.$this->incident.'/updates';
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
        return $this->id;
    }
}
