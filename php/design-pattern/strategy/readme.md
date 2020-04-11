# Design Pattern : Strategy

## Installation

```console
$ composer dump-autoload

$ php index.php
```

## Example

```php
$user = new User;
$user->log('Hello World!', new LogToFile);
$user->log('Hello World!', new LogToDatabase);
```

## References
- [Pick a Strategy](https://laracasts.com/series/design-patterns-in-php/episodes/4)
