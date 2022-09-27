# sqlcmd

```
sqlcmd -S 192.168.1.1 \
    -U sa \
    -P password \
    -d test \
    -Q "sp_tables"
```

## mysql vs mssql

| mysql | mssql |
|-------|-----|
| SHOW TABLES | sp_tables |
| SHOW DATABASES | sp_databases |

## Error: self-signed certificate

```
[ubuntu-22.04]$ sqlcmd -?
Microsoft (R) SQL Server Command Line Tool
Version 18.1.0001.1 Linux
Copyright (C) 2017 Microsoft Corporation. All rights reserved.
...

[ubuntu-22.04]$ sqlcmd -S 192.168.1.10 -U sa
Password:
Sqlcmd: Error: Microsoft ODBC Driver 18 for SQL Server : SSL Provider: [error:0A000086:SSL routines::certificate verify failed:self-signed certificate].
Sqlcmd: Error: Microsoft ODBC Driver 18 for SQL Server : Client unable to establish connection.

[ubuntu-22.04]$ sqlcmd -S 192.168.1.10 -U sa -C
Password:

1> SELECT @@VERSION
2> go

---------------------------------------------------------------------
Microsoft SQL Server 2019 (RTM) - 15....
    Copyright (C) 2019 Microsoft Corporation
    Developer Edition (64-bit) on Windows 10 Pro 10.0 <X64> (Build ..


(1 rows affected)
```

## Error: unsupported protocol

```
Sqlcmd: Error: Microsoft ODBC Driver 18 for SQL Server : SSL Provider: [error:0A000102:SSL routines::unsupported protocol].
Sqlcmd: Error: Microsoft ODBC Driver 18 for SQL Server : Client unable to establish connection.
```

```
# /etc/ssl/openssl.cnf
...
[system_default_sect]
#CipherString = DEFAULT:@SECLEVEL=2
CipherString = DEFAULT@SECLEVEL=0
```

```
$ sqlcmd -S 192.168.1.10 -U sa -C

2> SELECT @@VERSION
3> go

---------------------------------------------------------------------
Microsoft SQL Server 2012 - 11.0....
    Copyright (c) Microsoft Corporation
    Enterprise Edition (64-bit) on Windows NT 6.2 <X64> (Build ...: )


(1 rows affected)
```
