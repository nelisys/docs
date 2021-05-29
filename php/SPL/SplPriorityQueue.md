# SplPriorityQueue

```php
$students = new SplPriorityQueue();

$students->insert('Alice', 1);
$students->insert('Bob', 3);
$students->insert('Chris', 3);
$students->insert('Dan', 2);

//------------------------------------------------------------------------------

foreach ($students as $student) {
    echo $student . "\n";
}
// Bob
// Chris
// Dan
// Alice

echo $students->top() . "\n";
// Bob

//------------------------------------------------------------------------------

$students->setExtractFlags(SplPriorityQueue::EXTR_BOTH);

print_r($students->top());
// Array
// (
//     [data] => Bob
//     [priority] => 3
// )

//------------------------------------------------------------------------------

print_r($students->extract());  // modify the Queue
//Array
//(
//    [data] => Bob
//    [priority] => 3
//)

foreach ($students as $student) {
    echo "{$student['data']} : {$student['priority']}\n";
}
// Chris : 3
// Dan : 2
// Alice : 1
```
