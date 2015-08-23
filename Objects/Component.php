<?php
namespace DivineOmega\CachetPHP\Objects;

class Component
{

    public function __construct($row)
    {
        foreach($row as $key => $value) {
            $this->$key = $value;
        }
    }

}