# NFS

## NFS Server

```
$ sudo yum -y install nfs-utils

$ sudo vi /etc/exports
/export 192.168.1.0/24(rw,no_root_squash)

$ sudo systemctl start rpcbind nfs-server

$ sudo systemctl enable rpcbind nfs-server
```

## NFS Client

```
$ sudo yum -y install nfs-utils

$ sudo systemctl start rpcbind

$ sudo systemctl enable rpcbind
```
