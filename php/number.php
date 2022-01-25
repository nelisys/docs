# PHP Number

## Installation

```
$ composer require rundiz/number
```

## Usage

```php
// Thai
use Rundiz\Number\NumberThai;

$numberThai = new NumberThai();
$numberThai->convertBaht(1234.56);
// หนึ่งพันสองร้อยสามสิบสี่บาทห้าสิบหกสตางค์

```

```php
// English
use Rundiz\Number\NumberEng;

$numberEng = new NumberEng();
$numberEng->convertNumber(1234.56);
// "one thousand, two hundred and thirty-four point five six"
```

