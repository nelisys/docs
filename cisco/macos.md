# macOS

## macOS Console USB Serial

```
$ ls -rlt /dev/tty.usb*
crw-rw-rw-  1 root     wheel   0x9000003 Dec 15 09:30 /dev/tty.usbserial-12340
```

```
$ screen /dev/tty.usbserial-12340 9600 -L
```

## reset password

Reboot router then click Ctrl-A, Ctrl-B

```
Readonly ROMMON initialized
rommon 1 >confreg 0x2142

You must reset or power cycle for new config to take effect
rommon 2 > reset
```
