# carbon

```php
$today = \Carbon\CarbonImmutable::now();

echo $today->startOfWeek(Carbon::SUNDAY)->format('Y-m-d') . "\n";
echo $today->endOfWeek(Carbon::SATURDAY)->format('Y-m-d') . "\n";

echo $today->startOfMonth()->format('Y-m-d') . "\n";
echo $today->endOfMonth()->format('Y-m-d') . "\n";
````

## formats

| format | example    |
| ------ | ---------- |
| Y-m-d  | 2019-08-07 |
| j M Y  | 7 Aug 2019 |
| H:i:s  | 14:33:52   |
