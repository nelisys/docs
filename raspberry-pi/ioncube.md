# ioncube

Under `Linux ARM64 (aarch64 64 bits)`, click download file `ioncube_loaders_lin_aarch64.tar.gz`

```
$ sudo cp ioncube_loader_lin_8.2.so /usr/lib/php/20220829/
```

```
# /etc/php/8.2/mods-available/ioncube.ini
zend_extension = /usr/lib/php/20220829/ioncube_loader_lin_8.2.so
```

```
$ cd /etc/php/8.2/fpm/conf.d/
$ sudo ln -s /etc/php/8.2/mods-available/ioncube.ini 00-ioncube.ini

$ cd /etc/php/8.2/cli/conf.d/
$ sudo ln -s /etc/php/8.2/mods-available/ioncube.ini 00-ioncube.ini
```

```
$ php -v
PHP 8.2.28 (cli) (built: Mar 13 2025 18:21:38) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.2.28, Copyright (c) Zend Technologies
    with the ionCube PHP Loader v14.4.0, Copyright (c) 2002-2025, by ionCube Ltd.
    with Zend OPcache v8.2.28, Copyright (c), by Zend Technologies
```
