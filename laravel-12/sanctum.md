# Sanctum

## Installation

```
php artisan install:api

php artisan config:publish cors
```

## Middleware

```
// bootstrap/app.php
...
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();
    })
```

## cors

```
// config/cors.php
    ...
    'supports_credentials' => true,
```

## .env

```
# .env
...
SANCTUM_STATEFUL_DOMAINS=example.test
```
