# gitconfig

## user

```
$ git config --global user.name "My Name"
$ git config --global user.email "email@example.com"
```

```
$ cat ~/.gitconfig
# This is Git's per-user configuration file.
[user]
    name = My Name
    email = email@example.com
```

## http proxy

```
$ git config --global http.proxy http://192.168.1.1:3128
```

```
$ cat ~/.gitconfig
...
[http]
    proxy = http://192.168.1.1:3128
```
