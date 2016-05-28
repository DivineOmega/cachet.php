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

    protected function getParams()
    {
        $queryParams = [];

        $queryParams['name'] = $this->name;
        $queryParams['description'] = $this->description;
        $queryParams['link'] = $this->link;
        $queryParams['status'] = $this->status;
        $queryParams['order'] = $this->order;
        $queryParams['group_id'] = $this->group_id;

        return $queryParams;
    }

    protected function getApiType()
    {
        return 'components';
    }

    public function getId()
    {
        return $this->id;
    }
}
