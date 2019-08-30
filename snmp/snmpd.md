# snmpd

## snmpd.conf

```
$ vi /etc/snmp/snmpd.conf
# ACCESS CONTROL
rocommunity public localhost

# Process Monitoring
proc    node

# Disk Monitoring
disk    /   10%

#  System Load
load    10 10 10
```

## Memory

.1.3.6.1.4.1.2021.4.5.0  memTotalReal
.1.3.6.1.4.1.2021.4.11.0 memTotalFree
.1.3.6.1.4.1.2021.4.13.0 memShared    
.1.3.6.1.4.1.2021.4.14.0 memBuffer    
.1.3.6.1.4.1.2021.4.15.0 memCached

```console
$ snmpwalk -Ofn -v 2c -c public 127.0.0.1 .1.3.6.1.4.1.2021.4    
.1.3.6.1.4.1.2021.4.5.0 = INTEGER: 32403908
.1.3.6.1.4.1.2021.4.11.0 = INTEGER: 7459644
.1.3.6.1.4.1.2021.4.13.0 = INTEGER: 28400
.1.3.6.1.4.1.2021.4.14.0 = INTEGER: 7340
.1.3.6.1.4.1.2021.4.15.0 = INTEGER: 17947504
```

```console
$ free
              total        used        free      shared  buff/cache   available
Mem:       32403908     6061612     7461388       28400    18880908    25845228
Swap:             0           0           0
```

## Disk

.1.3.6.1.4.1.2021.9.1.2 dskPath     
.1.3.6.1.4.1.2021.9.1.3 dskDevice   
.1.3.6.1.4.1.2021.9.1.6 dskTotal    
.1.3.6.1.4.1.2021.9.1.7 dskAvail    
.1.3.6.1.4.1.2021.9.1.8 dskUsed     

```console
$ snmpwalk -Ofn -v 2c -c public 127.0.0.1 .1.3.6.1.4.1.2021.9
.1.3.6.1.4.1.2021.9.1.2.1 = STRING: "/"
.1.3.6.1.4.1.2021.9.1.3.1 = STRING: "/dev/sda3"
.1.3.6.1.4.1.2021.9.1.6.1 = INTEGER: 2147483647
.1.3.6.1.4.1.2021.9.1.7.1 = INTEGER: 2147483647
.1.3.6.1.4.1.2021.9.1.8.1 = INTEGER: 44442376
```

```console
$ df -k /
Filesystem       1K-blocks     Used   Available Use% Mounted on
/dev/sda3      10523790592 44432224 10479358368   1% /
```

## Load Average

laNames         1.3.6.1.4.1.2021.10.1.2
laLoad          1.3.6.1.4.1.2021.10.1.3

```console
$ snmpwalk -Ofn -v 2c -c public 127.0.0.1 .1.3.6.1.4.1.2021.10
.1.3.6.1.4.1.2021.10.1.2.1 = STRING: "Load-1"
.1.3.6.1.4.1.2021.10.1.2.2 = STRING: "Load-5"
.1.3.6.1.4.1.2021.10.1.2.3 = STRING: "Load-15"

.1.3.6.1.4.1.2021.10.1.3.1 = STRING: "0.43"
.1.3.6.1.4.1.2021.10.1.3.2 = STRING: "0.12"
.1.3.6.1.4.1.2021.10.1.3.3 = STRING: "0.04"
```

```console
$ uptime
 21:15:18 up 52 days, 10:01,  2 users,  load average: 0.43, 0.12, 0.04
```

