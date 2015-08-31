<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\Objects\Subscriber;

abstract class SubscriberFactory
{
    public function getAll($cachetInstance, $sort = null, $order = null)
    {
        $response = $cachetInstance->guzzleClient->get('subscribers',
            ['query' => ['sort' => $sort,
                'order'         => $order, ],
            'headers' => $cachetInstance->getAuthHeaders(),
            ]);

        if ($response->getStatusCode() != 200) {
            throw new \Exception('Bad response from Cachet instance.');
        }

        $data = json_decode($response->getBody());

        if (!$data) {
            throw new \Exception('Could not decode JSON retrieved from Cachet instance.');
        }

        if (isset($data->data)) {
            $data = $data->data;
        }

        $toReturn = [];

        foreach ($data as $row) {
            $toReturn[] = new Subscriber($cachetInstance, $row);
        }

        return $toReturn;
    }
}
