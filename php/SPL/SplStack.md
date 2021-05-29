# SplStack

```php
$students = new SplStack();

echo $students->isEmpty();
// true

$students->push('Alice');
$students->push('Bob');
$students->push('Chris');

echo $students->isEmpty() . "\n";
// false

echo $students->top();
// Chris

echo $students->pop();  // modify the stack
// Chris

print_r($students);
// SplStack Object
// (
//     [flags:SplDoublyLinkedList:private] => 6
//     [dllist:SplDoublyLinkedList:private] => Array
//         (
//             [0] => Alice
//             [1] => Bob
//         )
//
// )
```
