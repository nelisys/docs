# mssql

## installation

```console
$ curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
$ curl https://packages.microsoft.com/config/ubuntu/18.04/prod.list > /etc/apt/sources.list.d/mssql-release.list

$ sudo apt-get update
$ apt-get install msodbcsql17
$ sudo ACCEPT_EULA=Y apt-get install mssql-tools

$ printf "; priority=20\nextension=sqlsrv.so\n" > /etc/php/7.2/mods-available/sqlsrv.ini

$ printf "; priority=30\nextension=pdo_sqlsrv.so\n" > /etc/php/7.2/mods-available/pdo_sqlsrv.ini

$ phpenmod -v 7.2 sqlsrv pdo_sqlsrv
```

