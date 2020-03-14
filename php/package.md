# PHP Package

Create folder to store the package files.

```console
$ mkdir php-package
$ cd php-package/
```

## Init composer

```console
$ composer init

  Welcome to the Composer config generator

This command will guide you through creating your composer.json config.

Package name (<vendor>/<name>) [nelisys/php-package]: nelisys/php-package
Description []: Learn how to create PHP Package
Author [Supasin S. <supasin@example.com>, n to skip]: n
Minimum Stability []:
Package Type (e.g. library, project, metapackage, composer-plugin) []: library
License []: MIT

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? no

{
    "name": "nelisys/php-package",
    "description": "Learn how to create PHP Package",
    "type": "library",
    "license": "MIT",
    "require": {}
}

Do you confirm generation [yes]?
```

add `autoload`, `autoload-dev` in `composer.json`

```
$ vi composer.json
    ...
    "require": {},
    "autoload": {
        "psr-4": {
            "Nelisys\\PhpPackage\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Nelisys\\PhpPackage\\Tests\\": "tests/"
        }
    }
}
```

Run `composer dump-autoload`

```console
$ composer dump-autoload
Generated autoload files containing 578 classes
```

## Create src/ files

create `src/Item.php`

```php
<?php
// src/Item.php
namespace Nelisys\PhpPackage;

class Item
{
    public function hello()
    {
        echo 'hello';
    }
}
```

## Add Tests

Install `phpunit` to test the package.

```console
$ composer require --dev phpunit/phpunit
```

Add file `tests/ItemTest.php`

```php
<?php

namespace Nelisys\PhpPackage\Tests;

use PHPUnit\Framework\TestCase;
use Nelisys\PhpPackage\Item;

class ItemTest extends TestCase
{
    /** @test */
    public function it_can_say_hello()
    {
        $item = new Item();

        $this->assertTrue(true);
    }
}
```

```console
$ phpunit tests/ItemTest.php
PHPUnit 8.5.0 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 57 ms, Memory: 4.00 MB

OK (1 test, 1 assertion)
```

## phpunit.xml.dist

Create `phpunit.xml.dist`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
         backupStaticAttributes="false"
         bootstrap="vendor/autoload.php"
         colors="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false">
    <testsuites>
        <testsuite name="Test Suite">
            <directory suffix=".php">./tests</directory>
        </testsuite>
    </testsuites>
    <filter>
        <whitelist processUncoveredFilesFromWhitelist="true">
            <directory suffix=".php">./src</directory>
        </whitelist>
    </filter>
</phpunit>
```

```console
$ phpunit
PHPUnit 8.5.0 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 20 ms, Memory: 4.00 MB

OK (1 test, 1 assertion)
```

## Using the package

Create folder `php-using-package`

```console
$ mkdir php-using-package
$ cd php-using-package/
```

Create `composer.json` and add `repositories`

```
{
    "repositories": [
        {
            "type": "path",
            "url": "../php-package"
        }
    ]
}
```

```console
$ composer require nelisys/php-package

  [InvalidArgumentException]
  Could not find a version of package nelisys/php-package matching your minimum-stability (stable).
  Require it with an explicit version constraint allowing its desired stability.

require [--dev] [--prefer-source] [--prefer-dist] [--no-progress] [--no-suggest] [--no-update] [--no-scripts] [--update-no-dev] [--update-with-dependencies] [--update-with-all-dependencies] [--ignore-platform-reqs] [--prefer-stable] [--prefer-lowest] [--sort-packages] [-o|--optimize-autoloader] [-a|--classmap-authoritative] [--apcu-autoloader] [--] [<packages>]...
```

Edit `minimum-stability` in `composer.json`

```console
{
    "minimum-stability": "dev",
    "repositories": [
        {
            "type": "path",
            "url": "../php-package"
        }
    ],
    "require": {
        "nelisys/php-package": "dev-master"
    }
}
```

Try install the package again.

```console
$ composer require nelisys/php-package
Using version dev-master for nelisys/php-package
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing nelisys/php-package (dev-master): Symlinking from ../php-package
Writing lock file
Generating autoload files
```

Create `test-package.php` to test the package class.

```php
<?php
// test-package.php
require 'vendor/autoload.php';

use Nelisys\PhpPackage\Item;

$item = new Item();

echo $item->hello();
```

Run the test file

```console
$ php test-package.php
hello
```
