# curl

## save output

`-o` specify file name to save

```console
$ curl -o example-web.html http://www.example.com/

$ ls -1
example-web.html
```

`-O` save file with the named as the remote file

```console
$ curl -O http://www.example.com/index.html

$ ls -1
index.html
```

## basic authentication

```console
$ curl --user username:password http://www.example.com/api
```

## header

```console
$ curl --header 'X-key: value'
```

## ssl

```console
$ curl --insecure https://192.168.1.1/
```

## follow redirect

```console
$ curl -L ...
```

## curl json

```
curl \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "Content-Type: application/json" \
    -d "{\"username\":\"admin\",\"password\":\"secret\"}" \
    https://example.com/v1/auth
```
