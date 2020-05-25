# apparmor

## check status

```console
$ sudo apparmor_status
apparmor module is loaded.
16 profiles are loaded.
16 profiles are in enforce mode.
....
```

## disable apparmor

```
$ sudo systemctl stop apparmor
$ sudo systemctl disable apparmor
```
