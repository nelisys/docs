# phpredis

## Laravel 6

```console
$ pecl install redis

$ php -m | grep -i redis
redis
```

```php
use Illuminate\Support\Facades\Redis;

Redis::set('name', 'Alice');
```
