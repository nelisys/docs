# Samba

## Samba Server

```
$ sudo apt install -y samba
```

```
$ systemctl status smbd
● smbd.service - Samba SMB Daemon
     Loaded: loaded (/lib/systemd/system/smbd.service; enabled; vendor preset: enabled)
     Active: active (running) since Sun 2021-04-18 19:53:10 +07; 1min 38s ago
       Docs: man:smbd(8)
             man:samba(7)
             man:smb.conf(5)

```

## Samba Client

```
$ sudo apt install -y smbclient
```

## User Management

```
$ sudo useradd alice
```

```
$ sudo smbpasswd -a alice
```
