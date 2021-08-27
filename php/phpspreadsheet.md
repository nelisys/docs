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

## Page Setup

```php
// PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
$sheet->getPageSetup()
    ->setPaperSize(PageSetup::PAPERSIZE_LETTER);

$sheet->getPageMargins()
    ->setHeader(0.1)
    ->setFooter(0.1)
    ->setLeft(0.1)
    ->setRight(0.1)
    ->setTop(0.1)
    ->setBottom(0.1);
```

## Style

```php
// PhpOffice\PhpSpreadsheet\Style\Alignment;
$sheet->getStyle('A1')
    ->getAlignment()
    ->setVertical(Alignment::VERTICAL_CENTER)
    ->setHorizontal(Alignment::HORIZONTAL_LEFT);

// PhpOffice\PhpSpreadsheet\Style\NumberFormat;
$sheet->getStyle('A1')
    ->getNumberFormat()
    ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
```

## Add image file

```php
// PhpOffice\PhpSpreadsheet\Worksheet\Drawing
$logo = new Drawing();
$logo->setName('Logo');
$logo->setDescription('Logo');
$logo->setPath('/path/to/logo.png');
$logo->setOffsetX(5);
$logo->setOffsetY(5);
$logo->setHeight(50);
$logo->setWorksheet($sheet);
```
