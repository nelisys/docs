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
