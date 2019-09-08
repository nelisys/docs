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
