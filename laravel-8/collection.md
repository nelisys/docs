# Collection

## macro

```
use Illuminate\Support\Collection;

Collection::macro('whereRegexp', function($expression, $field) {
    return $this->filter(function($item) use($expression, $field) {
        return preg_match($expression, $item[$field]);
    });
});

$items = collect([
    ['name' => 'Alice'],
    ['name' => 'Bob'],
    ['name' => 'Chris'],
]);

$items = $items->whereRegexp('/c/i', 'name');
// [['name' => 'Alice'], ['name' => 'Chris']]
```
