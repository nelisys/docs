# Laravel Valet

## nginx

nginx error log file

```console
$ tail /Users/supasin/.config/valet/Log/nginx-error.log
```

## proxy

```
$ valet proxy my-react.test http://127.0.0.1:3000
```

```
$ valet proxies
+----------+-----+----------------------+-----------------------+
| Site     | SSL | URL                  | Host                  |
+----------+-----+----------------------+-----------------------+
| my-react |     | http://my-react.test | http://127.0.0.1:3000 |
+----------+-----+----------------------+-----------------------+
```

```
$ valet unproxy my-react.test
```
