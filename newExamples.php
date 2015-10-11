<?php

require_once 'vendor/autoload.php';

use \DivineOmega\CachetPHP\Factories\CachetInstanceFactory;

$cachetInstance = CachetInstanceFactory::create('https://demo.cachethq.io/api/v1/', '9yMHsdioQosnyVK4iCVR');

// Add component
echo "\n";
echo '*** Add Component ***';
echo "\n";
$componentDetails = [ 'name' => 'Test Component '.rand(1,99999), 'status' => 1 ]; 

$component = $cachetInstance->createComponent($componentDetails);

echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
echo "\n";

// Check if Cachet instance is working correctly
if ($cachetInstance->isWorking()) {
    echo "\n";
    echo '*** Cachet instance working fine! ***';
    echo "\n";
}

// Get components
$components = $cachetInstance->getAllComponents();

// Display components
echo "\n";
echo '*** Components ***';
echo "\n";
foreach ($components as $component) {
    echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
    echo "\n";
}

// Get components sorted by name ascending
$components = $cachetInstance->getAllComponents('name', 'asc');

// Display components sorted by name ascending
echo "\n";
echo '*** Components (sorted by name ascending) ***';
echo "\n";
foreach ($components as $component) {
    echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
    echo "\n";
}

// Get components sorted by name descending
$components = $cachetInstance->getAllComponents('name', 'desc');

// Display components sorted by name descending
echo "\n";
echo '*** Components (sorted by name descending) ***';
echo "\n";
foreach ($components as $component) {
    echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
    echo "\n";
}

// Get incidents
$incidents = $cachetInstance->getAllIncidents();

// Display incidents
echo "\n";
echo '*** Incidents ***';
echo "\n";
foreach ($incidents as $incident) {
    echo $incident->id.' - '.$incident->name.' - '.$incident->message.' - '.$incident->human_status;
    echo "\n";
}

// Get metrics
$metrics = $cachetInstance->getAllMetrics();

// Display metrics
echo "\n";
echo '*** Metrics ***';
echo "\n";
foreach ($metrics as $metric) {
    echo $metric->id.' - '.$metric->name;
    echo "\n";
}

// Get metric points for first metric
$metricPoints = $metrics[0]->getAllMetricPoints();

// Display metric points
echo "\n";
echo '*** Metric points (for Metric ID '.$metrics[0]->id.') ***';
echo "\n";
foreach ($metricPoints as $metricPoint) {
    echo $metricPoint->id.' - Created at: '.$metricPoint->created_at.' - Updated at: '.$metricPoint->updated_at.' - Value: '.$metricPoint->value;
    echo "\n";
}

// Add subscriber
echo "\n";
echo '*** Add Subscriber ***';
echo "\n";
$subscriberDetails = [ 'email' => 'bob'.rand(1,99999).'@example.com' ]; 

$subscriber = $cachetInstance->createSubscriber($subscriberDetails);

echo $subscriber->id.' - '.$subscriber->email;
echo "\n";

// Get subscribers
$subscribers = $cachetInstance->getAllSubscribers();

// Display subscribers
echo "\n";
echo '*** Subscribers ***';
echo "\n";
foreach ($subscribers as $subscriber) {
    echo $subscriber->id.' - '.$subscriber->email;
    echo "\n";
}
