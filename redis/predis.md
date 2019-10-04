# predis

## Laravel 6

```
$ vi .env
REDIS_CLIENT=predis
```

```php
Redis::set('name', 'Alice');
```

```
$ redis-cli
127.0.0.1:6379> KEYS *
1) "laravel_database_name"
127.0.0.1:6379> GET laravel_database_name
"Alice"
127.0.0.1:6379>
```

## redis key prefix

default prefix defined in `config/database.php`

```php
    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],
```

change prefix

```
$ vi .env
REDIS_PREFIX=my_redis_
```

```
127.0.0.1:6379> KEYS *
1) "laravel_database_name"
2) "my_redis_name"
127.0.0.1:6379> GET my_redis_name
"Alice"
```
