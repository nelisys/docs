# Eloquent

```php
Item::whereDate('created_at', Carbon::today());
```

get original data while updating data

```php
$this->getOriginal();
```

to refresh the data

```php
$student->refresh();
```
