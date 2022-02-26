# valet link

- link dev laravel or api project to another hostname.

## link

```console
$ cd ~/Sites/example-api/

$ valet link api.example
```

You can now access (http://api.example.test).

## links

```
$ valet links
+-------------+-----+-------------------------+----------------------------------+
| Site        | SSL | URL                     | Path                             |
+-------------+-----+-------------------------+----------------------------------+
| api.example |     | http://api.example.test | /Users/supasin/Sites/example-api |
+-------------+-----+-------------------------+----------------------------------+
```

## unlink

```
$ valet unlink api.example
```
