# Design Pattern : Observer

## Installation

```console
$ composer dump-autoload

$ php index.php
```

## Example

```php
$login = new LoginSubject;
$login->attach(new LogObserver);
$login->attach(new MailObserver);
$login->notify();
```

## References
- [Design Patterns in PHP : Episode 8 - Observe This, Fool](https://laracasts.com/series/design-patterns-in-php/episodes/8)
