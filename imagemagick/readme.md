# ImageMagick

```
convert -size 800x400 \
    -background '#88aaff' \
    -border 10 \
    -bordercolor '#224499' \
    -gravity center \
    -fill black \
    -pointsize 50 \
    label:"Created by ImageMagick" image.png
```

## ubuntu 22.04 attempt to perform an operation not allowed by the security policy PDF

`/etc/ImageMagick-6/policy.xml`

```
...
  <policy domain="coder" rights="read | write" pattern="PDF" />
```
