<?php

namespace DivineOmega\CachetPHP\Models;

class Subscriber extends ModelBase
{
    protected $id;

    protected function getApiType()
    {
        return 'subscribers';
    }

    public function getId()
    {
        return $this->id;
    }

    protected function getParams()
    {
        $queryParams = [];

        //todo

        return $queryParams;
    }
}
