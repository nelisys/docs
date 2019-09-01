# preg

```php
// true
echo preg_match('/^[\pL\pM]+$/u', 'Alice') . "\n";
echo preg_match('/^[\pL\pM]+$/u', 'abc') . "\n";
echo preg_match('/^[\pL\pM]+$/u', 'กขค') . "\n";

// false
echo preg_match('/^[\pL\pM]+$/u', '123') . "\n";
echo preg_match('/^[\pL\pM]+$/u', '๑๒๓') . "\n";
echo preg_match('/^[\pL\pM]+$/u', '-') . "\n";
echo preg_match('/^[\pL\pM]+$/u', ' ') . "\n";

// true
echo preg_match('/^[\pL\pM\pN]+$/u', '123') . "\n";
echo preg_match('/^[\pL\pM\pN]+$/u', '๑๒๓') . "\n";
```
