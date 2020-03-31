# DHT11

Specification
 - Good for 20-80% humidity readings with 5% accuracy
 - Good for 0-50°C temperature readings ±2°C accuracy

## Wiring

```
 /-------\
 | DHT11 |
 +-------|
 | VCC   | - Pin #02 5v
 | DATA  | - Pin #12 GPIO18
 | GND   | - Pin #06 Ground
 \-------/
```

## Installation

```console
$ sudo pip3 install Adafruit_DHT
```

```python
# read-dht11.py
import Adafruit_DHT

dht_values = Adafruit_DHT.read(Adafruit_DHT.DHT11, 18)
print(dht_values)
```

```console
$ python3 read-dht11.py
(42.0, 26.0)
```

- 42.0 -> Humidity
- 26.0 -> Temperature
