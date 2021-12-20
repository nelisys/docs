# Laravel Valet

## nginx

nginx error log file

```console
$ tail /Users/supasin/.config/valet/Log/nginx-error.log
```

## link

```
$ valet link api.example

$ valet links
+-------------+-----+-------------------------+----------------------------------+
| Site        | SSL | URL                     | Path                             |
+-------------+-----+-------------------------+----------------------------------+
| api.example |     | http://api.example.test | /Users/supasin/Sites/example-api |
+-------------+-----+-------------------------+----------------------------------+
```

## proxy

```
$ valet proxy web.example.test http://127.0.0.1:3000
```

```
$ valet proxies
+-------------+-----+-------------------------+-----------------------+
| Site        | SSL | URL                     | Host                  |
+-------------+-----+-------------------------+-----------------------+
| web.example |     | http://web.example.test | http://127.0.0.1:3000 |
+-------------+-----+-------------------------+-----------------------+
```

```
$ valet unproxy web.example.test
```
