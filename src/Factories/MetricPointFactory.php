<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;
use DivineOmega\CachetPHP\Objects\MetricPoint;

abstract class MetricPointFactory
{
    public static function getAll(CachetInstance $cachetInstance, $metric, $sort = null, $order = null)
    {
        $response = $cachetInstance->guzzleClient->get('metrics/'.$metric->id.'/points',
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
            $toReturn[] = new MetricPoint($metric, $row, $cachetInstance);
        }

        return $toReturn;
    }

    public static function create(CachetInstance $cachetInstance, $metric, $data)
    {
        $response = $cachetInstance->guzzleClient->get('metrics/'.$metric->id.'/points', ['json' => $data, 'headers' => $cachetInstance->getAuthHeaders()]);

        if ($response->getStatusCode() != 200) {
            throw new \Exception('Bad response from Cachet instance.');
        }

        //todo: return the metric point instance
    }
}
