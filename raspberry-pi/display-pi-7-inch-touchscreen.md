# Raspberry Pi 7" Touchscreen Display

## Specification

Screen Resolution : 800 x 480 pixels

Ref: [Raspberry Pi 7" Touchscreen Display](https://www.element14.com/community/docs/DOC-78156/l/raspberry-pi-7-touchscreen-display)

Note: Default Pi Resolution 720x480

## Wiring

```
 /--------------\     /----------------\
 |    Pi        |     | 7" Touchscreen |
 +--------------+     +----------------+
 | 04 : 5v      |-----| 5V PIN         |
 | 06 : Ground  |-----| GND PIN        |
 |              |     |                |
 |              |     |                |
 | DSI Port     |=====| Ribbon cable   |
 |              |     |                |
 \--------------/     \----------------/
```

## Rotate Screen

Flip 180 degree

```console
$ sudo vi /boot/config.txt
...
lcd_rotate=2
```

## Brighness

```console
$ cat /sys/class/backlight/rpi_backlight/brightness
255

$ sudo sh -c 'echo 127 > /sys/class/backlight/rpi_backlight/brightness'
```

## Blank Screen

```console
$ sudo vi /etc/lightdm/lightdm.conf
...
[Seat:*]
...
#xserver-command=X

```

$ mkdir -p .config/lxsession/LXDE-pi

$ vi /home/pi/.config/lxsession/LXDE-pi/autostart

@xset s noblank
@xset s off
@xset s -dpms


$ sudo xset s off
$ sudo xset -dpms
$ sudo xset s noblank

