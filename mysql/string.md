# MySQL String

```mysql
mysql> SELECT SUBSTRING_INDEX('Alice|A.|25', '|', 1);
-- Alice

mysql> SELECT SUBSTRING_INDEX('Alice|A.|25', '|', -1);
-- 25
```
