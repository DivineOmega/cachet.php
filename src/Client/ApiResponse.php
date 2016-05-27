<?php

namespace DivineOmega\CachetPHP\Client;

class ApiResponse
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return isset($this->data['data']) ? $this->data['data'] : null;
    }

    public function getMeta()
    {
        return isset($this->data['meta']) ? $this->data['meta'] : null;
    }
}
