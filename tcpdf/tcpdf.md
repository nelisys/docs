# TCPF

```php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage();
$pdf->cell(0, 8, 'Hello TCPDF', 'TRBL', 1, 'C');

$pdf->Output('hello.pdf', 'I');
```
