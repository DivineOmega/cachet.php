<?php

namespace DivineOmega\CachetPHP;

use DivineOmega\CachetPHP\Factories\ComponentFactory;
use DivineOmega\CachetPHP\Factories\IncidentFactory;
use DivineOmega\CachetPHP\Factories\MetricFactory;
use DivineOmega\CachetPHP\Factories\SubscriberFactory;
use GuzzleHttp\Client;

class CachetInstance
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }

    public function getAuthHeaders()
    {
        $authHeaderKey = 'X-Cachet-Token';
        $authHeaderValue = $this->getApiToken();

        return [
                    $authHeaderKey => $authHeaderValue,
                ];
    }

    public function client()
    {
      return $this->client;
    }

    public function ping()
    {
        $response = $this->client->request('ping', 'GET');

        if ($response->getStatusCode() != 200) {
            throw new \Exception('cachet.php: Bad response.');
        }

        $data = $response->getData();

        if (!$data) {
            throw new \Exception('cachet.php: No data received from ping.');
        }

        return $data;
    }

    public function isWorking()
    {
        return $this->ping() == 'Pong!';
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

    public function getAllSubscribers($sort = null, $order = null)
    {
        return SubscriberFactory::getAll($this, $sort, $order);
    }

    public function createComponent($data)
    {
        return ComponentFactory::create($this, $data);
    }

    public function createIncident($data)
    {
        return IncidentFactory::create($this, $data);
    }

    public function createMetric($data)
    {
        return MetricFactory::create($this, $data);
    }

    public function createSubscriber($data)
    {
        return SubscriberFactory::create($this, $data);
    }
}
