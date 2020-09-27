# Laravel 8 : Login

```php
// routes/web.php
Route::view('login', 'auth.login')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
```

```php
// resources/views/auth/login.blade.php
<!doctype html>
<html>
<body>
<form method="post" action"/login">
@csrf
Email: <input type="text" name="email" value="{{ old('email') }}" />
@error('email')
    <div>{{ $message }}</div>
@enderror

<br>
Password: <input type="password" name="password" value="" />
@error('password')
    <div>{{ $message }}</div>
@enderror
<br>
<input type="submit">
</form>
</body>
</html>
```

```php
// app/Http/Controllers/Auth/LoginController.php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only($this->username(), 'password');

        if (Auth::attempt($credentials)) {
            // getTargetUrl()
            return $request->wantsJson()
                ? new Response('', 200)
                : redirect()->intended('/');
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        return 'email';
    }
}
```
