# Validation

## Success

```php
use Illuminate\Support\Facades\Validator;

$input = [
    'name' => 'Alice',
];

$validator = Validator::make($input, [
    'name' => 'required|max:10',
]);

$validator->fails();
// false

$validator->validated();
// array:1 [
//   "name" => "Alice"
// ]
```

## Fail

```php
use Illuminate\Support\Facades\Validator;

$input = [
    'name' => 'Too long name',
];

$validator = Validator::make($input, [
    'name' => 'required|max:10',
]);

$validator->fails();
// true

$validator->errors()->all();
// array:1 [
//   0 => "The name must not be greater than 10 characters."
// ]
```
