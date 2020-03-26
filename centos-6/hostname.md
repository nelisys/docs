# hostname

## change hostname

```console
# vi /etc/sysconfig/network
NETWORKING=yes
HOSTNAME=my-hostname.example.com
NETWORKING_IPV6=no
NOZEROCONF=yes
`
``
```console
# vi /etc/hosts
192.168.1.1 my-hostname.example.com my-hostname
```
