# web console

## install

```console
$ sudo yum install -y cockpit

$ sudo systemctl enable --now cockpit.socket
```

## allow rules

```console
$ sudo firewall-cmd --add-service=cockpit --permanent

$ sudo firewall-cmd --reload
```

## web

https://localhost:9090
