# csv

## export csv to Thai

```php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: inline; filename=thai-data.csv');

$data = "id,name\n";
$data = "1,ไก่\n";
$data = "2,ไข่\n";

echo "\xEF\xBB\xBF" . $data;
```
