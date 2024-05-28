# PHP

## PHP 8.0

```
$ sudo dnf module install php:8.0
```

```
$ php -v
PHP 8.0.30 (cli) (built: Aug  3 2023 17:13:08) ( NTS gcc x86_64 )
Copyright (c) The PHP Group
Zend Engine v4.0.30, Copyright (c) Zend Technologies
```

## PHP 8.1

```
dnf install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm

dnf install https://rpms.remirepo.net/enterprise/remi-release-8.rpm

dnf module reset php

dnf module install php:remi-8.1
```
