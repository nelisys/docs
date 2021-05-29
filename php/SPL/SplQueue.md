# SplQueue

```php
$students = new SplQueue();

echo $students->isEmpty();
// true

$students->enqueue('Alice');
$students->enqueue('Bob');
$students->enqueue('Chris');

echo $students->isEmpty();
// false

echo $students->bottom();   // peek()
// Alice

echo $students->dequeue();  // modify the Queue
// Alice

print_r($students);
// SplQueue Object
// (
//     [flags:SplDoublyLinkedList:private] => 4
//     [dllist:SplDoublyLinkedList:private] => Array
//         (
//             [0] => Bob
//             [1] => Chris
//         )
//
// )
```
