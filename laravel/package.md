# Laravel Package

Create folder to store the package files.

```
$ mkdir laravel-package
$ cd laravel-package/
```

## Init composer.json

Init `composer.json`

Note: do not forget to change vender name to yours.

```json
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

Edit `composer.json` by changing the `require` to use the major version.

Note: test with Laravel 7

```json
{
    "name": "nelisys/laravel-package",
    "description": "Learn how to create Laravel Package",
    "require": {
        "illuminate/support": "^7"
    },
    "require-dev": {
        "orchestra/testbench": "^5"
    }
}
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

Create `tests/ItemTest.php`

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

Create `src/Item.php`

```php
<?php

namespace Nelisys\LaravelPackage;

class Item
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

Run `composer dump-autoload`

```console
$ composer dump-autoload
Generated autoload files containing 647 classes
```

Run `phpunit`

```console
$ phpunit
PHPUnit 8.5.2 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 87 ms, Memory: 14.00 MB

OK (1 test, 1 assertion)
```

## ServiceProvider

Create `src/ItemServiceProvider.php`

```php
<?php

namespace Nelisys\LaravelPackage;

use Illuminate\Support\ServiceProvider;

class ItemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        //
    }
}
```

## Using the package

Create a new Laravel project to use the created package.

Note: in this case, the project and package are located in the same folder.

```console
$ composer create-project --prefer-dist laravel/laravel laravel-using-package
```

`cd` into the project.

```console
$ cd laravel-using-package/
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

Install the package.

```console
$ composer require nelisys/laravel-package
```

```console
$ ls -l vendor/nelisys/
lrwxr-xr-x  1 supasin  staff  24 Mar 14 11:01 laravel-package -> ../../../laravel-package
```

## Routes

### add tests

Modify `tests/ItemTest.php` to define Service Providers.

```php
// ...
use Nelisys\LaravelPackage\ItemServiceProvider;

class ItemTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ItemServiceProvider::class,
        ];
    }

    // ...
```

Add test routes.

```php
// ...
class ItemTest extends TestCase
{
    // ...

    /** @test */
    public function it_can_say_hello_from_routes_web()
    {
        $this->get('hello')
            ->assertStatus(200)
            ->assertSee('hello');
    }
```


### edit ServiceProvider

Add `loadRoutesFrom()` in `ItemServiceProvider` method `boot()`

```php
class ItemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // ...
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
```

### routes file

Create folder `src/routes/` to store routes files.

```console
$ mkdir src/routes
```

Create `src/routes/web.php`

```php
<?php

Route::get('hello', function() {
    return (new Item())->hello();
});
```

### Laravel Project

In Laravel project, verify the routes from the custom package

```console
$ php artisan route:list
+--------+----------+----------+------+---------+--------------+
| Domain | Method   | URI      | Name | Action  | Middleware   |
+--------+----------+----------+------+---------+--------------+
|        | GET|HEAD | /        |      | Closure | web          |
|        | GET|HEAD | api/user |      | Closure | api,auth:api |
|        | GET|HEAD | hello    |      | Closure |              |
+--------+----------+----------+------+---------+--------------+
```

```console
$ curl http://laravel-using-package.test/hello
hello
```
