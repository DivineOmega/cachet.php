<?php

require_once 'vendor/autoload.php';

use \DivineOmega\CachetPHP\Factories\CachetInstanceFactory;
use \DivineOmega\CachetPHP\Factories\ComponentFactory;
use \DivineOmega\CachetPHP\Factories\IncidentFactory;
use \DivineOmega\CachetPHP\Factories\MetricFactory;

$cachetInstance = CachetInstanceFactory::create('https://demo.cachethq.io/api/v1/', '9yMHsdioQosnyVK4iCVR');

// Check if Cachet instance is working correctly
if ($cachetInstance->isWorking()) {
    echo "\n";
    echo '*** Cachet instance working fine! ***';
    echo "\n";
}

// Get components
$components = ComponentFactory::getAll($cachetInstance);

// Display components
echo "\n";
echo '*** Components ***';
echo "\n";
foreach ($components as $component) {
    echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
    echo "\n";
}

// Get components sorted by name ascending
$components = ComponentFactory::getAll($cachetInstance, 'name', 'asc');

// Display components sorted by name ascending
echo "\n";
echo '*** Components (sorted by name ascending) ***';
echo "\n";
foreach ($components as $component) {
    echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
    echo "\n";
}

// Get components sorted by name descending
$components = ComponentFactory::getAll($cachetInstance, 'name', 'desc');

// Display components sorted by name descending
echo "\n";
echo '*** Components (sorted by name descending) ***';
echo "\n";
foreach ($components as $component) {
    echo $component->id.' - '.$component->name.' - '.$component->description.' - '.$component->status;
    echo "\n";
}

// Get incidents
$incidents = IncidentFactory::getAll($cachetInstance);

// Display incidents
echo "\n";
echo '*** Incidents ***';
echo "\n";
foreach ($incidents as $incident) {
    echo $incident->id.' - '.$incident->name.' - '.$incident->message.' - '.$incident->human_status;
    echo "\n";
}

// Get metrics
$metrics = MetricFactory::getAll($cachetInstance);

// Display components
echo "\n";
echo '*** Metrics ***';
echo "\n";
foreach ($metrics as $metric) {
    echo $metric->id.' - '.$metric->name;
    echo "\n";
}