# dompdf

```
$ composer require dompdf/dompdf
```

`test.html`

```html
<!doctype html>
<html>
<head>
<style>
@page {
    margin: 0px;
}

footer {
    position: fixed;
    bottom: 0px;
    left: 0px;
    right: 0px;
    height: 5px;
}

footer .page:after {
    content: counter(page, decimal);
}
</style>
</head>
<body>

<footer>
    <div class="page">Page </div>
</footer>

<div style="background-color: red; width: 210px; height: 290px">
    hello
</div>

<h1 style="page-break-before: always;">Page 2</h1>
```

`test-dompdf.php`

```php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->getOptions()->set([
    'chroot' => '/Users/supasin/Sites/dompdf',
    'dpi' => 25.4,  // set 25.4 to make 1 dot = 1mm. Default 96 dpi.
]);

$dompdf->setPaper('A4', 'portrait');
$dompdf->loadHtmlFile('test.html');
$dompdf->render();

$output = $dompdf->output();

header('Content-type: application/pdf');
echo $output;
```
