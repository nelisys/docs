# DHCP Server

```
$ sudo apt install -y isc-dhcp-server
```

```
$ sudo vi /etc/dhcp/dhcpd.conf
default-lease-time 600;
max-lease-time 7200;
ddns-update-style none;
authoritative;

subnet 192.168.8.0 netmask 255.255.255.0 {
    range dynamic-bootp 192.168.8.101 192.168.8.200;
    option subnet-mask 255.255.255.0;
}
```

```
$ sudo vi /etc/default/isc-dhcp-server
INTERFACESv4="eth0"
```

```
$ sudo systemctl restart isc-dhcp-server
```

