# Laravel Dusk

## Installation

```
composer require --dev laravel/dusk

php artisan dusk:install

php artisan dusk:chrome-driver
```

## Run Test

```
php artisan dusk
```

## Interactive

### input text

```php
// <input id="name" value="">

$browser->type('#name', 'Ali');
// <input id="name" value="Ali">

$browser->append('#name', 'ce');
// <input id="name" value="Alice">
```

### select

```php
$browser->select('size', 'L');
```

### button

```php
$browser->click('#id');
```

### checkbox

```php
$browser->check('#id');

$browser->uncheck('#id');
```

### radio

```php
$browser->radio('#size', 'L');
```

### submit

```php
$browser->press('Login');
```

### link

```php
$browser->clickLink($linkText);
```

## Retrieve value

```php
// <input id="name" value="Alice">

$browser->value('#name');
// Alice
```

```php
// <h1>Home</h1>

$browser->text('h1');
// Home
```

```php
// <input id="name" value="Alice" class="form-control">

$browser->attribute('#name', 'class');
// form-control
```

## Scoping Selectors

```php
$browser->with('.table', function ($table) {
    $table->assertSee('Hello World')
        ->clickLink('Delete');
});
```

## Waiting

```php
$browser->pause(1000);

$browser->waitFor('.selector');

$browser->waitForTextIn('.selector', 'Hello World');

$browser->waitUntilMissing('.selector');

$browser->waitForText('Hello World');

$browser->waitForLink('Create');

$browser->waitForLocation('/secret');

$browser->waitForReload();

$browser->waitUntil('App.data.servers.length > 0');
```

```php
$browser->whenAvailable('.modal', function ($modal) {
    $modal->assertSee('Hello World')
        ->press('OK');
});
```

## JavaScript

```javascript
$output = $browser->script([
    'return 5 + 7',
    'return 3 * 9',
]);

print_r($output);
// array:2 [
//   0 => 12
//   1 => 27
// ]
```

## Assertions

```php
$browser->assertTitle($title);

$browser->assertPathIs('/home');

$browser->assertQueryStringHas($name, $value);

$browser->assertScript('document.readyState', 'complete');

$browser->assertInputValue($field, $value);

$browser->assertSeeIn($selector, $value);
```

## Disable Browser Validation

```php
// tests/DuskTestCase.php
// ...
use Laravel\Dusk\Browser;

abstract class DuskTestCase extends BaseTestCase
    // ...
    public static function prepare()
    {
        if (! static::runningInSail()) {
            static::startChromeDriver();

            Browser::macro('disableClientSideValidation', function () {
                $this->script('for(let f=document.forms,i=f.length;i--;)f[i].setAttribute("novalidate",i)');
                return $this;
            });
        }
    }
```
