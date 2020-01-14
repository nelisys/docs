# Route

## Basic Routing

edit `routes/web.php`

```php
// routes/web.php
Route::get('hello', function() {
    return 'Hello World';
});
```

test on browser with url '/hello'

## Get route()

```php
url()->current();   // http://localhost/items/1

request()->url();   // http://localhost/items/1

request()->path();  // items/1

request()->route()->getName(); // items.show
```
