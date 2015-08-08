# cachet.php

[![Code Climate](https://codeclimate.com/github/DivineOmega/cachet.php/badges/gpa.svg)](https://codeclimate.com/github/DivineOmega/cachet.php) 
[![StyleCI](https://styleci.io/repos/35906291/shield)](https://styleci.io/repos/35906291)

cachet.php is a PHP client library for the Cachet status page (https://cachethq.io/).

This library could be useful for displaying details from your Cachet status page in other systems, such as a monitoring dashboard, a client ticketing system or any other web applications.

If you want to grab cachet.php with Composer, take a look on Packagist: https://packagist.org/packages/divineomega/cachetphp

## Quick start

See the `example.php` file!

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

* PHP cURL Library - http://php.net/manual/en/book.curl.php
