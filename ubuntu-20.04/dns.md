# BIND DNS Server

## Installation

```
$ sudo apt install -y bind9
```

```
$ systemctl status named
● named.service - BIND Domain Name Server
     Loaded: loaded (/lib/systemd/system/named.service; enabled; vendor preset: enabled)
     Active: active (running) since Mon 2021-05-10 14:34:40 +07; 33s ago
       Docs: man:named(8)
   Main PID: 1308 (named)
      Tasks: 5 (limit: 2281)
     Memory: 15.1M
     CGroup: /system.slice/named.service
             └─1308 /usr/sbin/named -f -u bind

May 10 14:34:41 dns-1 named[1308]: network unreachable resolving './DNSKEY/IN': 2001:500:9f::42#53
May 10 14:34:41 dns-1 named[1308]: network unreachable resolving './NS/IN': 2001:500:9f::42#53
```

## Enable IPv4 Only

Modify OPTIONS in file `/etc/default/named` to enable IPv4 only

```
...

# startup options for the server
OPTIONS="-u bind -4"
```

```
$ sudo systemctl restart named
```

Status after enable IPv4 only

```
$ systemctl status named
● named.service - BIND Domain Name Server
     Loaded: loaded (/lib/systemd/system/named.service; enabled; vendor preset: enabled)
     Active: active (running) since Mon 2021-05-10 14:37:37 +07; 1min 17s ago
       Docs: man:named(8)
   Main PID: 1674 (named)
      Tasks: 5 (limit: 2281)
     Memory: 11.4M
     CGroup: /system.slice/named.service
             └─1674 /usr/sbin/named -f -u bind -4

May 10 14:37:37 dns-1 named[1674]: command channel listening on 127.0.0.1#953
May 10 14:37:37 dns-1 named[1674]: managed-keys-zone: loaded serial 2
May 10 14:37:37 dns-1 named[1674]: zone 0.in-addr.arpa/IN: loaded serial 1
May 10 14:37:37 dns-1 named[1674]: zone localhost/IN: loaded serial 2
May 10 14:37:37 dns-1 named[1674]: zone 255.in-addr.arpa/IN: loaded serial 1
May 10 14:37:37 dns-1 named[1674]: zone 127.in-addr.arpa/IN: loaded serial 1
May 10 14:37:37 dns-1 named[1674]: all zones loaded
May 10 14:37:37 dns-1 named[1674]: running
May 10 14:37:37 dns-1 named[1674]: managed-keys-zone: Key 20326 for zone . is now trusted (acceptance timer comp>
May 10 14:37:37 dns-1 named[1674]: resolver priming query complete
```

## Example configuration

### named.conf

```
// /etc/bind/named.conf
include "/etc/bind/named.conf.options";
include "/etc/bind/named.conf.local";
include "/etc/bind/named.conf.default-zones";
```

### named.conf.options

```
// named.conf.options
acl internal-network {
    192.168.1.0/24;
};

options {
    directory "/var/cache/bind";

    allow-query { localhost; internal-network; };
    allow-transfer { localhost; };
    recursion yes;

    dnssec-validation auto;
    listen-on-v6 { none; };
};
```

### named.conf.local

```
// named.conf.local
zone "example.com" IN {
    type master;
    file "/etc/bind/db.example.com";
    allow-update { none; };
};

zone "1.168.192.in-addr.arpa" IN {
    type master;
    file "/etc/bind/db.192.168.1";
    allow-update { none; };
};
```

### db.example.com

```
; db.example.com
$TTL 86400
@       IN  SOA    example.com. root.example.com. (
            2021100501  ; Serial
            3600        ; Refresh
            1800        ; Retry
            604800      ; Expire
            86400       ; Negative Cache TTL
)
        IN  NS      dns-1.example.com.
        IN  NS      dns-2.example.com.

        IN  A       192.168.1.1
dns-1   IN  A       192.168.1.1
dns-2   IN  A       192.168.1.2
www     IN  A       192.168.1.11
```

### db.192.168.1

```
; db.192.168.1
$TTL 86400
@       IN  SOA    example.com. root.example.com. (
            2021100501  ; Serial
            3600        ; Refresh
            1800        ; Retry
            604800      ; Expire
            86400       ; Negative Cache TTL
)
        IN  NS      dns-1.example.com.
        IN  NS      dns-2.example.com.

1       IN  PTR     dns-1.example.com.
2       IN  PTR     dns-2.example.com.
11      IN  PTR     www.example.com.
```

### Reload the service

```
$ sudo systemctl restart named
```

```
$ systemctl status named
...
May 10 15:27:20 dns-1 named[3571]: zone example.com/IN: sending notifies (serial 2021100501)
May 10 15:27:20 dns-1 named[3571]: zone 1.168.192.in-addr.arpa/IN: sending notifies (serial 2021100501)
```

### Verify configuration

```
$ host [-t type] {name} [server]
```

```
$ host -t ns example.com 192.168.1.1
Using domain server:
Name: 192.168.1.1
Address: 192.168.1.1#53
Aliases:

example.com name server dns-1.example.com.
example.com name server dns-2.example.com.
```

```
$ host -t a www.example.com 192.168.1.1
Using domain server:
Name: 192.168.1.1
Address: 192.168.1.1#53
Aliases:

www.example.com has address 192.168.1.11
```

```
$ host -t ptr 192.168.1.11 192.168.1.1
Using domain server:
Name: 192.168.1.1
Address: 192.168.1.1#53
Aliases:

11.1.168.192.in-addr.arpa domain name pointer www.example.com.
```

## Master & Slave Configuration

### Master (dns-1)

```
options {
    ...
    allow-transfer { localhost; 192.168.1.2; };
    ...
};
```

### Slave (dns-2)

```
// named.conf.local
zone "example.com" IN {
    type slave;
    masters { 192.168.1.1; };
    file "/var/cache/bind/db.example.com";
};
```

```
$ sudo systemctl restart named
```

```
$ systemctl status named
...
May 10 16:09:54 dns-2 named[2419]: zone example.com/IN: Transfer started.
May 10 16:09:54 dns-2 named[2419]: transfer of 'example.com/IN' from 192.168.1.1#53: connected using 192.168.1.2#50193
May 10 16:09:54 dns-2 named[2419]: zone example.com/IN: transferred serial 2021100501
May 10 16:09:54 dns-2 named[2419]: transfer of 'example.com/IN' from 192.168.1.1#53: Transfer status: success
May 10 16:09:54 dns-2 named[2419]: transfer of 'example.com/IN' from 192.168.1.1#53: Transfer completed: 1 messages, 8 records, 214 bytes, 0.004 secs (53500 bytes/sec)
May 10 16:09:54 dns-2 named[2419]: zone example.com/IN: sending notifies (serial 2021100501)
```

```
$ ls -l /var/cache/bind/db.example.com
-rw-r--r-- 1 bind bind 357 May 10 16:09 /var/cache/bind/db.example.com
```

```
$ host www.example.com 192.168.1.2
Using domain server:
Name: 192.168.1.2
Address: 192.168.1.2#53
Aliases:

www.example.com has address 192.168.1.11
```

Try change zone data on the Master, the Slave will received notify.

Don't forget to change serial number.

```
May 10 16:21:29 dns-2 named[2419]: client @0x6f... 192.168.1.1#35880: received notify for zone 'example.com'
May 10 16:21:29 dns-2 named[2419]: zone example.com/IN: notify from 192.168.1.1#35880: serial 2021100502
May 10 16:21:29 dns-2 named[2419]: zone example.com/IN: Transfer started.
May 10 16:21:29 dns-2 named[2419]: transfer of 'example.com/IN' from 192.168.1.1#53: connected using 192.168.1.2#33291
May 10 16:21:29 dns-2 named[2419]: zone example.com/IN: transferred serial 2021100502
May 10 16:21:29 dns-2 named[2419]: transfer of 'example.com/IN' from 192.168.1.1#53: Transfer status: success
May 10 16:21:29 dns-2 named[2419]: transfer of 'example.com/IN' from 192.168.1.1#53: Transfer completed: 1 messages, 10 records, 254 bytes, 0.004 secs (63500 bytes/sec)
May 10 16:21:29 dns-2 named[2419]: zone example.com/IN: sending notifies (serial 2021100502)
```
