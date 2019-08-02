# Post Installation

## Change User Password

Run raspi-config command:
- select "Change User Password"
- type the new password

```console
pi@raspberrypi:~ $ sudo raspi-config
...
New password:
Retype new password:
```

## Update the software

```console
pi@raspberrypi:~ $ sudo apt update

pi@raspberrypi:~ $ sudo apt -y upgrade
```

