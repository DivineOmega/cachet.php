<?php

namespace DivineOmega\CachetPHP\Models;

class Incident extends ModelBase
{
    public $id;
    public $name;
    public $message;
    public $status;
    public $visible = true;
    public $component_id;
    public $component_status;
    public $notify;

    protected static function getApiType()
    {
        return 'incidents';
    }

    public function getId()
    {
        return $this->id;
    }
}
