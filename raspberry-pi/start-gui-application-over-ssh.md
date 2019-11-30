# Start GUI Application over SSH

create file `.ssh/config` on `pi`

```
pi@raspberry:~ $ vi .ssh/config
Host raspberry
    User pi
    Hostname raspberry
    Compression yes
    ForwardX11 yes
```

from ssh client, ex: PuTTY, or Terminal

```
$ ssh -l pi 192.168.2.10 "DISPLAY=:0 x-www-browser"
```
