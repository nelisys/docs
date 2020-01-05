# ipvsadm

```
yum install -y ipvsadm

touch /etc/sysconfig/ipvsadm

systemctl restart ipvsadm.service

ipvsadm -C

ipvsadm -A -t 192.168.1.1:80 -s rr

ipvsadm -a -t 192.168.1.1:80 -r 10.0.0.1:80 -m
ipvsadm -a -t 192.168.1.1:80 -r 10.0.0.2:80 -m

ipvsadm -l -n
```
