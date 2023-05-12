# breeze api

## installation

```sh
composer require laravel/breeze
```

```sh
mkdir -p app/Http/Controllers/Auth/

cp -a vendor/laravel/breeze/stubs/app/Http/Controllers/Auth/AuthenticatedSessionController.php \
    app/Http/Controllers/Auth/AuthenticatedSessionController.php

mkdir -p app/Http/Requests/Auth/

cp -a vendor/laravel/breeze/stubs/api/app/Http/Requests/Auth/LoginRequest.php \
    app/Http/Requests/Auth/LoginRequest.php

```

```php
// routes/auth.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
```

```php
// routes/web.php
...

require __DIR__.'/auth.php';
```

## tests

```
mkdir -p tests/Feature/Auth

cp -a vendor/laravel/breeze/stubs/api/pest-tests/Feature/Auth/AuthenticationTest.php \
    tests/Feature/Auth/AuthenticationTest.php
```

