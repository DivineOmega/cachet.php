<?php

namespace DivineOmega\CachetPHP\Client;

use DivineOmega\CachetPHP\Exceptions\CachetApiException;
use GuzzleHttp\Client;

class ApiV1Client implements IApiClient
{
    private $apiToken;
    private $guzzleClient;

    public function __construct($apiUrl, $apiToken)
    {
        $this->apiToken = $apiToken;

        $this->guzzleClient = new Client([
            'base_uri' => $apiUrl.'/v1/',
            'timeout'  => 3.0,
        ]);
    }

    private function getAuthHeaders()
    {
        $authHeaderKey = 'X-Cachet-Token';
        $authHeaderValue = $this->apiToken;

        return [
            $authHeaderKey => $authHeaderValue,
        ];
    }

    public function request($url, $data = null, $method = 'GET', $authorisationRequired = true)
    {
        $options = [];

        if ($authorisationRequired) {
            $options['headers'] = $this->getAuthHeaders();
        }

        if ($data) {
            if ($method != 'GET') {
                $options['json'] = $data;
            } else {
                $options['query'] = $data;
            }
        }
        $response = $this->guzzleClient->request($method, $url, $options);

        if ($response->getStatusCode() != 200) {
            throw new CachetApiException('cachet.php: Bad response. Code: '.$response->getStatusCode());
        }

        $data = json_decode($response->getBody(), true);

        if (!$data) {
            throw new CachetApiException('cachet.php: Could not decode JSON from '.$url);
        }

        $statusCode = $response->getStatusCode();

        return new ApiResponse($data, $statusCode);
    }
}
