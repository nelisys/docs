# Socialite

## Instalation

```
composer require laravel/socialite
```

## routes/web.php

```
use App\Http\Controllers\SocialiteController;

Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);
```

## SocialiteController

```php
namespace App\Http\Controllers;

use Exception;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();

            echo 'Id=' . $user->getId()
                . ' Nickname=' . $user->getNickname()
                . ' Name=' . $user->getName()
                . ' Email=' . $user->getEmail()
                . ' Avatar=' . $user->getAvatar();
        } catch (Exception $e) {
            abort(401);
        }
    }
}
```
