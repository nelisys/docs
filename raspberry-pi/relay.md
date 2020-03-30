# Relay

## 5V 1 Channel Relay Low Level Trigger Relay Module (with LED)

- SRD-05VDC-SL-C

### Wiring

```
 /-------\     /------------\
 | Relay |     | Pi         |
 +-------+     +------------+
 | VCC   |-----| #02 5v     |
 | GND   |-----| #06 GND    |
 | IN    |-----| #16 GPIO23 |
 \-------/     \-------------
 gre/
```

### Code

```python
import RPi.GPIO as GPIO
import time

pin = 23

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(pin, GPIO.OUT)

print('LOW')
GPIO.output(pin, GPIO.LOW)

# time.sleep(1)

print('HIGH')
GPIO.output(pin, GPIO.HIGH)
```
