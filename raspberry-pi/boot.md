# Boot Configuration

## Disable Rainbow Splash

```
$ sudo vi /boot/firmware/config.txt
...
[all]
disable_splash=1
```

## Remove 4xPi Logo on the top left

```
$ sudo vi /boot/cmdline.txt
... logo.nologo
```

## disable blink cursor

```
$ sudo vi /boot/cmdline.txt
... vt.global_cursor_default=0
```

## Change Welcome to Pi splash image

```
$ sudo vi /usr/share/plymouth/themes/pix/pix.script
...
theme_image = Image("splash.png");
```

## Remove booting messages below splash image

```
$ sudo vi /usr/share/plymouth/themes/pix/pix.script
...
#message_sprite = Sprite();
#message_sprite.SetPosition(screen_width * 0.1, screen_height * 0.9, 10000);

fun message_callback (text) {
    #my_image = Image.Text(text, 1, 1, 1);
    #message_sprite.SetImage(my_image);
    sprite.SetImage (resized_image);
}
```

## Hide Pi Desktop top panel

```
$ sudo vi /etc/xdg/lxsession/LXDE-pi/autostart
#@lxpanel --profile LXDE-pi
@pcmanfm --desktop --profile LXDE-pi
@xscreensaver -no-splash
```

## Change desktop background

```
$ sudo vi /etc/xdg/pcmanfm/LXDE-pi/desktop-items-0.conf
[*]
...
wallpaper=/usr/share/rpd-wallpaper/temple.jpg
```

## Hide Wastebasket icon on Desktop

```
$ sudo vi /etc/xdg/pcmanfm/LXDE-pi/desktop-items-0.conf
[*]
...
show_trash=0
```

or `.config/pcmanfm/LXDE-pi/desktop-items-0.conf`

or `.config/pcmanfm/LXDE-pi/desktop-items-HDMI-A-1.conf`

## Hide mouse

```
$ sudo vi /etc/lightdm/lightdm.conf
...
[Seat:*]
...
xserver-command=X -nocursor
```

## Auto start Chrome in Kiosk

`.config/lxsession/LXDE-pi/autostart`

```
$ sudo vi /etc/xdg/lxsession/LXDE-pi/autostart
...
@chromium-browser --kiosk --app=https://www.google.com/
```

## Disable Blank screen

```
$ sudo vi /etc/xdg/lxsession/LXDE-pi/autostart
...
@xset s off
@xset -dpms
@xset s noblank
```

## Screen Saver

```
$ sudo vi /etc/xdg/lxsession/LXDE-pi/autostart
...
@xset s 300
@xset dpms 300 300 300
```

## Disable special keys

```
$ sudo vi /etc/xdg/lxsession/LXDE-pi/autostart
...
@xmodmap -e "keycode 133 = NoSymbol" # Disable Super (Windows) key
@xmodmap -e "keycode 37 = NoSymbol"  # Disable Ctrl key
@xmodmap -e "keycode 64 = NoSymbol"  # Disable Alt key
```

## References
- [Customizing Boot Up Screen on Raspberry Pi](https://scribles.net/customizing-boot-up-screen-on-raspberry-pi/)

