# Design Pattern : Chain of Responsibility

## Installation

```console
$ composer dump-autoload

$ php index.php
```

Try change the value in `src/HomeStatus.php`, and run `index.php`.

```php
class HomeStatus
{
    public $isLocked = true;
    public $lightOff = false;
    public $alarmOn = true;
}
```

## References
- [The Chain of Responsibility](https://laracasts.com/series/design-patterns-in-php/episodes/5)
