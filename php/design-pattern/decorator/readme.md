# Design Pattern : Decorator

## Installation

```console
$ composer dump-autoload

$ php index.php
```

## Example

```php
$basic = new BasicInspection();

$all_services = new TireRotation((new OilChange($basic)));
```

## References
- [The Decorator Pattern](https://laracasts.com/series/design-patterns-in-php/episodes/1)
