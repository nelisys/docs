# Guest Additions

## RedHat 8 (minimal)

```console
$ sudo yum update
$ sudo yum install gcc kernel-devel make
$ sudo yum install bzip2 tar
```

click Devices -> Insert Guest Additions CD image...

```console
$ sudo mount /dev/cdrom /media
mount: /dev/sr0 is write-protected, mounting read-only

$ cd /media
$ sudo ./VBoxLinuxAdditions.run
$ sudo shutdown -r now
```
