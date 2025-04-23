# Display

```
$ vi /home/pi/.config/wayfire.ini
...
[output:HDMI-A-1]
transform = 90

[output:HDMI-A-2]
transform = 270
```

## console rotate

`/boot/firmware/cmdline.txt`
console=tty1 ... video=HDMI-A-1:1920x1080M@60,rotate=270
```
```
