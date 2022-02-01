# array

## sorting by key

```php
$students = [
    ['name' => 'Alice', 'age' => 9],
    ['name' => 'Bob', 'age' => 12],
    ['name' => 'Chris', 'age' => 10],
];

$ages = array_column($students, 'age');

array_multisort($ages, SORT_DESC, $students);

print_r($students);

// Array
// (
//     [0] => Array
//         (
//             [name] => Bob
//             [age] => 12
//         )
//
//     [1] => Array
//         (
//             [name] => Chris
//             [age] => 10
//         )
//
//     [2] => Array
//         (
//             [name] => Alice
//             [age] => 9
//         )
//
// )

```

## array_filter()

```php
$students = [
    ['name' => 'Alice', 'age' => 23],
    ['name' => 'Bob', 'age' => 17],
    ['name' => 'Chris', 'age' => 21],
];

print_r(array_filter($students, function($student) {
    return $student['age'] > 18;
}));

// Array
// (
//     [0] => Array
//         (
//             [name] => Alice
//             [age] => 23
//         )
//
//     [2] => Array
//         (
//             [name] => Chris
//             [age] => 21
//         )
//
// )
```

## spread operator (three dots)

requires `php 7.4`

```php
$students = ['Alice', 'Bob'];

$students = [
    ...$students,
    'Chris',
];

print_r($students);
// Array
// (
//     [0] => Alice
//     [1] => Bob
//     [2] => Chris
// )
```
