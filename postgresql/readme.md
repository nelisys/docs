# postgresql

## connect

```console
$ sudo su - postgres

$ psql
psql (10.10 (Ubuntu 10.10-0ubuntu0.18.04.1))
Type "help" for help.

postgres=#
```

## show databases

```
postgres=# \list
                                  List of databases
   Name    |  Owner   | Encoding |   Collate   |    Ctype    |   Access privileges
-----------+----------+----------+-------------+-------------+-----------------------
 my-test   | odoo     | UTF8     | C           | en_US.UTF-8 |
 postgres  | postgres | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 template0 | postgres | UTF8     | en_US.UTF-8 | en_US.UTF-8 | =c/postgres          +
           |          |          |             |             | postgres=CTc/postgres
 template1 | postgres | UTF8     | en_US.UTF-8 | en_US.UTF-8 | =c/postgres          +
           |          |          |             |             | postgres=CTc/postgres
(4 rows)
```

## use database

```
postgres=# \c my-test
You are now connected to database "my-test" as user "postgres".
```

## show tables

```
my-test=# \dt
                              List of relations
 Schema |                        Name                         | Type  | Owner
--------+-----------------------------------------------------+-------+-------
 public | base_document_layout                                | table | odoo
 public | base_import_import                                  | table | odoo
 public | base_import_mapping                                 | table | odoo
...
```

## describe

```
my-test=# \d+ res_partner
                         Table "public.res_partner"
         Column          |            Type             |  ...
-------------------------+-----------------------------+- ...
 id                      | integer                     |  ...
 name                    | character varying           |  ...
 company_id              | integer                     |  ...
 create_date             | timestamp without time zone |  ...
```
