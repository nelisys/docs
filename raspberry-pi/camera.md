# camera

## onboard

run `raspi-config` to enable Camera

```console
$ raspistill -t 100 -o output.jpg
```

options

`-t` : Time (in ms) before takes picture and shuts down, default 5000

### Error message failed to open vchiq instance

```
$ sudo usermod -a -G video www-data
$ sudo systemctl restart php7.2-fpm
```

## USB Camera

```
sudo apt install fswebcam -y

fswebcam image.jpg

fswebcam -r 1920x1080 --no-banner image.jpg
```
