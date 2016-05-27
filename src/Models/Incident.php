<?php

namespace DivineOmega\CachetPHP\Models;

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
        $this->cachetInstance->client()->request('incidents/'.$this->id, null, 'DELETE');
    }

    public function save()
    {
        $queryParams = [];

        $queryParams['name'] = $this->name;
        $queryParams['message'] = $this->message;
        $queryParams['status'] = $this->status;
        $queryParams['visible'] = $this->visible;
        $queryParams['component_id'] = $this->component_id;

        $this->cachetInstance->client()->request('incidents/'.$this->id, $queryParams, 'PUT');
    }
}
