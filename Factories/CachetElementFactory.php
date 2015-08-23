<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\Objects\Component;
use DivineOmega\CachetPHP\Objects\Incident;
use DivineOmega\CachetPHP\Objects\Metric;

abstract class CachetElementFactory
{
    public function getAll($cachetInstance, $type, $sort = null, $order = null)
    {
        $response = $cachetInstance->guzzleClient->get($type,
            ['query' => ['sort' => $sort,
                'order'         => $order, ],
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
            switch ($type) {

                case 'components':
                    $toReturn[] = new Component($row);
                    break;

                case 'incidents':
                    $toReturn[] = new Incident($row);
                    break;

                case 'metrics':
                    $toReturn[] = new Metric($row);
                    break;

                default:
                    throw new \Exception('Invalid Cachet element type specified.');
                    break;
            }
        }

        return $toReturn;
    }
}
