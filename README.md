[![License](https://img.shields.io/packagist/l/arodygin/linode-api-php.svg)](https://packagist.org/packages/arodygin/linode-api-php)
[![Latest Stable Version](https://img.shields.io/packagist/v/arodygin/linode-api-php.svg)](https://packagist.org/packages/arodygin/linode-api-php)
[![Build Status](https://img.shields.io/travis/arodygin/linode-api-php.svg)](https://travis-ci.org/arodygin/linode-api-php)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/arodygin/linode-api-php.svg)](https://scrutinizer-ci.com/g/arodygin/linode-api-php/?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/arodygin/linode-api-php.svg)](https://scrutinizer-ci.com/g/arodygin/linode-api-php/?branch=master)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/727b4566-d4ae-49a3-90de-b4a607d514bc.svg)](https://insight.sensiolabs.com/projects/727b4566-d4ae-49a3-90de-b4a607d514bc)

# Linode API Client Library for PHP

This library implements full spec of Linode API (in accordance with https://www.linode.com/api/utility/api.spec),
including functions which are not described at the [Linode's site](https://www.linode.com/api) yet (the documentation seems to be slightly outdated at the moment).

The library wasn't actually implemented, but autogenerated from the [spec](https://api.linode.com/?api_action=api.spec).
This approach provides several advantages as:
 * we can be sure that nothing from the spec is missed,
 * no implementation errors which could be caused by human factor,
 * in case of the spec extension it's fast and easy to update the library's code.

Also please note that "[test.echo](https://www.linode.com/api/utility/test.echo)" is skipped from the implementation.

## Requirements

PHP needs to be a minimum version of PHP 5.2.0.

## Installation

The recommended way to install is via Composer:

```bash
composer.phar require "arodygin/linode-api-php=~1.0"
composer.phar install
```

## Usage Example

Below is a complete example of how to create a new Linode host using the library:

```php
require_once(__DIR__ . '/../vendor/autoload.php');

use Linode\LinodeApi;
use Linode\PaymentTerm;

// Your API key from the Linode profile.
$key = '...';

// Hardcode some IDs to make the example shorter.
// Normally you might want to use "Linode\AvailApi" class functions.
$datacenter = 3;    // Fremont datacenter
$plan       = 1;    // we will use the cheapest plan

// Create new linode.
$api = new LinodeApi($key);
$res = $api->create($datacenter, $plan, PaymentTerm::ONE_MONTH);

printf("Linode #%d has been created.\n", $res['LinodeID']);
```

## Batching Requests

The Linode API also supports a batched mode, whereby you supply multiple request sets and receive back an array of responses.
Example batch request using the library:

```php
require_once(__DIR__ . '/../vendor/autoload.php');

use Linode\Batch;
use Linode\LinodeApi;
use Linode\PaymentTerm;

// Your API key from the Linode profile.
$key = '...';

// Hardcode some IDs to make the example shorter.
// Normally you might want to use "Linode\AvailApi" class functions.
$datacenters = array(2, 3, 4, 6);   // all four US datacenters
$plan        = 1;                   // we will use the cheapest plan

// Create a batch.
$batch = new Batch($key);

// Create new linode on each of US datacenters.
$api = new LinodeApi($batch);

foreach ($datacenters as $datacenter) {
    $api->create($datacenter, $plan, PaymentTerm::ONE_MONTH);
}

// Execute batch.
$results = $batch->execute();

foreach ($results as $res) {
    printf("Linode #%d has been created.\n", $res['DATA']['LinodeID']);
}
```

## Tests

Almost all tests are mocked so you don't have to use a real API key and no real linodes are affected.
The only tests which make a complete API call are `TestTest` (for "[api.spec](https://www.linode.com/api/utility/test.echo)") and `ApiTest` (for "[api.spec](https://www.linode.com/api/utility/api.spec)"):

```bash
./bin/phpunit --coverage-text
```

## Library regeneration

If you would like to regenerate the library code, you can do it with two simple steps:

```bash
php ./generator/generator.php
php ./bin/php-cs-fixer fix
```
