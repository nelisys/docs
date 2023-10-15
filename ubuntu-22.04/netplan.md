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
      addresses:
      - 192.168.1.11/24
      nameservers:
        address:
          - 8.8.4.4
      routes:
      - to: 10.1.0.0/16
        via: 192.168.1.10
      - to: default
        via: 192.168.1.1
  version: 2
```
