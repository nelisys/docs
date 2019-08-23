# visudo

## set sudo without enter password

allow `supasin` to run sudo without enter password

```console
$ sudo visudo
...
# Allow members of group sudo to execute any command
%sudo   ALL=(ALL:ALL) ALL
supasin ALL=(ALL:ALL) NOPASSWD: ALL

```
