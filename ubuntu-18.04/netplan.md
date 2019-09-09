# netplan

```
# /etc/netplan/50-cloud-init.yaml
network:
    ethernets:
        eth0:
            dhcp4: false
            optional: true
            addresses: [192.168.1.10/24]
            gateway4: 192.168.1.254
            routes:
                - to: 192.168.2.0/24
                  via: 192.168.1.1
            nameservers:
                addresses:
                - 8.8.4.4
```
