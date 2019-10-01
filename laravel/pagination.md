# pagination

## Array to Pagination

```php
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

$page = Paginator::resolveCurrentPage() ?: 1;
$perPage = request('perPage') ?: 10;

$students = [
    ['id' => 1, 'name' => 'Alice'],
    ['id' => 2, 'name' => 'Bob'],
    ['id' => 3, 'name' => 'Chris'],
];

// convert Array to Collection
$students = collect($students);

$students = new LengthAwarePaginator(
    $students->forPage($page, $perPage),
    $students->count(),
    $perPage,
    $page
);

$students->setPath(request()->url());
$students->appends(request()->all());
```
