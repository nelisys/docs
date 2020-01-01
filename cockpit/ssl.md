# ssl configuration

allow http connection

```console
$ sudo vi /etc/cockpit/cockpit.conf
[WebService]
AllowUnencrypted=true
```

```console
$ sudo systemctl restart cockpit.socket
```
