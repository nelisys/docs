# valet proxy

## Use cases

- proxy to React project.

## proxy

```
$ valet proxy web.example.test http://127.0.0.1:3000
```

## proxies

```
$ valet proxies
+-------------+-----+-------------------------+-----------------------+
| Site        | SSL | URL                     | Host                  |
+-------------+-----+-------------------------+-----------------------+
| web.example |     | http://web.example.test | http://127.0.0.1:3000 |
+-------------+-----+-------------------------+-----------------------+
```

## unproxy

```
$ valet unproxy web.example.test
```
