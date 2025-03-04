# PhpSpreadsheet

## Basic create file

```php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello');

$writer = new Xlsx($spreadsheet);
$writer->save('file.xlsx');
```

## open the file

```php
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$reader = new Xlsx();
$spreadsheet = $reader->load('data/test.xlsx');
```

## list sheets

```php
$sheets = $spreadsheet->getSheetNames();
// Sheet1
// Sheet2
```

```php
$sheets = $spreadsheet->getAllSheets();

foreach ($sheets as $sheet) {
    $title = $sheet->getTitle();
}
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

$sheet->getCell('A1')->getFormattedValue();
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

## Width/Height

```php
// width
$sheet->getColumnDimension('C')
    ->setWidth(20);

// height
$sheet->getRowDimension($row)
    ->setRowHeight(20);
```

## Font

```php
$sheet->getStyle("A2:K2")
    ->getFont()
    ->setName('Times')
    ->setSize(14)
    ->setBold(true);
```

## Color

```php
$sheet->getStyle("J{$row}")
    ->getFont()
    ->setColor(new Color(Color::COLOR_RED));

$sheet->getStyle("J{$row}")
    ->getFill()
    ->setFillType(Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('FFEEEE');
```

## Add image file

```php
// PhpOffice\PhpSpreadsheet\Worksheet\Drawing
$logo = new Drawing();
$logo->setWorksheet($sheet);
$logo->setCoordinates('B15');

$logo->setName('Logo');
$logo->setDescription('Logo');
$logo->setPath('/path/to/logo.png');
$logo->setOffsetX(5);
$logo->setOffsetY(5);
$logo->setHeight(50);
```

## output to browesr

```php
use PhpOffice\PhpSpreadsheet\IOFactory;

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="myfile.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
```

## drawing

```php
$drawings = $sheet->getDrawingCollection();

foreach ($drawings as $drawing) {
    echo $drawing->getName() . ' ';
    echo $drawing->getPath() . ' ';
    echo $drawing->getCoordinates() . ' ';  // ex: B2

    $extension = pathinfo($drawing->getPath(), PATHINFO_EXTENSION);
    $contents = file_get_contents($drawing->getPath());
}
```
