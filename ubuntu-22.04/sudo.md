# visudo

## set sudo without enter password

allow `alice` to run sudo without enter password

```console
$ sudo visudo
...
# Allow members of group sudo to execute any command
%sudo   ALL=(ALL:ALL) ALL
alice ALL=(ALL:ALL) NOPASSWD: ALL
```
