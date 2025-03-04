# kisok

## autostart

```
# .config/lxsession/LXDE-pi/autostart

@lxpanel --profile LXDE-pi
@pcmanfm --desktop --profile LXDE-pi
@xscreensaver -no-splash

#@bash /home/pi/watchdog.sh

@xset s 900
@xset dpms 900 900 900
```

## remove unnecessary software

```
sudo apt remove --purge -y \
    firefox \
    galculator \
    geany \
    thonny \
    vlc-bin \
    rpi-imager \
    xarchiver \
    minicom \
    eom \
```
