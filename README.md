# cachet.php

[![Code Climate](https://codeclimate.com/github/DivineOmega/cachet.php/badges/gpa.svg)](https://codeclimate.com/github/DivineOmega/cachet.php) 
[![StyleCI](https://styleci.io/repos/35906291/shield)](https://styleci.io/repos/35906291)

cachet.php is a PHP client library for the Cachet status page (https://cachethq.io/).

This library could be useful for displaying details from your Cachet status page in other systems, such as a monitoring dashboard, a client ticketing system or any other web applications.

If you want to grab cachet.php with Composer, take a look on Packagist: https://packagist.org/packages/divineomega/cachetphp

# Quick Start

Before starting, install the cachet.php library via Composer.

## Create CachetInstance object

Now, you need to create a CachetInstance object that represents your installation of Cachet. You can do this like so:

```php
require_once 'vendor/autoload.php';

use \DivineOmega\CachetPHP\Factories\CachetInstanceFactory;

// The API token for the demo instance is 9yMHsdioQosnyVK4iCVR.
$cachetInstance = CachetInstanceFactory::create('https://demo.cachethq.io/api/v1/', '9yMHsdioQosnyVK4iCVR');
```

## Retrieving Cachet elements

Retrieving data from the various elements of your Cachet instance is easy. Just call the appropriate getter method on your ```$cachetInstance``` object. The Cachet install will be contacted and an array of request appropriate objects be returned.

```php
$components = $cachetInstance->getAllComponents();      // Components
$incidents = $cachetInstance->getAllIncidents();        // Incidents
$metrics = $cachetInstance->getAllMetrics();            // Metrics
$metricPoints = $metrics[0]->getAllMetricPoints();      // Metric Points
$subscribers = $cachetInstance->getAllSubscribers();    // Subscribers
```

### Sorting Cachet elements

If you wish to sort your results, you can use the following syntax. This works for components, incidents, metrics, metric points and subscribers.

```php
// Get components sorted by name ascending
$components = $cachetInstance->getAllComponents('name', 'asc');
```

## Reading from Cachet element objects

Reading data from retrieved Cachet element objects is easy. Just access their public member variables.

Here's an example of outputing the id, name, description and status of a Cachet component.

```php
// Get components
$components = $cachetInstance->getAllComponents();

// Display components
foreach ($components as $component) {
    echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
    echo "<br/>";
}
```

See the [official Cachet documentation](https://docs.cachethq.io/docs) for information on the variables available for each type of Cachet element.

## Creating Cachet elements

You can create a Cachet element, such as a component or incident very easily using the cachet.php library. This involves creating an associative array of the details for the Cachet elements and then passing this to the relevant creation method.

The following example shows you how to make a simple test component.

```php
$componentDetails = ['name' => 'Test Component '.rand(1, 99999), 'status' => 1];

$component = $cachetInstance->createComponent($componentDetails);

echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
```

## Updating Cachet elements

The cachet.php allows you to make changes to a Cachet element and saving those changes back to your Cachet install. This is done by directly changing the Cachet element's public member variables, and then calling the object's `save()` method.

The following example shows how to change the name and status of a component, then save the changes.

```php
// Get components
$components = $cachetInstance->getAllComponents();

// Change component details
$component[0]->name = 'My awesome component';
$component[0]->status = 1;
$component[0]->save();
```

## Deleting Cachet elements

To delete a Cachet element from your Cachet install, you simply need to call the `delete()` method on the appropriate Cachet element object.

For example, to delete an incident you could do the following.

```php
// Get incidents
$incidents = $cachetInstance->getAllIncidents();

// Delete the first one
$incidents[0]->delete();
```

# Dependencies

* PHP >= 5.3.0
* Guzzle ~6.0
