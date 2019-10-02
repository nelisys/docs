# array

```php
use Arr;

$students = [
    ['id' => 1, 'name' => 'Alice'],
    ['id' => 2, 'name' => 'Bob'],
    ['id' => 3, 'name' => 'Chris'],
];

dd(Arr::dot($students));

// array:6 [
//   "0.id" => 1
//   "0.name" => "Alice"
//   "1.id" => 2
//   "1.name" => "Bob"
//   "2.id" => 3
//   "2.name" => "Chris"
// ]
```
