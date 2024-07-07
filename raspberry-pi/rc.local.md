# rc.local

```
$ sudo vi /etc/rc.local
#!/bin/sh
...
```

```
$ sudo chmod 755 /etc/rc.local
```

```
$ sudo systemctl enable rc-local.service
$ sudo systemctl start rc-local.service
```
