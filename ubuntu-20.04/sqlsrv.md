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

```
$ cd openssl-OpenSSL_1_1_1m/

$ ./config

$ make

$ sudo make install
```

## Installed Files

```
$ ls -l /usr/local/lib/
-rw-r--r-- 1 root root  5780720 Jan 15 13:37 libcrypto.a
lrwxrwxrwx 1 root root       16 Jan 15 13:37 libcrypto.so -> libcrypto.so.1.1
-rwxr-xr-x 1 root root  3394592 Jan 15 13:37 libcrypto.so.1.1
-rw-r--r-- 1 root root  1050998 Jan 15 13:37 libssl.a
lrwxrwxrwx 1 root root       13 Jan 15 13:37 libssl.so -> libssl.so.1.1
-rwxr-xr-x 1 root root   706696 Jan 15 13:37 libssl.so.1.1

$ sudo ldconfig
```

```
$ ls -l /usr/local/bin/openssl
-rwxr-xr-x 1 root root 873464 Jan 15 13:37 /usr/local/bin/openssl

$ openssl version
OpenSSL 1.1.1m  14 Dec 2021
```
