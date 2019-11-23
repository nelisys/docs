# copy MySQL table

```sql
mysql> CREATE TABLE another_students LIKE students;

mysql> INSERT INTO another_students SELECT * FROM students;
```
