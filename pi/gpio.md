# GPIO

```console
$ sudo apt install python3-rpi.gpio
```

```python
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

GPIO.setup(Relay[i], GPIO.OUT)
GPIO.output(Relay[i], GPIO.HIGH)

GPIO.cleanup()
```
