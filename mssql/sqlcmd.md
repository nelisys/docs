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
