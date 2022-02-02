# Function

## Variable-length argument lists

```php
function sum(...$numbers) {
    print_r($numbers);
}

sum(1, 2, 3);

// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )
```

## Arrow function

requires PHP 7.4

```php
$nums = [1, 2, 3];

$powers = array_map(fn($num) => $num ** 2, $nums);

print_r($powers);
// 1, 4, 9
```

compare to anonymous function

```php
$powers = array_map(function ($num) {
    return $num ** 2;
}, $nums);
```
