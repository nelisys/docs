# haproxy

```
# /etc/haproxy/haproxy.cfg
global
    log         127.0.0.1 local2
    chroot      /var/lib/haproxy
    pidfile     /var/run/haproxy.pid
    maxconn     20000
    user        haproxy
    group       haproxy
    daemon

    # turn on stats unix socket
    stats socket /var/lib/haproxy/stats

defaults
    mode        http
    log         global
    option      httplog
    option      dontlognull
    option      http-server-close
    option      forwardfor except 127.0.0/8
    option      redispatch
    retries     3
    timeout     http-request 10s
    timeout     queue 1m
    timeout     connect 10s
    timeout     client 1m
    timeout     server 1m
    timeout     http-keep-alive 10s
    timeout     check           10s
    maxconn     30000

frontend main 192.168.1.10:80
    default_backend web

backend web
    balance source
    server  web1 192.168.1.11:80 check
    server  web2 192.168.1.12:80 check
    server  web3 192.168.1.13:80 check
```
