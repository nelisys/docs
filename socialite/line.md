# Line

## settings

1. Provider

- Create Provider

2. Channel

Under created Provider

- Create a LINE Login channel

App types: [x] Web app
Callback URL: http://example.test/auth/line/callback

## config/services.php

```php
// config/services.php
return [
    // ...
    'line' => [
        'client_id' => env('LINE_CLIENT_ID'),           // Channel ID
        'client_secret' => env('LINE_CLIENT_SECRET'),   // Channel secret
        'redirect' => env('LINE_REDIRECT'),             // Callback URL
    ],
```

## .env

```
# .env
GITHUB_CLIENT_ID=[Channel ID]
GITHUB_CLIENT_SECRET=[Channel secret]
GITHUB_REDIRECT=http://example.test/auth/line/callback
```
