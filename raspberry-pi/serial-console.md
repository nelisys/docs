# Serial Console

Pi Serial ports use 0V and 3.3V logic levels.

Note: Below tested on version `2019-09-26-raspbian-buster-lite.img`

## Wiring

Use the cable to cross connect TX and RX ports between two Pi

```
 /--------------\        /--------------\
 | serial login |        | run minicom  |
 +--------------+        +--------------+
 | 06 : Ground  |--------| 06 : Ground  |
 | 08 : TXD0    |---\/---| 08 : TXD0    |
 | 10 : RXD0    |---/\---| 10 : RXD0    |
 \--------------/        \--------------/
```

## Pi : serial login

### Raspberry Pi 2

Default is ready to use, no need to change configuration. `agetty` is running on `ttyAMA0` for serial console

```console
pi@pi2:~ $ cat /boot/cmdline.txt
console=serial0,115200 console=tty1 root=PARTUUID=6c58....-02 rootfstype=ext4 elevator=deadline fsck.repair=yes rootwait

pi@pi2:~ $ ls -l /dev/serial0
lrwxrwxrwx 1 root root 7 Nov 30 08:30 /dev/serial0 -> ttyAMA0

pi@pi2:~ $ ps -ef | grep agetty
root       360     1  0 08:31 tty1     00:00:00 /sbin/agetty -o -p -- \u --noclear tty1 linux
root       361     1  0 08:31 ?        00:00:00 /sbin/agetty -o -p -- \u --keep-baud 115200,38400,9600 ttyAMA0 vt220
```

### Raspberry Pi 3, 4

Default `ttyAMA0` on Pi 3, 4 is used for bluetooth, soft-linked by `serial1`, so `agetty` cannot be run.

```console
$ cat /boot/cmdline.txt
console=serial0,115200 console=tty1 root=PARTUUID=6c58....-02 rootfstype=ext4 elevator=deadline fsck.repair=yes rootwait

$ ls -l /dev/serial0
ls: cannot access '/dev/serial0': No such file or directory

$ ls -l /dev/serial1
lrwxrwxrwx 1 root root 7 Nov 30 08:47 /dev/serial1 -> ttyAMA0

$ ps -ef | grep agetty
root       495     1  0 08:47 tty1     00:00:00 /sbin/agetty -o -p -- \u --noclear tty1 linux
```

### Enable Serial Console or UART on Pi 3, 4

You can do by one of following methods
- run `sudo raspi-config` 
- add `enable_uart=1` at the end of file `/boot/config.txt`  

`raspi-config` to enable serial login.

```console
$ sudo raspi-config

Interfacing Options -> Serial

Would you like a login shell to be accessible over serial?  Yes

The serial login shell is enabled
The serial interface is enabled
```

Or add `enable_uart=1` in `/boot/config.txt`

```console
$ sudo vi /boot/config.txt
...
enable_uart=1
```

don't forget to run `sync` to flush all buffer into the SD Card

```console
$ sudo sync
```

then reboot the Pi.

After reboot

```console
$ ls -l /dev/serial*
lrwxrwxrwx 1 root root 5 Nov 30 09:16 /dev/serial0 -> ttyS0
lrwxrwxrwx 1 root root 7 Nov 30 09:16 /dev/serial1 -> ttyAMA0

$ ps -ef | grep agetty
root       498     1  0 09:16 ttyS0    00:00:00 /sbin/agetty -o -p -- \u --keep-baud 115200,38400,9600 ttyS0 vt220
root       499     1  0 09:16 tty1     00:00:00 /sbin/agetty -o -p -- \u --noclear tty1 linux
```

## Pi : run minicom

To run `minicom` on Pi, we have to disable serial console

```console
pi@pi2:~ $ ps -ef | grep getty
root       360     1  0 08:31 tty1     00:00:00 /sbin/agetty -o -p -- \u --noclear tty1 linux
root       720     1  0 09:03 ?        00:00:00 /sbin/agetty -o -p -- \u --keep-baud 115200,38400,9600 ttyAMA0 vt220
```

Two methods to disable serial console
- run `raspi-config`
- manually edit file `/boot/cmdline.txt`

```console
$ sudo raspi-config

Interfacing Options -> Serial

Would you like a login shell to be accessible over serial?   --> No

Would you like the serial port hardware to be enabled?       --> Yes

The serial login shell is disabled
The serial interface is enabled
```

or

```console
$ sudo vi /boot/cmdline.txt
console=tty1 root=PARTUUID=6c58....-02 rootfstype=ext4 elevator=deadline fsck.repair=yes rootwait
```

don't forget to run `sync` to flush all buffer into the SD Card

Reboot the Pi.

```console
$ sudo apt install -y minicom
```

```console
$ minicom -b 115200 -o -D /dev/serial0
Welcome to minicom 2.7.1

OPTIONS: I18n
Compiled on Aug 13 2017, 15:25:34.
Port /dev/serial0, 09:13:04

Press CTRL-A Z for help on special keys


pi3 login: pi
Password:
Last login: Sat Nov 30 09:16:47 GMT 2019 from 192.168.2.1 on pts/0
Linux pi3 4.19.75-v7+ #1270 SMP Tue Sep 24 18:45:11 BST 2019 armv7l

The programs included with the Debian GNU/Linux system are free software;
the exact distribution terms for each program are described in the
individual files in /usr/share/doc/*/copyright.

Debian GNU/Linux comes with ABSOLUTELY NO WARRANTY, to the extent
permitted by applicable law.
pi@pi3:~$
```
