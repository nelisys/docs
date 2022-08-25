# udev

`/etc/udev/rules.d/local.rules`

```
ACTION=="add", KERNEL=="hidraw*", MODE="0666"
```
