# phpspreadsheet

## open the file

```php
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$spreadsheet = $reader->load('data/test.xls');
```

## list sheets

```php
$sheets = $spreadsheet->getSheetNames();
// Sheet1
// Sheet2
```

## get the sheet

```php
// by last Active sheet
$sheet = $spreadsheet->getActiveSheet();

// by sheet number, start with 0
$sheet = $spreadsheet->getSheet(0);

// by sheet name
$sheet = $spreadsheet->getSheetByName('Sheet1');
```

## sheet info

```php
$sheet->getHighestColumn();

$sheet->getHighestRow();
```

## get cell value

```php
$sheet->getCell('A1')->getValue();
```
