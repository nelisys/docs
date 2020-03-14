# Laravel Package

Create folder to store the package files.

```
$ mkdir laravel-package
$ cd laravel-package/
```

## Init composer.json

Init `composer.json`.

Note: do not forget to change vender name to yours.

```
$ vi composer.json
{
    "name": "nelisys/laravel-package",
    "description": "Learn how to create Laravel Package"
}
```

Install required packages.

```
$ composer require illuminate/support
$ composer require --dev orchestra/testbench
```

## Prepare tests files

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

Create folder `tests/` to store test files.

```console
$ mkdir tests
```

Create `tests/ItemTest.php`.

```php
<?php

namespace Nelisys\LaravelPackage\Tests;

use Orchestra\Testbench\TestCase;
use Nelisys\LaravelPackage\Item;

class ItemTest extends TestCase
{
    /** @test */
    public function it_can_say_hello()
    {
        $item = new Item();

        $this->assertSame('hello', $item->hello());
    }
}
```

## src

Create folder `src/` to store application files.

```console
$ mkdir src
```

Create `src/Item.php`.

```
<?php

namespace Nelisys\LaravelPackage;

class Item extends
{
    public function hello()
    {
        return 'hello';
    }
}
```

Edit `composer.json` to define `autoload` sections.

```json
{
    "name": "nelisys/laravel-package",
    "description": "Learn how to create Laravel Package",
    "require": {
        "illuminate/support": "^7.1"
    },
    "require-dev": {
        "orchestra/testbench": "^5.1"
    },
    "autoload": {
        "psr-4": {
            "Nelisys\\LaravelPackage\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Nelisys\\LaravelPackage\\Tests\\": "tests/"
        }
    }
}
```

Run `composer dump-autoload`.

```console
$ composer dump-autoload
Generated autoload files containing 647 classes
```

Run `phpunit`.

```console
$ phpunit
PHPUnit 8.5.2 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 87 ms, Memory: 14.00 MB

OK (1 test, 1 assertion)
```

## add ServiceProvider

`src/ItemServiceProvider.php`

```php
<?php

namespace Supasin\LaravelPackage;

use Illuminate\Support\ServiceProvider;

class ItemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function register()
    {
        //
    }
}
```

`src/routes/web.php`

```php
<?php

Route::get('help', function() {
    return 'Hello';
});
```

## using the package

In project that want to use the custom package

```console
$ composer create-project --prefer-dist laravel/laravel laravel-using-packages
```

add `repositories` in `composer.json`

```json
    "repositories": [
        {
            "type": "path",
            "url": "../laravel-package"
        }
    ]
}
```

install the package

```console
$ composer require supasin/laravel-package
Using version dev-master for supasin/laravel-package
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing supasin/laravel-package (dev-master): Symlinking from ../laravel-package
Writing lock file
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fideloper/proxy
Discovered Package: fruitcake/laravel-cors
Discovered Package: laravel/tinker
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Discovered Package: supasin/laravel-package
Package manifest generated successfully.
```

```console
$ ls -l vendor/supasin/
lrwxr-xr-x  1 supasin  staff  24 Mar 13 21:20 laravel-package -> ../../../laravel-package
```

verify the routes from the custom package

```console
$ php artisan route:list
+--------+----------+----------+------+---------+--------------+
| Domain | Method   | URI      | Name | Action  | Middleware   |
+--------+----------+----------+------+---------+--------------+
|        | GET|HEAD | /        |      | Closure | web          |
|        | GET|HEAD | api/user |      | Closure | api,auth:api |
|        | GET|HEAD | help     |      | Closure |              |
+--------+----------+----------+------+---------+--------------+
```

```console
$ curl http://laravel-using-packages.test/help
Hello
```

try edit the package

```
$ vi ../laravel-package/src/routes/web.php
<?php

Route::get('help', function() {
    return 'Hello World';
});
```

test the link after edit

```
$ curl http://laravel-using-packages.test/help
Hello World
```
