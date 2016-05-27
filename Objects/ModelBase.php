<?php
namespace DivineOmega\CachetPHP\Objects;


abstract class ModelBase
{
	protected $cachetInstance = null;

	public function __construct($row, CachetInstance $cachetInstance = null)
	{
		$this->cachetInstance = $cachetInstance;

		foreach ($row as $key => $value) {
			$this->$key = $value;
		}
	}
}