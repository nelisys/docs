# excel

convert excel date to unix timestamp

```php
($excel_date - 25569) * 86400;
```

## Excel date to Carbon

```php
use PhpOffice\PhpSpreadsheet\Shared\Date;

Carbon::instance(Date::excelToDateTimeObject($excel_date));
```
