# GPIO

## install

install by `apt`

```console
$ sudo apt install python3-rpi.gpio
```

install by `pip3`

```console
$ sudo pip3 install RPi.GPIO
```

## import

```python
import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

RELAY_NUMBER = 5

GPIO.setup(RELAY_NUMBER, GPIO.OUT)
GPIO.output(RELAY_NUMBER, GPIO.HIGH)
time.sleep(1)
GPIO.output(RELAY_NUMBER, GPIO.LOW)

GPIO.cleanup()
```

