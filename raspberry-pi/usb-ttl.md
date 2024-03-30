# USB TTL

```
$ dmesg
... usb 1-1.4: New USB device found, idVendor=1a86, idProduct=7523, bcdDevice= 2.63
... usb 1-1.4: New USB device strings: Mfr=0, Product=2, SerialNumber=0
... usb 1-1.4: Product: USB2.0-Serial
... ch341 1-1.4:1.0: ch341-uart converter detected
... usb 1-1.4: ch341-uart converter now attached to ttyUSB0

$ lsusb
Bus 001 Device 003: ID 1a86:7523 QinHeng Electronics CH340 serial converter

$ ls -l /dev/serial0
lrwxrwxrwx 1 root root 5 Mar 30 10:38 /dev/serial0 -> ttyS0
```

## Pinout

### USB TO TTL

```
         5V --
 U|     3V3 --
 S|     TXD --
 B|     RXD --
        GND --
```

### BAITE BTE13-009A

```
        DTR --
 U|     RXD --
 S|     TXD --
 B|     VCC --
        CTS --
        GND --
```
