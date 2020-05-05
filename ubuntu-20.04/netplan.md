# netplan

## dhcp

```
# /etc/netplan/00-installer-config.yaml
network:
  ethernets:
    eno1:
      dhcp4: true
  version: 2
```

## static

```
# /etc/netplan/00-installer-config.yaml
network:
  ethernets:
    eno1:
      dhcp4: no
      addresses: [ 192.168.1.10/24 ]
      gateway4: 192.168.1.1
      nameservers:
        address:
          - 8.8.4.4
  version: 2
```
