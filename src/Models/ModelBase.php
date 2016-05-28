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

    public function update(CachetInstance $cachetInstance = null)
    {
        $this->instance($cachetInstance)->client()->request($this->getApiType().'/'.$this->getId(), $this->getParams(), 'PUT');
    }

    public function create(CachetInstance $cachetInstance = null){
        $response = $this->instance($cachetInstance)->client()->request($this->getApiType(), $this->getParams(), 'POST');

        $row = $response->getData();

        return new static($row);
    }

    public function delete(CachetInstance $cachetInstance = null)
    {
        $this->instance($cachetInstance)->client()->request($this->getApiType().'/'.$this->getId(), null, 'DELETE');
    }

    /**
     * @param CachetInstance|null $cachetInstance
     * @return CachetInstance
     */
    protected function instance(CachetInstance $cachetInstance = null)
    {
        if($cachetInstance === null){
            $cachetInstance = $this->cachetInstance;
            if($cachetInstance === null){
                throw new \InvalidArgumentException('$cachetInstance is null, and no model instance provided');
            }
        }
        return $cachetInstance;
    }
}
