# PHPExcel

## instantiate PHP Excel Object

create new file

```php
$xls = new PHPExcel();
```

load from existing excel file

```php
$reader = PHPExcel_IOFactory::createReaderForFile('template.xls');
$xls = $reader->load('template.xls');
```

## set active sheet

```php
$sheet = $xls->getActiveSheet();
```

## set cell value

```php
$sheet->setCellValue('A1', 'Example Data');
```

## output

```php
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="example.xlsx"');
header('Cache-Control: max-age=0');

// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

PHPExcel_IOFactory::createWriter($xls, 'Excel2007')
    ->save('php://output');
```

