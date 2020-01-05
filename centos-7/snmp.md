# snmp

```console
$ sudo yum install -y net-snmp net-snmp-utils

$ sudo systemctl start snmpd
```

```console
$ snmpwalk -Ofn -v 2c -c public 127.0.0.1
.1.3.6.1.2.1.1.1.0 = STRING: Linux my-host 4.14.35-1902.8.4.el7uek.x86_64 #2 SMP Mon Dec 9 11:39:31 PST 2019 x86_64
.1.3.6.1.2.1.1.2.0 = OID: .1.3.6.1.4.1.8072.3.2.10
.1.3.6.1.2.1.1.3.0 = Timeticks: (5889) 0:00:58.89
.1.3.6.1.2.1.1.4.0 = STRING: Root <root@localhost> (configure /etc/snmp/snmp.local.conf)
.1.3.6.1.2.1.1.5.0 = STRING: my-host
.1.3.6.1.2.1.1.6.0 = STRING: Unknown (edit /etc/snmp/snmpd.conf)
.1.3.6.1.2.1.1.8.0 = Timeticks: (3) 0:00:00.03
```
