# php

## Install

```
$ sudo apt install -y php8.3-fpm
```

```
$ systemctl status php8.3-fpm
```

### Install PHP Modules to run Laravel

```
$ sudo apt install -y php8.3-zip \
    php8.3-mbstring \
    php8.3-xml \
    php8.3-sqlite3 \
    php8.3-mysql \
    php8.3-gd \
    php8.3-curl \
    php-redis
```

## Configuration

```
; /etc/php/8.3/fpm/php.ini
upload_max_filesize = 64M
post_max_size = 64M
memory_limit = 512M
```

```
$ sudo systemctl restart php8.3-fpm
```
