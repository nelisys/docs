# tinker

## add php manual

Download PHP manual in sqlite format from [PHP Manual](https://github.com/bobthecow/psysh/wiki/PHP-manual)

```console
$ cp php_manual.sqlite ~/.local/share/psysh/
```

```console
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.2.19 — cli) by Justin Hileman

>>> doc in_array
function in_array($needle, $haystack, $strict = unknown)

Description:
  Checks if a value exists in an array

  Searches for $needle in $haystack using loose comparison unless $strict is set.
...
```
