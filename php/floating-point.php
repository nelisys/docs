# Floating-point

## Error

```php
$a = 0.1;
$b = 0.2;

$sum = $a + $b;

if ($sum == 0.3) {
    echo "yes\n";
} else {
    echo "no\n";
}

// no
```

## Fix

```php
$a = 0.1;
$b = 0.2;

$sum = number_format($sum, 2);

if ($sum == 0.3) {
    echo "yes\n";
} else {
    echo "no\n";
}

// yes
```

## References
- [Floating-point cheat sheet for PHP](https://floating-point-gui.de/languages/php/)
