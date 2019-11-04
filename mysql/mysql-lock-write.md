# MySQL LOCK WRITE

## prepare the table

```mysql
CREATE TABLE students (
  id  INT AUTO_INCREMENT,
  name  VARCHAR(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO students VALUES (NULL, 'Alice');
INSERT INTO students VALUES (NULL, 'Bob');
INSERT INTO students VALUES (NULL, 'Chris');
```

## LOCK WRITE

On the 1st session

```mysql
root@test> SELECT CONNECTION_ID();
+-----------------+
| CONNECTION_ID() |
+-----------------+
|             101 |
+-----------------+
1 row in set (0.00 sec)

mysql-1st> SELECT * FROM students;
+----+-------+
| id | name  |
+----+-------+
|  1 | Alice |
|  2 | Bob   |
|  3 | Chris |
+----+-------+
3 rows in set (0.00 sec)
```

`LOCK TABLE` with `WRITE`

```mysql
mysql-1st> LOCK TABLE students WRITE;
Query OK, 0 rows affected (0.00 sec)
```

```mysql
mysql-1st> SELECT * FROM students;
+----+-------+
| id | name  |
+----+-------+
|  1 | Alice |
|  2 | Bob   |
|  3 | Chris |
+----+-------+
3 rows in set (0.00 sec)
```

try insert the data

```mysql
mysql-1st> INSERT INTO students VALUES (NULL, 'Dan');
Query OK, 1 row affected (0.00 sec)
```

```mysql
mysql-1st> SELECT * FROM students;
+----+-------+
| id | name  |
+----+-------+
|  1 | Alice |
|  2 | Bob   |
|  3 | Chris |
|  4 | Dan   |
+----+-------+
4 rows in set (0.00 sec)
```

---

On the 2nd session

```mysql
mysql-2nd> SELECT CONNECTION_ID();
+-----------------+
| CONNECTION_ID() |
+-----------------+
|             102 |
+-----------------+
```

try select the data, the prompt not return until the table is unlock

```mysql
mysql-2nd> SELECT * FROM students;
```

---

back to the 1st session

```mysql
mysql-1st> SELECT * FROM students;
+----+-------+
| id | name  |
+----+-------+
|  1 | Alice |
|  2 | Bob   |
|  3 | Chris |
|  4 | Dan   |
+----+-------+
4 rows in set (0.00 sec)
```

`UNLOCK TABLES`

```mysql
mysql-1st> UNLOCK TABLES;
Query OK, 0 rows affected (0.00 sec)
```

the 2nd session will be returned to prompt, and the result also show the data

```mysql
root@test> SELECT * FROM students;
+----+-------+
| id | name  |
+----+-------+
|  1 | Alice |
|  2 | Bob   |
|  3 | Chris |
|  4 | Dan   |
+----+-------+
4 rows in set (0.00 sec)
```
