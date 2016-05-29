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

    protected static function getApiType()
    {
        return 'components';
    }

    public function getId()
    {
        return $this->id;
    }
}
