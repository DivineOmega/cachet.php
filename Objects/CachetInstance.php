<?php

namespace DivineOmega\CachetPHP\Objects;

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
}
