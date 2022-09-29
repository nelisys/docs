# JSON

## Array

```mysql
create table tests (data json);

insert into tests values (json_array(10, 11, 12));
insert into tests values (json_array(20, 21, 22));
insert into tests values (json_array(30, 31, 32));

select data->"$[0]" from tests;
+--------------+
| data->"$[0]" |
+--------------+
| 10           |
| 20           |
| 30           |
+--------------+
```

## Object

```mysql
create table tests (id int, data json);

insert into tests values (1, json_object('name', 'Alice'));
insert into tests values (2, json_object('name', 'Bob', 'more', json_object('age', 30)));
insert into tests values (3, json_object('name', 'Chris'));

select id, data->'$.name', data->'$.more.age' from tests;

+------+----------------+--------------------+
| id   | data->'$.name' | data->'$.more.age' |
+------+----------------+--------------------+
|    1 | "Alice"        | NULL               |
|    2 | "Bob"          | 30                 |
|    3 | "Chris"        | NULL               |
+------+----------------+--------------------+
```

## Pretty

```mysql
select json_pretty(data) from tests where id = 2;

+----------------------------------------------------+
| JSON_PRETTY(data)                                  |
+----------------------------------------------------+
| {
  "more": {
    "age": 30
  },
  "name": "Bob"
} |
+----------------------------------------------------+
```

## Functions

### JSON_EXTRACT()

```
SELECT id,
       JSON_EXTRACT(options, '$.name'),
       options->'$.name',
       options->>'$.name'
  FROM tests
```

### JSON_INSERT()

inserts values without replacing existing values.

```
UPDATE tests
   SET options = JSON_INSERT(options, '$.name', 'Alice')
 WHERE id = 1;
```

### JSON_REPLACE()

replaces only existing values.

```
UPDATE tests
   SET options = JSON_REPLACE(options, '$.name', 'Bob')
 WHERE id = 1;
```

### JSON_SET()

replaces existing values and adds nonexisting values.

```
UPDATE tests
   SET options = JSON_SET(options, '$.name', 'Chris')
 WHERE id = 1;
```

### JSON_REMOVE()

removes data from a JSON documen

```
UPDATE tests
   SET options = JSON_REMOVE(options, '$.name')
 WHERE id = 1;
```
