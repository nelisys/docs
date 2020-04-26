# Model

## getChanges()

```php
$user = factory(\App\User::class)->create();

$user->name = 'New Name';
$user->save();

$user->wasChanged();
// true

$user->getChanges();
// array:1 [
//   "name" => "New Name"
// ]
```
