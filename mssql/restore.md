# MSSQL Restore

## Restore DB on Linux

```
$ sqlcmd -S localhost -U sa \
    -Q "RESTORE DATABASE [MS_DB]
           FROM DISK = N'/tmp/MS_DB.bak'
           WITH MOVE 'MS_DB' TO '/var/opt/mssql/data/MS_DB.mdf',
                MOVE 'MS_DB_log' TO '/var/opt/mssql/data/MS_DB_log.ldf'"
```
