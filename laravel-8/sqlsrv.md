# SQL Server

## disable query UUID as binary

```php
'sqlsrv' => [
    'driver' => 'sqlsrv',
    // ...
    'options' => [
        PDO::DBLIB_ATTR_STRINGIFY_UNIQUEIDENTIFIER => true,
    ],
],
```

## SQL name instance

```php
// config/database.php
        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => '192.168.1.1\NAMED_INSTANCE',
            'port' => null,
```
