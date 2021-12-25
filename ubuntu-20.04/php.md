# php

## Install

```
$ sudo apt install -y php7.4-fpm
```

```
$ systemctl status php7.4-fpm
```

### Install PHP Modules to run Laravel

```
$ sudo apt install -y php7.4-zip \
    php7.4-mbstring \
    php7.4-xml \
    php7.4-pdo-sqlite \
    php7.4-pdo-mysql \
    php7.4-gd \
    php7.4-curl \
    php-redis
```

## Configuration

```
; /etc/php/7.4/fpm/php.ini
upload_max_filesize = 64M
```

```
$ sudo systemctl restart php7.4-fpm
```
