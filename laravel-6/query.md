# Query

## statement

```php
DB::statement('drop table users');
```

## select()

```php $users = User::select('name', 'email as user_email')
    ->get();
```

## DB::raw()

```php
$users = User::select('*', DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"))
    ->get();
```

## sort by parent field

```php
Record::join('docs', 'records.doc_id', '=', 'docs.id')
    ->orderBy('docs.issued_at', request('order', 'asc'))
    ->get();
```

## Transaction

```php
DB::beginTransaction();

//...

DB::commit();

// ..
DB::rollBack();
```
