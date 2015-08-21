<?php

namespace DivineOmega\CachetPHP;

use GuzzleHttp\Client;

class cachet
{
    private $guzzleClient;

    private $baseURL = '';
    private $email = '';
    private $password = '';
    private $apiToken = '';

    public function __construct()
    {
    }

    public function setBaseURL($baseURL)
    {
        $this->baseURL = $baseURL;

        $this->guzzleClient = new Client([
            'base_uri' => $baseURL,
            'timeout'  => 3.0,
        ]);
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    private function sanityCheck($authorisationRequired)
    {
        if (!$this->baseURL) {
            throw new Exception('cachet.php: The base URL is not set for your cachet instance. Set one with the setBaseURL method.');
        } elseif ($authorisationRequired && (!$this->apiToken && (!$this->email || !$this->password))) {
            console.log('cachet.php: The apiToken is not set for your cachet instance. Set one with the setApiToken method. Alternatively, set your email and password with the setEmail and setPassword methods respectively.');

            return false;
        }
    }

    public function ping()
    {
        $this->sanityCheck(false);

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

    private function get($type, $sort, $order)
    {
        if ($type !== 'components' && $type !== 'incidents' && $type !== 'metrics') {
            throw new Exception('cachet.php: Invalid type specfied. Must be \'components\', \'incidents\' or \'metrics\'.');
        }

        $this->sanityCheck(false);

        $response = $this->guzzleClient->get($type,
            ['query' => ['sort' => $sort,
                'order'         => $order, ],
            ]);

        if ($response->getStatusCode() != 200) {
            throw new \Exception('cachet.php: Bad response.');
        }

        $data = json_decode($response->getBody());

        if (!$data) {
            throw new \Exception('cachet.php: Could not decode JSON.');
        }

        if (isset($data->data)) {
            $data = $data->data;
        }

        return $data;
    }

    private function getByID($type, $id)
    {
        if ($type !== 'components' && $type !== 'incidents' && $type !== 'metrics') {
            throw new \Exception('cachet.php: Invalid type specfied. Must be \'components\', \'incidents\' or \'metrics\'.');
        }

        $this->sanityCheck(false);

        $response = $this->guzzleClient->get($type.'/'.$id);

        if ($response->getStatusCode() != 200) {
            throw new \Exception('cachet.php: Bad response.');
        }

        $data = json_decode($response->getBody());

        if (!$data) {
            throw new \Exception('cachet.php: Could not decode JSON.');
        }

        if (isset($data->data)) {
            $data = $data->data;
        }

        return $data;
    }

    public function setComponentStatusByID($id, $status)
    {
        $this->sanityCheck(true);

        if (!$id) {
            throw new \Exception('cachet.php: You attempted to set a component status by ID without specifying an ID.');
        }

        $authHeaderKey = 'Authorization';
        $authHeaderValue = 'Basic '.base64_encode($this->email.':'.$this->password);

        if ($this->apiToken) {
            $authHeaderKey = 'X-Cachet-Token';
            $authHeaderValue = $this->apiToken;
        }

        $response = $this->guzzleClient->put('components/'.$id,
            [
                'form_params' => [
                    'status' => $status,
                ],
                'headers' => [
                    $authHeaderKey => $authHeaderValue,
                ],
            ]);

        if ($response->getStatusCode() != 200) {
            throw new \Exception('cachet.php: Bad response.');
        }

        $data = json_decode($response->getBody());

        if (!$data) {
            throw new \Exception('cachet.php: Could not decode JSON.');
        }

        if (isset($data->data)) {
            $data = $data->data;
        }

        return $data;
    }

    public function getComponents($sort = null, $order = null)
    {
        return $this->get('components', $sort, $order);
    }

    public function getComponentByID($id)
    {
        return $this->getByID('components', $id);
    }

    public function getIncidents($sort = null, $order = null)
    {
        return $this->get('incidents', $sort, $order);
    }

    public function getIncidentByID($id)
    {
        return $this->getByID('incidents', $id);
    }

    public function getMetrics($sort = null, $order = null)
    {
        return $this->get('metrics', $sort, $order);
    }

    public function getMetricByID($id)
    {
        return $this->getByID('metrics', $id);
    }
}
