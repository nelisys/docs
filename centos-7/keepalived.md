# Keeplived

- run on both the active and passive Linux Virutal Server (LVS) routers
- use the Virtual Redundancy Routing Protocol (VRRP)
- Active router:
  - take control of Virtual IP Address (VIP)
  - perform load balancing to real servers
  - monitor defined Services
  - send VRRP advertisements at periodic intervals

- Backup router:
  - if fail to receive VRRP, new active election

- `vrrp_sync_group` defines VRRP group that stays together through the failover

## installation

```console
$ sudo yum install -y keepalived
```

```console
$ sudo vi /etc/sysctl.conf
...
net.ipv4.ip_forward = 1
net.ipv4.ip_nonlocal_bind = 1
```

## MASTER

```
# /etc/keepalived/keepalived.conf
vrrp_instance WEB {
    state MASTER
    interface eth0
    virtual_router_id 10
    nopreempt
    priority 100
    advert_int 1
    authentication {
        auth_type PASS
        auth_pass 1234
    }
    virtual_ipaddress {
        192.168.1.10
    }
}
```

## BACKUP

```
# /etc/keepalived/keepalived.conf
vrrp_instance WEB {
    state BACKUP
    interface eth0
    virtual_router_id 10
    nopreempt
    priority 99
    advert_int 1
    authentication {
        auth_type PASS
        auth_pass 1234
    }
    virtual_ipaddress {
        192.168.1.10
    }
}
```

## run services

```console
$ sudo firewall-cmd --add-rich-rule='rule protocol value="vrrp" accept'

$ sudo systemctl restart keepalived
```

## check status

```console
$ sudo kill -USR1 `cat /var/run/keepalived.pid`

$ sudo tail /var/log/messages
...
Jan  5 13:34:14 lb1 Keepalived_vrrp[1330]: Printing VRRP data for process(1330) on signal
Jan  5 13:34:14 lb1 Keepalived_vrrp[1330]: Can't open /tmp/keepalived.data (13: Permission denied)
```

fix `selinux`

```bash
touch /tmp/keepalived.data

chmod 666 /tmp/keepalived.data

chcon -t keepalived_var_run_t /tmp/keepalived.data
```

```console
$ sudo kill -USR1 `cat /var/run/keepalived.pid`

$ cat /tmp/keepalived.data
------< VRRP Topology >------
 VRRP Instance = WEB
 VRRP Version = 2
   State = MASTER
   Last transition = 1578206999 (Sun Jan  5 13:49:59 2020)
   Listening device = eth0
   Using src_ip = 192.168.1.5
   Gratuitous ARP delay = 5
   Gratuitous ARP repeat = 5
   Gratuitous ARP refresh = 0
   Gratuitous ARP refresh repeat = 1
   Gratuitous ARP lower priority delay = 5
   Gratuitous ARP lower priority repeat = 5
   Send advert after receive lower priority advert = true
   Send advert after receive higher priority advert = false
   Virtual Router ID = 50
   Priority = 100
   Advert interval = 1 sec
   Accept = enabled
   Preempt = enabled
   Promote_secondaries = disabled
   Authentication type = SIMPLE_PASSWORD
   Password = 1234
   Virtual IP = 1
     192.168.1.10/32 dev eth0 scope global
```

## group

```
# /etc/keepalived/keepalived.conf
...
vrrp_sync_group GROUP_1 {
    group {
        NET_4
        NET_2
    }
}
```

## load balance web

```
# /etc/keepalived/keepalived.conf
...
virtual_server 192.168.1.10 80 {
    delay_loop 6
    lb_algo rr
    lb_kind NAT
    protocol TCP

    real_server 10.0.0.1 80 {
        weight 1
        HTTP_GET {
            url {
                path /
                satus_code 200
            }
            connect_timeout 3
        }
    }

    real_server 10.0.0.2 80 {
        weight 1
        HTTP_GET {
            url {
                path /
                satus_code 200
            }
            connect_timeout 3
        }
    }
}
```
