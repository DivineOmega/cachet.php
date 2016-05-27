<?php

namespace DivineOmega\CachetPHP\Models;

class Component extends ModelBase
{
    public $id;
    public $name;
    public $description;
    public $link;
    public $status;
    public $order;
    public $group_id;

    public function delete()
    {
        $this->cachetInstance->client()->request('components/'.$this->id, null, 'DELETE');
    }

    public function save()
    {
        $queryParams = [];

        $queryParams['name'] = $this->name;
        $queryParams['description'] = $this->description;
        $queryParams['link'] = $this->link;
        $queryParams['status'] = $this->status;
        $queryParams['order'] = $this->order;
        $queryParams['group_id'] = $this->group_id;

        $this->cachetInstance->client()->request('components/'.$this->id, $queryParams, 'PUT');
    }
}
