# loader

## download loader file

https://downloads.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz

```
$ tar zxvf ioncube_loaders_lin_x86-64.tar.gz

$ cd ioncube
$ sudo cp ioncube_loader_lin_8.1.so /usr/lib/php/20210902
```

## create ini file

/etc/php/8.1/cli/conf.d/00-ioncube.ini
/etc/php/8.1/fpm/conf.d/00-ioncube.ini

```
zend_extension = /usr/lib/php/20210902/ioncube_loader_lin_8.1.so
```

```
sudo systemctl restart php8.1-fpm
```
