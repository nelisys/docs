# Collectd

## Installation

```
$ sudo apt install collectd

$ systemctl status collectd
```

## Configuration

```
$ ls -l /etc/collectd/
-rw-r--r-- 1 root root 36107 May 30  2018 collectd.conf
drwxr-xr-x 2 root root  4096 Jan  4 08:09 collectd.conf.d
-rw-r--r-- 1 root root    64 Jan 14  2018 collection.conf
```

## rrd files

```
$ ls -l /var/lib/collectd/rrd/u20/
drwxr-xr-x 2 root root 4096 Jan  4 16:28 cpu-0
drwxr-xr-x 2 root root 4096 Jan  4 16:28 interface-enp0s3
drwxr-xr-x 2 root root 4096 Jan  4 16:28 interface-lo
drwxr-xr-x 2 root root 4096 Jan  4 16:28 irq
drwxr-xr-x 2 root root 4096 Jan  4 16:28 load
drwxr-xr-x 2 root root 4096 Jan  4 16:28 memory

$ ls -l /var/lib/collectd/rrd/u20/interface-enp0s3/
-rw-r--r-- 1 root root 295232 Jan  4 19:34 if_dropped.rrd
-rw-r--r-- 1 root root 295232 Jan  4 19:34 if_errors.rrd
-rw-r--r-- 1 root root 295232 Jan  4 19:34 if_octets.rrd
-rw-r--r-- 1 root root 295232 Jan  4 19:34 if_packets.rrd
```

## rrdtool

### rrdtool info

```
$ rrdtool info /var/lib/collectd/rrd/u20/interface-enp0s3/if_octets.rrd
filename = "/var/lib/collectd/rrd/u20/interface-enp0s3/if_octets.rrd"
rrd_version = "0003"
step = 10
last_update = 1641299711
header_size = 4928
ds[rx].index = 0
ds[rx].type = "DERIVE"
ds[rx].minimal_heartbeat = 20
ds[rx].min = 0.0000000000e+00
ds[rx].max = NaN
ds[rx].last_ds = "1073420660716"
ds[rx].value = 1.6413000000e+03
ds[rx].unknown_sec = 0
```

### rrdtool fetch

```
$ rrdtool fetch /var/lib/collectd/rrd/u20/interface-enp0s3/if_octets.rrd AVERAGE
                             rx                  tx

...
1641299660: 3.6060000000e+02 4.3743685714e+03
1641299730: 5.8374857143e+02 4.5820528571e+03
1641299800: 8.4140857143e+02 5.3407014286e+03
1641299870: -nan -nan
```
