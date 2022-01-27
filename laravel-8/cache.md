# Cache

```php
use Illuminate\Support\Facades\Cache;
```

## remember()

```php
$items = Cache::remember('some-key', $seconds, function () {
    $data = ...

    return $data;
});
```

## forget()

```php
Cache::forget('some-key');
```
