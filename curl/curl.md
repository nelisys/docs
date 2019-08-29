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

