# carbon

## install

```
$ composer require nesbot/carbon
```

## get day

```php
Carbon::today();
// Carbon\Carbon @1571504400^ {#3251
//   date: 2019-10-20 00:00:00.0 Asia/Bangkok (+07:00)
// }

Carbon::yesterday();
// Carbon\Carbon @1571418000^ {#414
//   date: 2019-10-19 00:00:00.0 Asia/Bangkok (+07:00)
// }
```

## week

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
| D      | Mon        |

```php
diffForHumans();
```

## is methods

```php
$today = Carbon::now();

$today->isToday();
// true
```

## add days

```php
Carbon::now()->addDays(-7)]
```

## diff

```php
diffInHours();
```

## parse

```php
Carbon::createFromTimestamp($timestamp);
```

```php
Carbon::createFromFormat('Y-m-d', '2022-01-25')->format('d/m/Y');
```

## Locale

```php
$date = CarbonImmutable::now()->locale('th_TH');

echo $date->dayName;    // จันทร์
echo $date->monthName;  // สิงหาคม
```
