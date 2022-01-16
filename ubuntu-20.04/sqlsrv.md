# sqlsrv

## Error connnect to SQL 2008

```
$ /opt/mssql-tools/bin/sqlcmd -S <sql-2008> -U sa
Sqlcmd: Error: Microsoft ODBC Driver 17 for SQL Server : SSL Provider: [error:1425F102:SSL routines:ssl_choose_client_version:unsupported protocol].
Sqlcmd: Error: Microsoft ODBC Driver 17 for SQL Server : Client unable to establish connection.
```

## Troubleshooting

```
$ wget 'https://github.com/openssl/openssl/archive/refs/tags/OpenSSL_1_1_1m.tar.gz'

$ tar zxvf OpenSSL_1_1_1m.tar.gz
```

Note: default `config` will install files in `/usr/local/lib`

```
$ cd openssl-OpenSSL_1_1_1m/

$ ./config --prefix=/usr/local/openssl-1.1.1m

$ make

$ sudo make install
```

## Installed Files

```
$ ls -l /usr/local/openssl-1.1.1m/
drwxr-xr-x 2 root root 4096 Jan 15 14:37 bin
drwxr-xr-x 3 root root 4096 Jan 15 14:37 include
drwxr-xr-x 4 root root 4096 Jan 15 14:37 lib
drwxr-xr-x 4 root root 4096 Jan 15 14:38 share
drwxr-xr-x 5 root root 4096 Jan 15 14:37 ssl

$ ls -l /usr/local/openssl-1.1.1m/bin/
-rwxr-xr-x 1 root root   6176 Jan 15 14:37 c_rehash
-rwxr-xr-x 1 root root 873464 Jan 15 14:37 openssl

$ ls -l /usr/local/openssl-1.1.1m/lib/
```

## Run command

Note: You can add lib installed `/usr/local/openssl-1.1.1m/lib` path in `/etc/ld.so.conf`, then run `sudo ldconfig`. But I don't want to affect other programs that may use the default Ubuntu installed version.

```
$ export LD_LIBRARY_PATH=/usr/local/openssl-1.1.1m/lib

$ /opt/mssql-tools/bin/sqlcmd -S <sql-2008> -U sa
Password:

1> select @@version
1> go

Microsoft SQL Server 2008 R2 (SP2) - 10.50.4042.0 (X64)
```
