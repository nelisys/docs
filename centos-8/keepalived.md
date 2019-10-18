# keeplived

```console
$ sudo yum install -y keepalived
```

```
# /etc/keepalived/keepalived.conf
vrrp_instance WEB {
    state MASTER
    interface eth0
    virtual_router_id 10
    priority 100
    advert_int 1
    authentication {
        auth_type PASS
        auth_pass 1058
    }
    virtual_ipaddress {
        192.168.1.10
    }
}
```
