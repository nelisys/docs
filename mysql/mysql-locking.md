# MySQL Locking

## prepare the table

prepare test table

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

## LOCK READ

---

On the 1st session

```mysql
root@test> SELECT CONNECTION_ID();
+-----------------+
| CONNECTION_ID() |
+-----------------+
|             316 |
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

`LOCK TABLE` with `READ`

```mysql
mysql-1st> LOCK TABLE students READ;
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
ERROR 1099 (HY000): Table 'students' was locked with a READ lock and can't be updated
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

---

On the 2nd session

```mysql
mysql-2nd> SELECT CONNECTION_ID();
+-----------------+
| CONNECTION_ID() |
+-----------------+
|             317 |
+-----------------+

mysql-2nd> SELECT * FROM students;
+----+-------+
| id | name  |
+----+-------+
|  1 | Alice |
|  2 | Bob   |
|  3 | Chris |
+----+-------+
3 rows in set (0.00 sec)
```

try insert the data, the prompt not return until the table is unlock

```mysql
mysql-2nd> INSERT INTO students VALUES (NULL, 'Eric');
```

---

back to 1st session

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

`UNLOCK TABLES`

```mysql
mysql-1st> UNLOCK TABLES;
Query OK, 0 rows affected (0.00 sec)
```

the data inserted by the 2nd session will be returned

```mysql
root@test> SELECT * FROM students;
+----+-------+
| id | name  |
+----+-------+
|  1 | Alice |
|  2 | Bob   |
|  3 | Chris |
|  4 | Eric  |
+----+-------+
4 rows in set (0.00 sec)
```

