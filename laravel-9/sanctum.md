# sanctum

## SPA Authentication

- backend (Laravel) : api.my-app.test
- frontend (React, Next) : web.my-app.test

### Backend (Laravel)

Uncomment `EnsureFrontendRequestsAreStateful::class`.

```php
// app/Http/Kernel.php
    protected $middlewareGroups = [
        // ...
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
```

Change `supports_credentials` to `true`

```php
// config/cors.php
return [
    // ...
    'supports_credentials' => true,
```

Add route in `api.php`

```php
// routes/api.php
use App\Http\Controllers\LoginController;

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
```

Example of `LoginController.php`

```php
// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [
                    __('auth.failed')
                ],
            ]);
        }

        return $request->user();
    }

    public function logout()
    {
        return Auth::logout();
    }
}
```

Edit `.env`

```
# .env
SANCTUM_STATEFUL_DOMAINS=web.my-app.test
SESSION_DOMAIN=.my-app.test
```

Creat test user

```
App\Models\User::factory()->create([
    'email' => 'admin@example.com',
    'password' => bcrypt('secret'),
]);
```

### Frontend (React)

```
npm install axios
```

```js
// src/App.js
import { useEffect, useState } from 'react';
import axios from "axios";

const http = axios.create({
    baseURL: 'http://api.my-app.test',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
    withCredentials: true,
})

function App() {
    const [user, setUser] = useState({});

    useEffect(() => {
        login();
    }, []);

    async function login() {
        const loginData = {
            email: 'admin@example.com',
            password: 'secret',
        }

        const csrf = await http.get('/sanctum/csrf-cookie')
        console.log('csrf = ', csrf);

        const login = await http.post('/api/login', loginData);
        console.log('login = ', login.data);

        const userData = await http.get('/api/user');
        console.log('user = ', userData.data);
        setUser(userData.data);

        const logout = await http.post('/api/logout');
        console.log('logout = ', logout);
    }

    return (
        <div>...{JSON.stringify(user)}...</div>
    );
}

export default App;
```
