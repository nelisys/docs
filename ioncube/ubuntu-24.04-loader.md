# Ubuntu 24.04 Loader

## download loader file

https://downloads.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz

```
$ tar zxvf ioncube_loaders_lin_x86-64.tar.gz

$ cd ioncube
$ sudo cp ioncube_loader_lin_8.3.so /usr/lib/php/20230831/
```

## create ini file

```
$ sudo vi /etc/php/8.3/mods-available/ioncube.ini
zend_extension = /usr/lib/php/20230831/ioncube_loader_lin_8.3.so
```

## cli

```
$ /etc/php/8.3/cli/conf.d/
$ sudo ln -s /etc/php/8.3/mods-available/ioncube.ini 00-ioncube.ini
```

```
$ php -v
PHP 8.3.6 (cli) (built: Dec  2 2024 12:36:18) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.3.6, Copyright (c) Zend Technologies
    with the ionCube PHP Loader v14.4.0, Copyright (c) 2002-2025, by ionCube Ltd.
    with Zend OPcache v8.3.6, Copyright (c), by Zend Technologies
```

## fpm

```
$ /etc/php/8.3/fpm/conf.d/
$ sudo ln -s /etc/php/8.3/mods-available/ioncube.ini 00-ioncube.ini
```

```
sudo systemctl restart php8.3-fpm
```
