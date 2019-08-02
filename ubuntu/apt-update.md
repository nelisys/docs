# apt update & upgrade

```console
$ sudo apt update

$ sudo apt upgrade -y
```

## check whether reboot required after update

```console
$ ls -l /var/run/reboot-required*
-rw-r--r-- 1 root root 32 Aug  2 11:07 /var/run/reboot-required
-rw-r--r-- 1 root root 21 Aug  2 11:07 /var/run/reboot-required.pkgs

$ cat /var/run/reboot-required
*** System restart required ***

$ cat /var/run/reboot-required.pkgs
linux-base
libssl1.1
```

reboot

```console
$ sudo shutdown -r now
```

after reboot

```
$ ls -l /var/run/reboot-required*
ls: cannot access '/var/run/reboot-required*': No such file or directory
```

