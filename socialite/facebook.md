# Facebook

## settings

## config/services.php

```php
// config/services.php
return [
    // ...
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT'),
    ],
```

## .env

```
# .env
FACEBOOK_CLIENT_ID=[App ID]
FACEBOOK_CLIENT_SECRET=[App secret]
FACEBOOK_REDIRECT=http://example.test/auth/facebook/callback
```
