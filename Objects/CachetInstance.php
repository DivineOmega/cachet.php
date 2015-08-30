<?php

namespace DivineOmega\CachetPHP\Objects;

use DivineOmega\CachetPHP\Factories\ComponentFactory;
use DivineOmega\CachetPHP\Factories\IncidentFactory;
use DivineOmega\CachetPHP\Factories\MetricFactory;
use GuzzleHttp\Client;

class CachetInstance
{
    public $guzzleClient;

    private $baseUrl;
    private $apiToken;

    public function __construct($baseUrl, $apiToken)
    {
        if (!$baseUrl) {
            throw new \Exception('You must specify the base URL for your Cachet instance.');
        }

        $this->baseUrl = $baseUrl;
        $this->apiToken;

        $this->guzzleClient = new Client([
            'base_uri' => $baseUrl,
            'timeout'  => 3.0,
        ]);
    }

    public function ping()
    {
        $response = $this->guzzleClient->get('ping');

        if ($response->getStatusCode() != 200) {
            throw new \Exception('cachet.php: Bad response.');
        }

        $data = json_decode($response->getBody());

        if (!$data) {
            throw new \Exception('cachet.php: Could not decode JSON from '.$url);
        }

        if (isset($data->data)) {
            $data = $data->data;
        }

        return $data;
    }

    public function isWorking()
    {
        return ($this->ping() == 'Pong!');
    }

    public function getAllComponents($sort = null, $order = null)
    {
        return ComponentFactory::getAll($this, $sort, $order);
    }

    public function getAllIncidents($sort = null, $order = null)
    {
        return IncidentFactory::getAll($this, $sort, $order);
    }

    public function getAllMetrics($sort = null, $order = null)
    {
        return MetricFactory::getAll($this, $sort, $order);
    }
}
