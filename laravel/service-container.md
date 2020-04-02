# Service Container

Create test class `app/Item.php`

```php
// app/Item.php

namespace App;

class Item
{
}
```

## Basic Binding and Resolving

Modify `routes/web.php` to `bind()` and `resolve()`.

Note: can use `resolve` instead of `app()->make()`

```php
// routes/web.php

app()->bind('item', function() {
    return new App\Item;
});

Route::get('/', function () {
    $item = app()->make('item');
    // $item = resolve('item');

    var_dump($item);
});
```

```console
$ curl http://localhost/
object(App\Item)#255 (0) {
}
```

## Binding in AppServiceProvider

Register `bind()` in `AppServiceProvider.php`

```php
class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('item', function() {
            return new \App\Item;
        });
    }
```

Modify `routes/web.php` to `resolve()`.

```php
// routes/web.php

Route::get('/', function () {
    $item = resolve('item');

    var_dump($item);
});
```

```console
$ curl http://localhost/
object(App\Item)#254 (0) {
}
```

## Automatically Resolving Class

No need to register `bind()`, Service Container is trying to resolve the class if exists.

```php
// routes/web.php

Route::get('/', function () {
    $item = resolve(App\Item::class);

    var_dump($item);
});
```

```console
$ curl http://localhost/
object(App\Item)#223 (0) {
}
```

## Dependency Resolving

```php
// routes/web.php

Route::get('/', function (App\Item $item) {
    var_dump($item);
});
```

```console
$ curl http://localhost/
object(App\Item)#228 (0) {
}
```
