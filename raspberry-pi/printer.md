# Printer

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

