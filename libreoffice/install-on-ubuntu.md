# Install LibreOffice on Ubuntu 18.04

```console
$ sudo apt install libreoffice-common
$ sudo apt install libreoffice-java-common
$ sudo apt install libreoffice-calc
```

allow php-fpm to call libreoffice

```
$ cd /var/www/
$ sudo mkdir .cache
$ sudo chown www-data .cache

$ sudo mkdir .config
$ sudo chown www-data .config
```
