# cachet.php

[![Code Climate](https://codeclimate.com/github/DivineOmega/cachet.php/badges/gpa.svg)](https://codeclimate.com/github/DivineOmega/cachet.php) 
[![StyleCI](https://styleci.io/repos/35906291/shield)](https://styleci.io/repos/35906291)

cachet.php is a PHP client library for the Cachet status page (https://cachethq.io/).

This library could be useful for displaying details from your Cachet status page in other systems, such as a monitoring dashboard, a client ticketing system or any other web applications.

If you want to grab cachet.php with Composer, take a look on Packagist: https://packagist.org/packages/divineomega/cachetphp

## Quick start

Before starting, install the cachet.php library via Composer.

Now, you need to create a CachetInstance object that represents your installation of Cachet. You can do this like so:

```php
require_once 'vendor/autoload.php';

use \DivineOmega\CachetPHP\Factories\CachetInstanceFactory;

$cachetInstance = CachetInstanceFactory::create('https://demo.cachethq.io/api/v1/', '9yMHsdioQosnyVK4iCVR');
```

### Retrieving Cachet elements

Retrieving data from the various elements of your Cachet instance is easy. Just call the appropriate getter method on your ```$cachetInstance``` object. The Cachet install will be contacted and an array of request appropriate objects be returned.

If you wish to sort your results, you can use the following syntax. This works for components, incidents, metrics, metric points and subscribers.

```php
// Get components sorted by name ascending
$components = $cachetInstance->getAllComponents('name', 'asc');
```

#### Components

```php
$components = $cachetInstance->getAllComponents();
```

#### Incidents

```php
$incidents = $cachetInstance->getAllIncidents();
```

#### Metrics

```php
$metrics = $cachetInstance->getAllMetrics();
```

#### Metric Points

```php
$metricPoints = $metrics[0]->getAllMetricPoints();
```

#### Subscribers

```php
$subscribers = $cachetInstance->getAllSubscribers();
```

## Features

* Checking if Cachet instance is working correctly (via [ping](https://docs.cachethq.io/v1.0/docs/ping))
* Retrieval of Cachet elements (all or single)
 * Components
 * Incidents
 * Metrics
* Updating of component statuses
* Sanity checks on all requests
* Useful PHP exceptions thrown to aid debugging

## Dependencies

* PHP >= 5.3.0
* Guzzle ~6.0
