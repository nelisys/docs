# Raspbian X

## global autostart

```console
$ cat /etc/xdg/lxsession/LXDE-pi/autostart
@lxpanel --profile LXDE-pi
@pcmanfm --desktop --profile LXDE-pi
@xscreensaver -no-splash
```

## pi user autostart

```console
$ cat .config/lxsession/LXDE-pi/autostart
@lxpanel --profile LXDE-pi
@pcmanfm --desktop --profile LXDE-pi
#@xscreensaver -no-splash
#@xset s off
#@xset -dpms
#@xset s noblank
#@chromium-browser --kiosk https://www.google.com/
```
