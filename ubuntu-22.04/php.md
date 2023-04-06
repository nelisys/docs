# php

## Install

```
$ sudo apt install -y php8.1-fpm
```

```
$ systemctl status php8.1-fpm
```

### Install PHP Modules to run Laravel

```
$ sudo apt install -y php8.1-zip \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-pdo-sqlite \
    php8.1-pdo-mysql \
    php8.1-gd \
    php8.1-curl \
    php-redis
```

## Configuration

```
; /etc/php/8.1/fpm/php.ini
upload_max_filesize = 64M
```

```
$ sudo systemctl restart php8.1-fpm
```
