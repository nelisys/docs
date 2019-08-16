# DateTime

## basic

echo the current date/time

```php
// test-datetime.php
ini_set('date.timezone', 'Asia/Bangkok');

$dt = new DateTime();

echo $dt->format('Y-m-d H:i:s');
```

```console
$ php test-datetime.php
2019-08-05 18:43:02
```

specify date time
```php
$dt = new DateTime('2019-08-05 18:50:12');
```

## format

| format | example    |
| ------ | ---------- |
| Y-m-d  | 2019-08-05 |
| j M Y  | 5 Aug 2019 |
| H:i:s  | 18:43:02   |

