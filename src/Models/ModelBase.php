<?php

namespace DivineOmega\CachetPHP\Models;

use DivineOmega\CachetPHP\CachetInstance;

abstract class ModelBase
{
    protected $cachetInstance = null;

    protected abstract function getParams();
    protected abstract function getApiType();
    public abstract function getId();

    public function __construct($row = [], CachetInstance $cachetInstance = null)
    {
        $this->cachetInstance = $cachetInstance;

        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }

    public function update()
    {
        $this->cachetInstance->client()->request($this->getApiType().'/'.$this->getId(), $this->getParams(), 'PUT');
    }

    public function create(){
        $response = $this->cachetInstance->client()->request($this->getApiType(), $this->getParams(), 'POST');

        $row = $response->getData();

        return new static($row);
    }

    public function delete()
    {
        $this->cachetInstance->client()->request($this->getApiType().'/'.$this->getId(), null, 'DELETE');
    }
}
