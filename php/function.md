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
