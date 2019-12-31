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

## Oracle Linux 7

fix error: VirtualBox Guest Additions: Kernel headers not found for target kernel
4.14.35-1902.8.4.el7uek.x86_64. Please install them and execute

```console
$ uname -a
Linux oel8.example.com 4.14.35-1902.8.4.el7uek.x86_64 ...

$ sudo yum install kernel-uek-devel
```
