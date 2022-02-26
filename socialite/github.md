# GitHub

## settings

Settings -> Developer settings -> Oauth Apps -> New OAuth App

```
Application name: Laravel Socialite
Homepage URL: http://example.test
Authorization callback URL: http://example.test/auth/github/callback
```

## config/services.php

```php
// config/services.php
return [
    // ...
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT'),
    ],
```

## .env

```
# .env
GITHUB_CLIENT_ID=a9...
GITHUB_CLIENT_SECRET=b0...
GITHUB_REDIRECT=http://example.test/auth/github/callback
```
