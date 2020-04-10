# Laravel Sanctum

## Installation

```console
$ composer require laravel/sanctum

$ php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

$ php artisan migrate
```

add `EnsureFrontendRequestsAreStateful` to the list of `api` middleware in `app/Http/Kernel.php`

```php
// app/Http/Kernel.php

namespace App\Http;

// ...
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

class Kernel extends HttpKernel
{
    // ...
    protected $middlewareGroups = [
        // ...
        'api' => [
            // ...
            EnsureFrontendRequestsAreStateful::class,
        ],
```

## Add HasApiTokens in User model

add `HasApiTokens` in `User` model

```php
// app/User.php

// ...
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
```

## API Token Authentication

add route `profile` in `routes/api.php`

```php
// routes/api.php
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('profile', 'PageController@profile');
});
```

add `PageController.php` to handle

```php
// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function profile()
    {
        return 'Profile of ' . optional(auth()->user())->name;
    }
}
```

Test `curl` without authentication

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    http://sanctum.test/api/profile

HTTP/1.1 401 Unauthorized
Content-Type: application/json
...

{"message":"Unauthenticated."}
```

Run `php artisan tinker` to create user 'alice@example.com' with password 'secret'

```php
App\User::create([
    'email' => 'alice@example.com',
    'password' => bcrypt('secret'),
    'name' => 'Alice',
]);
```

add route `login` in `routes/api.php`

```php
// routes/api.php
Route::post('login', 'LoginController@login');

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('profile', 'PageController@profile');
});
```

create `LoginController.php` to handle login

```php
// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        $user = User::where('email', request('email'))->first();

        if (! $user || ! Hash::check(request('password'), $user->password)) {
            return response([
                'message' => 'Invalid Email or Password.',
            ], 401);
        }

        return [
            'token' => $user->createToken('access')->plainTextToken,
            'user' => $user,
        ];
    }
}
```

Try invalid login

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -d "email=alice@example.com&password=invalid" \
    http://sanctum.test/api/login

HTTP/1.1 401 Unauthorized
Content-Type: application/json

{"message":"Invalid Email or Password."}
```

Try valid login

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -d "email=alice@example.com&password=secret" \
    http://sanctum.test/api/login

HTTP/1.1 200 OK
Content-Type: application/json

{
   "token" : "QI2Kc6..."
   "user" : {
      "updated_at" : "2020-04-10T06:49:38.000000Z",
      "name" : "Alice",
      "created_at" : "2020-04-10T06:49:38.000000Z",
      "email_verified_at" : null,
      "email" : "alice@example.com",
      "id" : 1
   },

}
```

To access all user's tokens you can use `$user->tokens` or query `personal_access_tokens` directly in mysql

```
mysql> select * from personal_access_tokens \G
*************************** 1. row ***************************
            id: 1
tokenable_type: App\User
  tokenable_id: 1
          name: access
         token: 5bdce7...
     abilities: ["*"]
  last_used_at: NULL
    created_at: 2020-04-10 06:49:57
    updated_at: 2020-04-10 06:49:57
```

Try authentication by `Bearer token` with token that received from valid login response.

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "Authorization: Bearer QI2Kc6..." \
    http://sanctum.test/api/profile

HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8

Profile of Alice
```

Try valid login again

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -d "email=alice@example.com&password=secret" \
    http://sanctum.test/api/login

HTTP/1.1 200 OK
Content-Type: application/json

{
   "token" : "w45Iey..."
   "user" : {
      "name" : "Alice",
      "updated_at" : "2020-04-10T06:49:38.000000Z",
      "created_at" : "2020-04-10T06:49:38.000000Z",
      "id" : 1,
      "email_verified_at" : null,
      "email" : "alice@example.com"
   },
}
```

query from `personal_access_tokens`

```
mysql> select * from personal_access_tokens \G
*************************** 1. row ***************************
            id: 1
tokenable_type: App\User
  tokenable_id: 1
          name: access
         token: 5bdce7...
     abilities: ["*"]
  last_used_at: 2020-04-10 06:57:10
    created_at: 2020-04-10 06:49:57
    updated_at: 2020-04-10 06:57:10
*************************** 2. row ***************************
            id: 2
tokenable_type: App\User
  tokenable_id: 1
          name: access
         token: 1e0e72...
     abilities: ["*"]
  last_used_at: NULL
    created_at: 2020-04-10 07:01:03
    updated_at: 2020-04-10 07:01:03
2 rows in set (0.00 sec)
```

`last_used_at` will be updated when user using the `token` for authorization

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "Authorization: Bearer w45Iey..." \
    http://sanctum.test/api/profile
```

```
mysql> select * from personal_access_tokens \G
*************************** 1. row ***************************
            id: 1
tokenable_type: App\User
  tokenable_id: 1
          name: access
         token: 5bdce7...
     abilities: ["*"]
  last_used_at: 2020-04-10 06:57:10
    created_at: 2020-04-10 06:49:57
    updated_at: 2020-04-10 06:57:10
*************************** 2. row ***************************
            id: 2
tokenable_type: App\User
  tokenable_id: 1
          name: access
         token: 1e0e72...
     abilities: ["*"]
  last_used_at: 2020-04-10 07:08:40
    created_at: 2020-04-10 07:01:03
    updated_at: 2020-04-10 07:08:40
2 rows in set (0.00 sec)
```


## Revoking Tokens

```php
// Revoke a specific token id
$user = App\User::find(1);
$user->tokens()->where('id', 1)->delete();
```

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "Authorization: Bearer QI2Kc6..." \
    http://sanctum.test/api/profile

HTTP/1.1 401 Unauthorized
Content-Type: application/json

{"message":"Unauthenticated."}
```

```php
// Revoke all tokens...
$user = App\User::find(1);
$user->tokens()->delete();
```

```
mysql> select * from personal_access_tokens \G
Empty set (0.00 sec)
```

## Token Abilities

Modify `LoginController` by adding `$abilities` in `createToken()`

```php
// app/Http/Controllers/LoginController.php

// ...
        $abilities = [
            'profile:view',
            'items:view',
        ];

        return [
            'token' => $user->createToken('access', $abilities)->plainTextToken,
            'user' => $user,
        ];
```

Note: Use `['*']` to grant all abilities

Try `login`

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -d "email=alice@example.com&password=secret" \
    http://sanctum.test/api/login

HTTP/1.1 200 OK
Content-Type: application/json

{
   "user" : {
      "name" : "Alice",
      "updated_at" : "2020-04-10T06:49:38.000000Z",
      "email" : "alice@example.com",
      "email_verified_at" : null,
      "created_at" : "2020-04-10T06:49:38.000000Z",
      "id" : 1
   },
   "token" : "QIXh9P..."
}
```

```
mysql> select * from personal_access_tokens \G
*************************** 1. row ***************************
            id: 4
tokenable_type: App\User
  tokenable_id: 1
          name: access
         token: e5629f...
     abilities: ["profile:view","items:view"]
  last_used_at: NULL
    created_at: 2020-04-10 07:47:09
    updated_at: 2020-04-10 07:47:09
1 row in set (0.00 sec)
```

edit `PageController` to check `abilities`

```php
// app/Http/Controllers/PageController.php

    public function profile()
    {
        $user = auth()->user();

        if ($user->tokenCan('profile:view')) {
            echo 'User can view Profile.' . PHP_EOL;
        }

        if (! $user->tokenCan('profile:update')) {
            echo 'User cannot update Profile.' . PHP_EOL;
        }

        return 'Profile of ' . optional(auth()->user())->name;
    }
```

Try access `profile`

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "Authorization: Bearer QIXh9P..." \
    http://sanctum.test/api/profile

HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8

User can view Profile.
User cannot update Profile.
Profile of Alice
```

## Testing

```php
use App\User;
use Laravel\Sanctum\Sanctum;

Sanctum::actingAs(
    factory(User::class)->create(),
    ['tasks:view']
);
```
