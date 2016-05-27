<?php

namespace DivineOmega\CachetPHP\Client;

class ApiResponse
{
    private $data;
    private $statusCode;

    public function __construct(array $data, $statusCode)
    {
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public function getData()
    {
        return isset($this->data['data']) ? $this->data['data'] : null;
    }

    public function getMeta()
    {
        return isset($this->data['meta']) ? $this->data['meta'] : null;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
