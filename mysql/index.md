# index

## EXPLAIN : type

### const, eq_ref

perform B-TREE to find a single value.

ex: `where id = 123`

### ref, range

perform B-TREE to find the starting point.

ex: `where id > 100`

### index

full index scan.

ex: create index (`user_id`, `created_at`), but when query specify only `created_at`

### all

full text scan, not use and index.

