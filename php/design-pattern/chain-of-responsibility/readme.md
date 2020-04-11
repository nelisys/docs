# Design Pattern : Chain of Responsibility

## Installation

```console
$ composer dump-autoload

$ php index.php
```

## Example

```php
$lock = new Lock;
$light = new Light;
$alarm = new Alarm;

$lock->setNext($light);
$light->setNext($alarm);

$lock->check($status);
```

Try change the value in `src/HomeStatus.php`, then run `index.php` and see the Exception thrown

```php
class HomeStatus
{
    public $isLocked = true;
    public $lightOff = false;
    public $alarmOn = true;
}
```

## References
- [Design Patterns in PHP : Episode 5 - The Chain of Responsibility](https://laracasts.com/series/design-patterns-in-php/episodes/5)
