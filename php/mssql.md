# mssql

## installation

```console
$ curl -O https://packages.microsoft.com/keys/microsoft.asc
$ curl -O https://packages.microsoft.com/config/ubuntu/18.04/prod.list

$ ls -1
microsoft.asc
prod.list

$ sudo apt-key add microsoft.asc
$ sudo mv prod.list /etc/apt/sources.list.d/mssql-release.list
```

```console
$ sudo apt update
$ sudo apt install -y msodbcsql17 mssql-tools
$ sudo apt install -y unixodbc-dev
$ sudo apt install -y php7.2-dev

$ sudo pecl install sqlsrv
$ sudo pecl install pdo_sqlsrv

$ sudo -
# printf "; priority=20\nextension=sqlsrv.so\n" > /etc/php/7.2/mods-available/sqlsrv.ini
# printf "; priority=30\nextension=pdo_sqlsrv.so\n" > /etc/php/7.2/mods-available/pdo_sqlsrv.ini

$ sudo phpenmod -v 7.2 sqlsrv pdo_sqlsrv
```

```console
$ php -m | grep sqlsrv
pdo_sqlsrv
sqlsrv
```
