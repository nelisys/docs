# SplFixedArray

## Using array

```php
<?php
$start_memory_usage = memory_get_usage();

$array = [];

for ($i = 0; $i < 1000000; ++$i) {
    $array[$i] = $i;
}

$end_memory_usage = memory_get_usage();
$memory_used = $end_memory_usage - $start_memory_usage;
echo "Memory used: {$memory_used} bytes\n";

// Memory used: 33,558,608 bytes
```

## Using SplFixedArray

```php
<?php
$start_memory_usage = memory_get_usage();

$array = new SplFixedArray(1000000);

for ($i = 0; $i < 1000000; ++$i) {
    $array[$i] = $i;
}

$end_memory_usage = memory_get_usage();
$memory_used = $end_memory_usage - $start_memory_usage;
echo "Memory used: {$memory_used} bytes\n";

// Memory used: 16,003,208 bytes
```

