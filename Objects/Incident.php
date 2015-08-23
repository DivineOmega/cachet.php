<?php

namespace DivineOmega\CachetPHP\Objects;

class Incident
{
    public function __construct($row)
    {
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }
}
