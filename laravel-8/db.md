# DB

```php
use Illuminate\Support\Facades\DB;
```

## statement

```php
DB::statement('ALTER TABLE items AUTO_INCREMENT = 1001');
```

## Transaction

```php
DB::beginTransaction();

try {
    Item::create([
        ...
    ]);

    DB::commit();
} catch (Exception $ex) {
    DB::rollback();
    die($ex->getMessage());
}
```
