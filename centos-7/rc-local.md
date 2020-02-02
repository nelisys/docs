# Enable rc.local

```console
$ ls -l /etc/rc.local
lrwxrwxrwx. 1 root root 13 Dec 31 22:41 /etc/rc.local -> rc.d/rc.local

$ ls -l /etc/rc.d/rc.local
-rw-r--r--. 1 root root 568 Feb  1 20:08 /etc/rc.d/rc.local

$ sudo chmod u+x /etc/rc.d/rc.local

$ sudo systemctl status rc-local
● rc-local.service - /etc/rc.d/rc.local Compatibility
   Loaded: loaded (/usr/lib/systemd/system/rc-local.service; static; vendor preset: disabled)
   Active: inactive (dead)

$ sudo systemctl enable rc-local
```
