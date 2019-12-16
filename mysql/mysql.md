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

## in array

```sql
mysql> SELECT * FROM students WHERE id IN (1, 3);
```

## open editor to create the query

```sql
mysql> edit
```

## temporary disable/enable foreign key

disable

```sql
mysql> SET FOREIGN_KEY_CHECKS=0;
```

re-enable

```sql
mysql> SET FOREIGN_KEY_CHECKS=1;
```
