# breeze api

## installation

```sh
composer require laravel/breeze --dev
```

```sh
mkdir -p app/Http/Controllers/Auth/

cp -a vendor/laravel/breeze/stubs/api/app/Http/Controllers/Auth/AuthenticatedSessionController.php \
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

```php
// tests/Feature/Auth/AuthenticationTest.php
use App\Models\User;

test('invalid user or password can not login', function () {
    $user = User::factory()->create();

    $login_data = [
        'email' => $user->email,
        'password' => 'invalid password',
    ];

    $this->postJson('/login', $login_data)
        ->assertStatus(422)
        ->assertJson([
            'message' => __('auth.failed'),
            'errors' => [
                'email' => [
                    __('auth.failed')
                ],
            ],
        ]);

    $this->assertGuest();
});

test('valid user and password can login', function () {
    $user = User::factory()->create();

    $login_data = [
        'email' => $user->email,
        'password' => 'password',
    ];

    $this->postJson('/login', $login_data)
        ->assertStatus(204);

    $this->assertAuthenticated();
});

test('user can logout', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $this->postJson('/logout')
        ->assertStatus(204);

    $this->assertGuest();
});
```
