# I2C

```console
$ sudo raspi-config

-> Interfacing Options

-> I2C

-> Would you like the ARM I2C interface to be enabled?

<Yes>
```

```console
$ sudo apt-get install -y python-smbus

$ sudo apt-get install -y i2c-tools
```

```console
$ i2cdetect -l
i2c-1   i2c         bcm2835 I2C adapter                 I2C adapter
```

```console
$ i2cdetect -y 1
     0  1  2  3  4  5  6  7  8  9  a  b  c  d  e  f
00:          -- -- -- -- -- -- -- -- -- -- -- -- --
10: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
20: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
30: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
40: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
50: -- -- -- -- -- -- -- -- -- -- 5a -- -- -- -- --
60: -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
70: -- -- -- -- -- -- -- --
```
