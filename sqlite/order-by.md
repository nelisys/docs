# SQLite ORDER BY

```console
$ sqlite3 students.sqlite
```

```sql
CREATE TABLE students (
    id INTEGER,
    name TEXT
);
```

```sql
INSERT INTO students VALUES (1, 'alice');
INSERT INTO students VALUES (2, 'Adam');
INSERT INTO students VALUES (3, 'bob');
INSERT INTO students VALUES (4, 'Bill');
```

```sqlite
sqlite> SELECT * FROM students ORDER BY name;
2|Adam
4|Bill
1|alice
3|bob

sqlite> SELECT * FROM students ORDER BY name DESC;
3|bob
1|alice
4|Bill
2|Adam
```

```console
sqlite> SELECT * FROM students ORDER BY name COLLATE NOCASE;
2|Adam
1|alice
4|Bill
3|bob

sqlite> SELECT * FROM students ORDER BY name COLLATE NOCASE DESC;
3|bob
4|Bill
1|alice
2|Adam
```

