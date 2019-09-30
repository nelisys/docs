# mysql

## foreign key

set mysql to ignore foreign key constrain

```sql
mysql> SET foreign_key_checks = 0;
```

drop foreign key

```sql
mysql> ALTER TABLE students DROP FOREIGN KEY students_room_id_foreign;

mysql> ALTER TABLE students DROP KEY students_room_id_foreign;
```

## CONCAT

```sql
mysql> SELECT CONCAT('a', ':', 'b');
+-----------------------+
| CONCAT('a', ':', 'b') |
+-----------------------+
| a:b                   |
+-----------------------+
```
