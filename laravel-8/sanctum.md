# Laravel 8 : Sanctum

## Installation

```console
$ composer require laravel/sanctum

$ php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

$ php artisan migrate
```

### Create Test User

Run `php artisan tinker` to create test user `alice@example.com`

```php
$user = App\Models\User::create([
    'email' => 'alice@example.com',
    'password' => bcrypt('secret'),
    'name' => 'Alice',
]);
```

### Modify route api

In `routes/api.php` change middleware to `auth:sanctum`.

```php
// routes/api.php
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
```

## API Token Authentication

### Edit User model and API route files

Add `HasApiTokens` trait in `User` model.

```php
// app/Models/User.php
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
```

### Create user token

- Create token by using method `createToken()`

```php
$token = $user->createToken('test-token');

=> Laravel\Sanctum\NewAccessToken {#4135
     +accessToken: Laravel\Sanctum\PersonalAccessToken {#3262
       name: "test-token",
       abilities: "["*"]",
       tokenable_id: 1,
       tokenable_type: "App\Models\User",
       updated_at: "2020-09-26 08:19:04",
       created_at: "2020-09-26 08:19:04",
       id: 1,
     },
     +plainTextToken: "1|Oo1p2x...",
   }
```

Return the value of '+plainTextToken' to client for using later

```php
>>> $token->plainTextToken;

=> "1|Oo1p2x..."
```

### Test with client (curl)

Test `curl` without authentication

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    http://sanctum.test/api/user

HTTP/1.1 401 Unauthorized
Content-Type: application/json
...

{"message":"Unauthenticated."}
```

Try authentication by `Bearer token` with created token.

```console
$ curl -i \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "Authorization: Bearer 1|Oo1p2x..." \
    http://sanctum.test/api/profile

HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8

{"id":1,"name":"Alice","email":"alice@example.com","email_verified_at":null,"created_at":...
```

Column `last_used_at` will be updated.

```sql
mysql> select * from personal_access_tokens \G
*************************** 1. row ***************************
            id: 1
tokenable_type: App\Models\User
  tokenable_id: 1
          name: test-token
         token: e37c8a1c...
     abilities: ["*"]
  last_used_at: 2020-09-26 02:21:51
    created_at: 2020-09-26 02:13:04
    updated_at: 2020-09-26 02:21:51
1 row in set (0.00 sec)
```

### Revoke Tokens

```php
// Revoke all tokens...
$user = App\User::find(1);
$user->tokens()->delete();
```

```
mysql> select * from personal_access_tokens;
Empty set (0.00 sec)
```

## SPA Authentication

Specify stateful domains in `.env`

```
SANCTUM_STATEFUL_DOMAINS=l8.test
```

Add `EnsureFrontendRequestsAreStateful` to the list of `api` middleware in `app/Http/Kernel.php`

```php
// app/Http/Kernel.php
    // ...
    protected $middlewareGroups = [
        // ...
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            // ...
        ],
```

### React

#### Login success

```javascript
// resources/js/app.js
// ...
import axios from 'axios';

async function login() {
    let data = {
        email: 'alice@example.com',
        password: 'secret',
    };

    try {
        let login = await axios.post('/login', data);
        console.log(login.status, login.statusText);
        // 200 "OK"

        let user = await axios.get('/api/user', data);
        console.log(user.data);
        // {id: 2, name: "Alice", email: "alice@example.com", ...

        let logout = await axios.post('/logout', data);
        console.log(logout.status, logout.statusText);
        // 204 "No Content"
    } catch (error) {
        console.log(error.response.status, error.response.statusText);
    }
}

function App() {
    login();

    return (
        <div>App</div>
    );
}
```

#### Login fail

```javascript
   try {
        login = await axios.post('/login', {});
        // 422 "Unprocessable Entity"
        // The email field is required

        login = await axios.post('/login', {email: 'invalid', password: 'invalid'});
        // 422 "Unprocessable Entity"
        // These credentials do not match our records.

        // 429 "Too Many Requests"
        // Too many login attempts. Please try again in 30 seconds.
    } catch (error) {
        console.log(error.response.status, error.response.statusText);
        console.log(error.response.data.errors.email[0]);
    }
```
