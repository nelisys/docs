# Printer

## rasp-config

- The serial login shell is disabled
- The serial interface is enabled

## python

```
pip install escpos
```

```
# lsusb
Bus 001 Device 004: ID 1ed8:2105 Printer-80
```

```
from escpos.printer import Usb

p = Usb(0x1ed8, 0x2105, 0, profile="TM-T88III")

p.text('Test')
p.qr('ABC', 0, 8)
p.cut()
```

## xprinter

```
pip install python-escpos
```

```python
from escpos.printer import Serial
""" 9600 Baud, 8N1, Flow Control Enabled """
p = Serial(devfile='/dev/serial0,
           baudrate=9600,
           bytesize=8,
           parity='N',
           stopbits=1,
           timeout=1.00,
           dsrdtr=True)
p.text("Hello World\n")
```
