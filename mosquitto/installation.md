# Installation

## Ubuntu 20.04

```
$ sudo apt install mosquitto
```

```
$ mosquitto_passwd -c /etc/mosquitto/passwd alice
```

```
$ sudo vi /etc/mosquitto/conf.d/default.conf
listener 2222
password_file /etc/mosquitto/passwd
```

```
$ sudo systemctl restart mosquitto
```

```
$ sudo apt  install mosquitto-clients
```
