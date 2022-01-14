# USB Image

## Create USB Image on MacOS

```
$ hdiutil convert -format UDRW -o target ubuntu-18.04.6-live-server-amd64.iso

$ diskutil list
...
/dev/disk2 (external, physical):
   #:                       TYPE NAME                    SIZE       IDENTIFIER
   0:     FDisk_partition_scheme                        *30.8 GB    disk2
   1:             Windows_FAT_32 ESD-USB                 30.8 GB    disk2s1


$ diskutil unmountDisk /dev/disk2

$ sudo dd if=target.dmg of=/dev/disk2 bs=1m
```
