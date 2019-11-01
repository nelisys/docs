# Collections

## sortBy()

```php
$records = Record::with('doc')
    ->get()
    ->sortBy('doc.name');
```

```php
$records = Record::with('doc')
    ->get()
    ->sortByDesc('doc.name');
```
