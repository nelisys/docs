# Design Pattern : Adapter

## Installation

```console
$ composer dump-autoload

$ php index.php
```

## Example

```php
$book = new Book;
$person->read($book);

$kindle = new Kindle;
$kindleReaderAdapter = new ReaderAdapter($kindle);
$person->read($kindleReaderAdapter);
```

## References
- [Design Patterns in PHP : Episode 2 - Gettin' Jiggy With Adapters](https://laracasts.com/series/design-patterns-in-php/episodes/2)
