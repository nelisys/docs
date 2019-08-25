# Eloquent

## sort by parent field

```php
Record::join('docs', 'records.doc_id', '=', 'docs.id')
    ->orderBy('docs.issued_at', request('order', 'asc'))
    ->get();
```

