# Design Pattern : Template Method

## Installation

```console
$ composer dump-autoload

$ php index.php
```

## Example

```php
// make()
//   ->layBread()
//   ->addLettuce()
//   ->addToppings() ** difference between TurkishSub and VeggiesSub
//   ->addSauces()
$turkish = new TurkishSub;
$turkish->make();

$veggies = new VeggiesSub;
$veggies->make();
```

## References
- [Design Patterns in PHP : Episode 3 - The Template Method Pattern](https://laracasts.com/series/design-patterns-in-php/episodes/3)
