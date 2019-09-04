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

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

GPIO.setup(Relay[i], GPIO.OUT)
GPIO.output(Relay[i], GPIO.HIGH)

GPIO.cleanup()
```

