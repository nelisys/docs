# mssql

query all table names

```sql
SELECT TABLE_NAME
  FROM INFORMATION_SCHEMA.TABLES
 WHERE TABLE_TYPE = 'BASE TABLE'
 ORDER BY TABLE_NAME"
```

query last update for each table

```sql
SELECT name, last_user_update
  FROM sys.dm_db_index_usage_stats us
  JOIN sys.tables t
    ON t.object_id = us.object_id
 WHERE database_id = db_id()
```

backup db with compression

```sql
BACKUP DATABASE [db_name] TO DISK = 'db.bak' WITH FORMAT, COMPRESSION;
GO
```
