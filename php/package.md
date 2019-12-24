# PHP Package

## Why PHP Package?
- Reusable libraries, which can easily plug-in to your app
- Community maintain for OpenSource Project

## Create Package

```console
$ composer init

  Welcome to the Composer config generator

This command will guide you through creating your composer.json config.

Package name (<vendor>/<name>) [supasin/php-package]:
Description []: Learn how to create PHP Package
Author [Supasin S. <...>, n to skip]:
Minimum Stability []:
Package Type (e.g. library, project, metapackage, composer-plugin) []: library
License []: MIT

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? no

{
    "name": "supasin/php-package",
    "description": "Learn how to create PHP Package",
    "type": "library",
    "license": "MIT",
    "authors": [
        {
            "name": "Supasin S.",
            "email": "..."
        }
    ],
    "require": {}
}

Do you confirm generation [yes]?
```

```console
$ ls -l
-rw-r--r--  1 supasin  staff  277 Dec 21 20:55 composer.json
```

add `autolaod` into file `composer.json`

```
$ vi composer.json
    ...
    "require": {},
    "autoload": {
        "psr-4": {
            "Supasin\\PhpPackage\\": "src/"
        }
    }
}
```

create `src/Item.php`

```php
<?php
// src/Item.php
namespace Supasin\PhpPackage;

class Item
{
    public function hello()
    {
        echo 'hello';
    }
}
```

## Just Test PHP Package

```
$ composer dump-autoload
Generated autoload files containing 0 classes

$ ls -l
-rw-r--r--  1 supasin  staff  375 Dec 21 21:29 composer.json
drwxr-xr-x  3 supasin  staff   96 Dec 21 21:27 src
drwxr-xr-x  4 supasin  staff  128 Dec 21 21:30 vendor
```

create test file `test-package.php`

```php
<?php

require 'vendor/autoload.php';

$item = new Supasin\PhpPackage\Item();

$item->hello();
```

run

```console
$ php test-package.php
hello

$ rm test-package.php
```

## add Tests

```console
$ composer require --dev phpunit/phpunit
```

```console
$ vi composer.json
    ...
    "require": {},
    "autoload": {
        "psr-4": {
            "Supasin\\PhpPackage\\": "src/"
        }
    },
    "require-dev": {
        "phpunit/phpunit": "^8.5"
    },
    "autoload-dev": {
        "psr-4": {
            "Supasin\\PhpPackage\\Tests\\": "tests/"
        }
    }
```

```console
$ composer dump-autoload
```

file `tests/ItemTest.php`

```php
<?php

namespace Supasin\PhpPackage\Tests;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /** @test */
    public function it_can_say_hello()
    {
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
