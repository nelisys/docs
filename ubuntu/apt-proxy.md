# apt proxy

```console
$ sudo vi /etc/apt/apt.conf.d/99proxy
Acquire::http::Proxy "http://192.168.1.1:3128";
```

with username, password
```
Acquire::http::Proxy "http://[username]:[password]@192.168.1.1:3128";
```
