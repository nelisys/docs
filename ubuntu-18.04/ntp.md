# ntp

## install

```console
$ sudo apt install -y ntp ntpdate
```

## ntpdate

```console
$ sudo systemctl stop ntp

$ sudo ntpdate time.nist.gov
17 Sep 21:58:09 ntpdate[3450]: adjust time server 132.163.96.1 offset -0.000743 sec

$ sudo systemctl start ntp
```

## ntpq

```console
$ ntpq -p
     remote           refid      st t when poll reach   delay   offset  jitter
==============================================================================
 0.ubuntu.pool.n .POOL.          16 p    -   64    0    0.000    0.000   0.000
 1.ubuntu.pool.n .POOL.          16 p    -   64    0    0.000    0.000   0.000
 2.ubuntu.pool.n .POOL.          16 p    -   64    0    0.000    0.000   0.000
 3.ubuntu.pool.n .POOL.          16 p    -   64    0    0.000    0.000   0.000
 ntp.ubuntu.com  .POOL.          16 p    -   64    0    0.000    0.000   0.000
 crimson.en.kku. .PPS.            1 u   60   64    1   10.154  -18.525   0.092
*ntp1.bknix.co.t .GPS.            1 u   55   64    1    2.439    0.003   1.972
+static-119-110- 203.147.59.16    2 u   55   64    1    5.930    0.636   1.943
-202.28.102.69   202.28.103.160   2 u   52   64    1    3.413   -1.856   7.124
```
