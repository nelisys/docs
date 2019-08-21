# carbon

```php
$today = \Carbon\CarbonImmutable::now();

echo $today->startOfWeek(Carbon::SUNDAY)->format('Y-m-d') . "\n";
echo $today->endOfWeek(Carbon::SATURDAY)->format('Y-m-d') . "\n";

echo $today->startOfMonth()->format('Y-m-d') . "\n";
echo $today->endOfMonth()->format('Y-m-d') . "\n";
````
