# Routing

## Basic Routing

edit `routes/web.php`

```php
// routes/web.php
Route::get('hello', function() {
    return 'Hello World';
});
```

test on browser with url '/hello'
