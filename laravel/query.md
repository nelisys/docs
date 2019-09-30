# Query

```php
$users = DB::table('users')
    ->select('name', 'email as user_email')
    ->get();
```
