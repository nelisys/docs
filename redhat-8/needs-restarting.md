# needs restarting

```console
$ sudo yum install yum-utils
```

```console
$ sudo needs-restarting
1 : /usr/lib/systemd/systemd --system --deserialize 20
597 : /usr/lib/systemd/systemd-journald
720 : /sbin/auditd
750 : /sbin/rngd -f
...
```

```console
$ sudo shutdown -r now
```

```console
$ sudo needs-restarting
```
