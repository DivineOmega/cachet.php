<?php
namespace DivineOmega\CachetPHP\Client;

class ApiResponse
{
	private $data;

	function __construct(array $data)
	{
		$this->data = $data;
	}

	function getData(){
		return isset($this->data['data']) ? $this->data['data'] : null;
	}

	function getMeta(){
		return isset($this->data['meta']) ? $this->data['meta'] : null;
	}
}