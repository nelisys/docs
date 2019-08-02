# enable ssh

For security, Pi not enable ssh by default,

Enable ssh by touch /boot/ssh

On MacOS

```console
$ df -h
Filesystem      Size   Used  Avail Capacity iused               ifree %iused  Mounted on
...
/dev/disk2s1   252Mi   40Mi  212Mi    16%       0                   0  100%   /Volumes/boot

$ ls -l /Volumes/boot/
total 79019
-rwxrwxrwx  1 supasin  staff    18693 Jun 24 15:21 COPYING.linux
-rwxrwxrwx  1 supasin  staff     1494 Jun 24 15:21 LICENCE.broadcom
-rwxrwxrwx  1 supasin  staff    24205 Jul  8 13:02 bcm2708-rpi-b-plus.dtb
...

$ touch /Volumes/boot/ssh

$ diskutil eject /dev/disk2
Disk /dev/disk2 ejected
```

```console
$ ssh -l pi 192.168.1.5
pi@192.168.1.5's password:
```
