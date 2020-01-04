# firewall-cmd

## state

```console
$ sudo firewall-cmd --state
running
```

## list services & ports

```console
$ sudo firewall-cmd --list-services
dhcpv6-client ssh

$ sudo firewall-cmd --list-ports

$ sudo firewall-cmd --list-all
public (active)
  target: default
  icmp-block-inversion: no
  interfaces: enp0s3 enp0s8
  sources:
  services: cockpit dhcpv6-client ssh
  ports:
  protocols:
  masquerade: no
  forward-ports:
  source-ports:
  icmp-blocks:
  rich rules:
```

## zones

```console
$ firewall-cmd --get-active-zones
public
  interfaces: enp0s3 enp0s8

$ sudo firewall-cmd --get-default-zone
public
```

## service info

```console
$ sudo firewall-cmd --info-service=ssh
ssh
  ports: 22/tcp
  protocols:
  source-ports:
  modules:
  destination:
```

```console
$ cat /usr/lib/firewalld/services/ssh.xml
<?xml version="1.0" encoding="utf-8"?>
<service>
  <short>SSH</short>
  <description>Secure Shell (SSH) is a protocol for logging into and executing commands on remote machines. It provides secure encrypted communications. If you plan on accessing your machine remotely via SSH over a firewalled interface, enable this option. You need the openssh-server package installed for this option to be useful.</description>
  <port protocol="tcp" port="22"/>
</service>
```

## save to permanent

```console
$ sudo firewall-cmd --runtime-to-permanent
success
```

## denied logs

turn on log denied

```console
$ sudo firewall-cmd --get-log-denied
off

$ sudo firewall-cmd --set-log-denied=all
success

$ sudo firewall-cmd --get-log-denied
all
```

to view denied logs

```console
$ sudo tail /var/log/messages
```

turn off

```console
$ sudo firewall-cmd --set-log-denied=off
```
