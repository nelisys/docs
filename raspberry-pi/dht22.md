# DHT22

Specification
 - Good for 0-100% humidity readings with 2-5% accuracy
 - Good for -40 to 80°C temperature readings ±0.5°C accuracy

## Wiring

```
 /-------\
 | DHT22 |
 +-------|
 | -     | - Pin #06 Ground
 | out   | - Pin #12 GPIO18
 | +     | - Pin #02 5v
 \-------/
```

## Installation

```console
$ sudo pip3 install Adafruit_DHT
```

```python
# read-dht22.py
import Adafruit_DHT

dht_values = Adafruit_DHT.read(Adafruit_DHT.DHT22, 18)
print(dht_values)
```

```console
$ python3 read-dht22.py
(56.900001525878906, 29.0)
```

- 56.9 -> Humidity
- 29.0 -> Temperature
