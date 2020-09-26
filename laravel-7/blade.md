# Blade

## {{ }} equivalent

```php
// vendor/laravel/framework/src/Illuminate/Support/helpers.php
// ...
    function e($value, $doubleEncode = true)
    {
        // ...
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
    }
```
