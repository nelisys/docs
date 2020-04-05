# Debug

## DB Listen

```php
DB::listen(function ($query) {
    var_dump($query->sql, $query->bindings);
});
```
