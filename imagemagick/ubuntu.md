# ImageMagick Ubuntu

## Installation : Ubuntu 22.04

```
sudo apt install imagemagick
```

## ubuntu 22.04 attempt to perform an operation not allowed by the security policy PDF

`/etc/ImageMagick-6/policy.xml`

```
...
  <policy domain="coder" rights="read | write" pattern="PDF" />
```
