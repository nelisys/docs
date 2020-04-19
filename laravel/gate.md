# Gate

## Gate::define()

```php
// app/Providers/AuthServiceProvider.php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\User;
use App\Item;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
    ];

    public function boot()
    {
        $this->registerPolicies();

        // ?User for 'guest'
        Gate::define('update-item', function(User $user, Item $item) {
            return true;
        });
    }
}
```

## Using in Controller

```php
$this->authorize('update-item', new Item);

Gate::allows('update-item', new Item);
// true

Gate::denies('update-item', new Item);
// false
```
