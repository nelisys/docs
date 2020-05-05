# errors

## client intended to send too large body

`/etc/nginx/nginx.conf`

```
http {
    ...
    client_max_body_size 64M;
```

## upstream timed out (60: Operation timed out) while reading response header from upstream,

php-fpm

```
    location ~ [^/]\.php(/|$) {
        ...
        fastcgi_read_timeout 120;
    }
```
