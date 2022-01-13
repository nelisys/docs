# TCPF

```php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetMargins(10, 10);

$pdf->AddPage();
$pdf->cell(0, 8, 'Hello TCPDF', 'TRBL', 1, 'C');

// save to file
$pdf->Output('hello.pdf', 'I');
```
