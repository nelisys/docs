# Laravel Package

## composer.json

`composer.json`

```json
{
    "name": "supasin/laravel-package",
    "description": "Learn how to create Laravel Package",
    "type": "library",
    "license": "MIT",
    "authors": [
        {
            "name": "Supasin S.",
            "email": "..."
        }
    ],
    "require": {
        "php": "^7.2.5"
    },
    "require-dev": {
        "orchestra/testbench": "^5.0"
    },
    "autoload": {
        "psr-4": {
            "Supasin\\LaravelPackage\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Supasin\\LaravelPackage\\Tests\\": "tests/"
        }
    },
    "extra": {
        "laravel": {
            "providers": [
                "Supasin\\LaravelPackage\\ItemServiceProvider"
            ]
        }
    }
}
```

## Tests

`phpunit.xml.dist`

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

`tests/ItemTest.php`

```php
<?php

namespace Supasin\LaravelPackage\Tests;

use Orchestra\Testbench\TestCase;
use Supasin\LaravelPackage\Item;

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

`src/Item.php`

```
<?php

namespace Supasin\LaravelPackage;

class Item extends
{
    public function hello()
    {
        return 'hello';
    }
}
```

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
