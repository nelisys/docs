# networking

## ip forward

```console
$ sudo vi /etc/sysctl.conf
...
# Enable IP Forwarding
net.ipv4.ip_forward = 1

$ sudo sysctl -p
net.ipv4.ip_forward = 1
```

## static routes

```console
$ vi /etc/sysconfig/network-scripts/route-enp0s8
192.168.10.0/24 via 192.168.1.254
```
