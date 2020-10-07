# sqlsrv

## installation ubuntu

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

$ sudo su -
# printf "; priority=20\nextension=sqlsrv.so\n" > /etc/php/7.2/mods-available/sqlsrv.ini
# printf "; priority=30\nextension=pdo_sqlsrv.so\n" > /etc/php/7.2/mods-available/pdo_sqlsrv.ini

$ sudo phpenmod -v 7.2 sqlsrv pdo_sqlsrv
```

```console
$ php -m | grep sqlsrv
pdo_sqlsrv
sqlsrv
```

## pdo

```php

$DB_HOST = '192.168.1.1';
$DB_DATABASE = 'some_db';
$DB_USERNAME = 'some_user';
$DB_PASSWORD = 'some_password';

$DSN = "sqlsrv:server=tcp:{$DB_HOST},1433; Database={$DB_DATABASE}";

try {
    $db = new PDO($DSN, $DB_USERNAME, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

// - Server timeout 15 s
// SQLSTATE[HYT00]: [Microsoft][ODBC Driver 17 for SQL Server]Login timeout expired

// - Invalid login
// SQLSTATE[28000]: [Microsoft][ODBC Driver 17 for SQL Server][SQL Server]Login failed for user 'some_user'.

// - Invalid database
// SQLSTATE[42000]: [Microsoft][ODBC Driver 17 for SQL Server][SQL Server]Cannot open database "some_db" requested by the login. The login failed.
```

## installation mac

```
$ sudo pecl install sqlsrv
$ sudo pecl install pdo_sqlsrv
```

