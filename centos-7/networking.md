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

## rename some interfaces

by `ip link set`

```console
$ sudo ip link set enp0s9 down
$ sudo ip link set enp0s9 name eth0
$ sudo ip link set eth0 up
```

by edit `network-scripts` files

```console
$ cd /etc/sysconfig/network-scripts/

$ sudo mv ifcfg-enp0s9 ifcfg-eth0

$ sudo vi ifcfg-eth0
...
HWADDR=<mac-address>
```
