# ODB

## MacOS Installation

```console
$ brew install unixodbc freetds
```

## Connect

```python
import pyodbc

try:
    conn = pyodbc.connect(
        server = '192.168.1.1',
        database = 'mydb',
        user = 'sa',
        tds_version = '7.4',
        password = 'password'
        port = 1433,
        driver='/usr/local/lib/libtdsodbc.so'
    )

    dc = conn.cursor()

    rows = dc.execute("select @@VERSION").fetchall()
    print(rows)

    dc.close()
    conn.close()

except Exception as ex:
    print(ex)

# output
# ------
# [('Microsoft SQL Server 2008 R2 (SP2) - 10.50.4000.0 (X64) \n\tJun 28 2012 08:36:30 \n\tCopyright (c) Microsoft Corporation\n\tExpress Edition with Advanced Services (64-bit) on Windows NT 6.2 <X64> (Build 9200: ) (Hypervisor)\n', )]
```
