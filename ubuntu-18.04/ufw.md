# ufw

## allow ssh

```console
$ sudo ufw allow ssh
```

## default policy

```console
$ sudo ufw default deny incoming

$ sudo ufw default allow outgoing
```

## enable ufw

```console
$ sudo ufw enable
```

## allow others

``` console
$ sudo ufw allow proto tcp from 10.0.0.0/8 to any port 80
```

## status

status

```console
$ sudo ufw status
Status: active

To                         Action      From
--                         ------      ----
22/tcp                     ALLOW       Anywhere
80/tcp                     ALLOW       10.0.0.0/8
22/tcp (v6)                ALLOW       Anywhere (v6)
```

status verbose

```console
$ sudo ufw status verbose
Status: active
Logging: on (low)
Default: deny (incoming), allow (outgoing), disabled (routed)
New profiles: skip

To                         Action      From
--                         ------      ----
22/tcp                     ALLOW IN    Anywhere
80/tcp                     ALLOW IN    10.0.0.0/8
22/tcp (v6)                ALLOW IN    Anywhere (v6)
```

status numbered

```console
$ sudo ufw status numbered
Status: active

     To                         Action      From
     --                         ------      ----
[ 1] 22/tcp                     ALLOW IN    Anywhere
[ 2] 80                         ALLOW IN    10.0.0.0/8
[ 3] 22/tcp (v6)                ALLOW IN    Anywhere (v6)
```

## delete

```console
$ sudo ufw delete 2
```
