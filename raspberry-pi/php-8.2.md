# PHP 8.2

## Install

```
$ sudo apt install -y php8.2-fpm
```

```
$ systemctl status php8.2-fpm
```

### Install PHP Modules to run Laravel

```
$ sudo apt install -y php8.2-zip \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-sqlite3 \
    php8.2-mysql \
    php8.2-gd \
    php8.2-curl
```

## Configuration

```
; /etc/php/8.2/fpm/php.ini
upload_max_filesize = 64M
post_max_size = 64M
```

```
$ sudo systemctl restart php8.2-fpm
```
