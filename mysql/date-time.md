# Date Time

## format

```sql
mysql> SELECT DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%S')
```

| format            | example             |
| ----------------- | ------------------- |
| %Y-%m-%d %H:%i:%S | 2020-05-30 19:12:29 |

## current date

```sql
mysql> SELECT CURRENT_DATE;
+--------------+
| CURRENT_DATE |
+--------------+
| 2020-05-31   |
+--------------+
```

## convert unix timestamp to date time

```sql
mysql> SELECT FROM_UNIXTIME(1590068895);
+---------------------------+
| FROM_UNIXTIME(1590068895) |
+---------------------------+
| 2020-05-21 20:48:15       |
+---------------------------+
```
