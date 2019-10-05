# redis

```
$ redis-cli -v
redis-cli 5.0.5
```

```
$ redis-cli
127.0.0.1:6379> FLUSHALL
OK

127.0.0.1:6379> KEYS *
(empty list or set)

127.0.0.1:6379> SET name Alice
OK

127.0.0.1:6379> KEYS *
1) "name"

127.0.0.1:6379> GET name
"Alice"

127.0.0.1:6379> DEL name
(integer) 1

127.0.0.1:6379> KEYS *
(empty list or set)

127.0.0.1:6379>
```

## prefix

- L = List, Array
- S = Set, Unique Array
- Z = Sorted Set, Sorted Unique Array
- H = Hash, Object, Associate Array
