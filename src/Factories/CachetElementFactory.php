<?php

namespace DivineOmega\CachetPHP\Factories;

use DivineOmega\CachetPHP\CachetInstance;
use DivineOmega\CachetPHP\Objects\Component;
use DivineOmega\CachetPHP\Objects\Incident;
use DivineOmega\CachetPHP\Objects\Metric;
use DivineOmega\CachetPHP\Objects\Subscriber;

abstract class CachetElementFactory
{
    public static function getAll(CachetInstance $cachetInstance, $type, $sort = null, $order = null, $authorisationRequired = false)
    {
        $response = $cachetInstance->client()->request($type, ['sort' => $sort, 'order' => $order], 'GET', $authorisationRequired);

        $toReturn = [];

        foreach ($response->getData() as $row) {
            switch ($type) {

                case 'components':
                    $toReturn[] = new Component($row, $cachetInstance);
                    break;

                case 'incidents':
                    $toReturn[] = new Incident($row, $cachetInstance);
                    break;

                case 'metrics':
                    $toReturn[] = new Metric($row, $cachetInstance);
                    break;

                case 'subscribers':
                    $toReturn[] = new Subscriber($row, $cachetInstance);
                    break;

                default:
                    throw new \Exception('Invalid Cachet element type specified.');
                    break;
            }
        }

        return $toReturn;
    }

    public static function create(CachetInstance $cachetInstance, $type, $data)
    {
        $response = $cachetInstance->client()->request($type, $data, 'POST');

        $toReturn = null;
        $row = $response->getData();

        switch ($type) {

            case 'components':
                $toReturn = new Component($cachetInstance, $row);
                break;

            case 'incidents':
                $toReturn = new Incident($cachetInstance, $row);
                break;

            case 'metrics':
                $toReturn = new Metric($cachetInstance, $row);
                break;

            case 'subscribers':
                $toReturn = new Subscriber($cachetInstance, $row);
                break;

            default:
                throw new \Exception('Invalid Cachet element type specified.');
                break;
            }

        return $toReturn;
    }
}
