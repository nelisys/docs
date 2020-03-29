# PHP Operator

## Null Coalescing Operator

Returns first operand if exists and is not NULL; otherwise returns second operand.

Those two are equivalent1:

```php
// never define $text

echo $text ?? 'default';
// return 'default'

$text = null;
echo $text ?? 'default';
// return 'default'

$text = 'hello';
echo $text ?? 'default';
// return 'hello'
```
