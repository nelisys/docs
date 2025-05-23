# udev

`/etc/udev/rules.d/local.rules`

```
ACTION=="add", KERNEL=="hidraw*", MODE="0666"
```

## ATEN Serial RS-232

```
$ lsusb
Bus 001 Device 006: ID 067b:23a3 Prolific Technology, Inc. ATEN Serial Bridge
```

```
$ sudo vi /etc/udev/rules.d/99-rs232.rules
SUBSYSTEM=="tty", ATTRS{idVendor}=="067b", ATTRS{idProduct}=="23a3", SYMLINK+="rs232"
```

```
$ sudo udevadm control --reload-rules

$ sudo udevadm trigger
```

```
$ ls -l /dev/rs232
lrwxrwxrwx 1 root root 7 May 22 14:20 /dev/rs232 -> ttyUSB0
```
