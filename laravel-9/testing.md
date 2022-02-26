# Testing

## Test Coverage

Requires `xdebug`

### Install and Configure PHP xdebug

```
pecl install xdebug
```

Load `xdebug.so` in ini file

```
; /usr/local/etc/php/8.1/conf.d/99-xdebug.ini
zend_extension="xdebug.so"
xdebug.mode="coverage"
```

```
$ php -v
PHP 8.1.3 (cli) (built: Feb 18 2022 09:32:50) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.1.3, Copyright (c) Zend Technologies
    with Zend OPcache v8.1.3, Copyright (c), by Zend Technologies
    with Xdebug v3.1.3, Copyright (c) 2002-2022, by Derick Rethans
```

### Error: If no xdebug enabled

```
$ php artisan test --coverage

   ERROR  Code coverage driver not available.
```

### Error: If no xdebug.mode set

```
$ php artisan test --coverage

   ERROR  Code coverage driver not available. Did you set Xdebug's coverage mode?
```
