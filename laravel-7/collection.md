# Collection

## collect()

```php
$items = collect([1, 2, 3]);

// Illuminate\Support\Collection {#3058
//   all: [
//     1,
//     2,
//     3,
//   ],
// }
```

## count()

```php
$items = collect([1, 2, 3]);

$items->count();
// 3
```

## filter()

```php
$items = collect([1, 2, 3]);

$items->filter(function($item) {
    return $item > 2;
});

// Illuminate\Support\Collection {#3049
//   all: [
//     2 => 3,
//   ],
// }
```

## map()

```php
$items = collect([1, 2, 3]);

$items->map(function($item) {
    return $item * 3;
});

// Illuminate\Support\Collection {#3054
//   all: [
//     3,
//     6,
//     9,
//   ],
// }
```

## unique()

```php
$items = collect([1, 2, 3, 4, 3, 5]);

$items->unique();

// Illuminate\Support\Collection {#3059
//   all: [
//     0 => 1,
//     1 => 2,
//     2 => 3,
//     3 => 4,
//     5 => 5,
//   ],
// }
```

## where()

```php
$animals = collect([
    ['id' => 1, 'name' => 'Ant'],
    ['id' => 2, 'name' => 'Bat'],
    ['id' => 3, 'name' => 'Cat'],
]);

// Illuminate\Support\Collection {#3074
//   all: [
//     [
//       "id" => 1,
//       "name" => "Ant",
//     ],
//     [
//       "id" => 2,
//       "name" => "Bat",
//     ],
//     [
//       "id" => 3,
//       "name" => "Cat",
//     ],
//   ],
// }

$animals->where('name', 'Bat');

// Illuminate\Support\Collection {#3068
//   all: [
//     1 => [
//       "id" => 2,
//       "name" => "Bat",
//     ],
//   ],
// }
```

## sortBy()

```php
$animals->sortByDesc('name');

// Illuminate\Support\Collection {#3060
//   all: [
//     2 => [
//       "id" => 3,
//       "name" => "Cat",
//     ],
//     1 => [
//       "id" => 2,
//       "name" => "Bat",
//     ],
//     0 => [
//       "id" => 1,
//       "name" => "Ant",
//     ],
//   ],
// }
```
