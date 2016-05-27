<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;
use DivineOmega\CachetPHP\Models\MetricPoint;

abstract class MetricPointFactory
{
    public static function getAll(CachetInstance $cachetInstance, $metric, $sort = null, $order = null)
    {
        $response = $cachetInstance->client()->request('metrics/'.$metric->id.'/points',
            ['sort' => $sort, 'order' => $order]);

        $toReturn = [];

        foreach ($response->getData() as $row) {
            $toReturn[] = new MetricPoint($metric, $row, $cachetInstance);
        }

        return $toReturn;
    }

    public static function create(CachetInstance $cachetInstance, $metric, $data)
    {
        $response = $cachetInstance->client()->request('metrics/'.$metric->id.'/points', $data, 'post');

        //todo: return the metric point instance
        //NYI
    }
}
