# Policy

## Policy Class

```php
// app/Policies/ItemPolicy.php

namespace App\Policies;

use App\Item;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Item $item)
    {
        return true;
    }
```

## Using Policy

```php
// app/Http/Controllers/ItemController.php

$this->authorize('viewAny', Item::class);
$this->authorize('view', new Item);
```
