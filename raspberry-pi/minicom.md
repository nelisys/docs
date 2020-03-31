# Minicom

## Raspberry Pi 3

```console
$ sudo raspi-config

Interfacing Options -> Serial

Would you like a login shell to be accessible over serial?   --> No

Would you like the serial port hardware to be enabled?       --> Yes

The serial login shell is disabled
The serial interface is enabled
```

## Installation

```
$ sudo apt install -y minicom
```

```
$ minicom -b 115200 -o -D /dev/serial0
```
