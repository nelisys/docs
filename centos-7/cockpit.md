# Cockpit on CentOS 7

## install

```console
$ sudo yum install cockpit -y
```

```console
$ sudo systemctl enable --now cockpit.socket
```

```console
$ sudo firewall-cmd --permanent --zone=public --add-service=cockpit
$ sudo firewall-cmd --reload
```
