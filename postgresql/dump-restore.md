# Dump and Restore

## create test data

```sh
$ psql postgres
```

```sql
CREATE DATABASE test;
```

```sh
$ psql test
```

```sql
CREATE TABLE items (
  id int,
  name text
);
```

```
test=# \dt
        List of relations
 Schema | Name  | Type  |  Owner
--------+-------+-------+---------
 public | items | table | supasin
```

```sql
insert into items values (1, 'Alice');
insert into items values (2, 'Bob');
insert into items values (3, 'Chris');
```

## pg_dump

```
pg_dump -Ft -b -d test > test-backup.tar
```

## pg_restore

```sql
DROP TABLE items;
```

```sh
$ pg_restore -v -Ft -d test test-backup.tar
pg_restore: connecting to database for restore
pg_restore: creating TABLE "public.items"
pg_restore: processing data for table "public.items"
```
