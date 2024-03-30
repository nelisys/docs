# PHP

## install

```
$ sudo apt install php7.2-fpm

$ php -v
PHP 7.2.9-1+b2 (cli) (built: Aug 19 2018 06:56:13) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.2.9-1+b2, Copyright (c) 1999-2018, by Zend Technologies

$ php -m
[PHP Modules]
calendar
Core
ctype
date
exif
fileinfo
filter
ftp
gettext
hash
iconv
json
libxml
openssl
pcntl
pcre
PDO
Phar
posix
readline
Reflection
session
shmop
sockets
sodium
SPL
standard
sysvmsg
sysvsem
sysvshm
tokenizer
Zend OPcache
zlib

[Zend Modules]
Zend OPcache
```

```
$ systemctl status php7.2-fpm
● php7.2-fpm.service - The PHP 7.2 FastCGI Process Manager
   Loaded: loaded (/lib/systemd/system/php7.2-fpm.service; enabled; vendor preset: enabled)
   Active: active (running) since Sun 2019-12-01 14:16:48 +07; 50s ago
     Docs: man:php-fpm7.2(8)
 Main PID: 7260 (php-fpm7.2)
   Status: "Processes active: 0, idle: 2, Requests: 0, slow: 0, Traffic: 0req/sec"
    Tasks: 3 (limit: 2200)
   Memory: 4.8M
   CGroup: /system.slice/php7.2-fpm.service
           ├─7260 php-fpm: master process (/etc/php/7.2/fpm/php-fpm.conf)
           ├─7261 php-fpm: pool www
           └─7262 php-fpm: pool www

Dec 01 14:16:48 pix7 systemd[1]: Starting The PHP 7.2 FastCGI Process Manager...
Dec 01 14:16:48 pix7 systemd[1]: Started The PHP 7.2 FastCGI Process Manager.
```

```
$ sudo vi /etc/nginx/sites-enabled/default
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html/web/public;
    index index.php index.html;

    server_name _;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.2-fpm.sock;
    }
}

$ sudo chown -R pi /var/www/html/
$ mkdir -p /var/www/html/web/public
$ touch /var/www/html/web/public/index.php

$ sudo systemctl restart nginx
```

## Composer

```
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

$ php composer-setup.php
$ rm -f composer-setup.php

$ sudo chown -R pi /usr/local/bin/

$ cp composer.phar /usr/local/bin/composer
$ rm -f composer.phar
```

## Laravel

```
$ sudo apt install -y php7.2-zip \
    php7.2-mbstring \
    php7.2-xml \
    php7.2-pdo-sqlite \
    php7.2-pdo-mysql
```

```
$ composer create-project --prefer-dist laravel/laravel blog
```
