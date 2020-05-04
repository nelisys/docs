# php-fpm

## upstream timed out (60: Operation timed out) while reading response header from upstream,

```
    location ~ [^/]\.php(/|$) {
        ...
        fastcgi_read_timeout 120;
    }
```
