# php.ini

## Ubuntu 18.04

```console
$ sudo vi /etc/php/7.2/fpm/php.ini

upload_max_filesize = 2M
post_max_size = 64M
memory_limit = 8192M
```

## show ini files

```console
$ php --ini
Configuration File (php.ini) Path: /usr/local/etc/php/8.1
Loaded Configuration File:         /usr/local/etc/php/8.1/php.ini
Scan for additional .ini files in: /usr/local/etc/php/8.1/conf.d
Additional .ini files parsed:      /usr/local/etc/php/8.1/conf.d/error_log.ini,
/usr/local/etc/php/8.1/conf.d/ext-opcache.ini,
/usr/local/etc/php/8.1/conf.d/php-memory-limits.ini
```
